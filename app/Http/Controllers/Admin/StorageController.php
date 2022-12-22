<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Order;
use App\Models\Product;
use App\Models\StorageTransaction;
use Illuminate\Http\Request;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StorageController extends Controller
{
    public function index($id = null)
    {
        if(isset($id)){
            $data = Product::findOrFail($id);
            return view('admin.Storage.index',compact('id','data'));
        }
        return view('admin.Storage.index',compact('id'));

    }
    public function datatable(Request $request)
    {
        $data = Storage::orderBy('branch_id', 'asc');
        if($request->product_id  && $request->product_id != 0){
            $data->where('product_id',$request->product_id);
        }
        if($request->branch_id && $request->branch_id != 0){
            $data->where('branch_id',$request->branch_id);
        }
        if($request->shape_id && $request->shape_id != 0){
            $data->where('shape_id',$request->shape_id);
        }


        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->AddColumn('Product', function ($row) {
                return $row->Product->ar_title;
            })

            ->editColumn('branch_id', function ($row) {
                return $row->Branch->ar_name;
            })


            ->editColumn('shape_id', function ($row) {
                return $row->Shape->ar_title;
            })
            ->rawColumns(['checkbox', 'name'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'quantity' => 'required|string',
            'sell_price' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'shape_id' => 'required|exists:shapes,id'

        ]);


        if(Storage::where('branch_id',$request->branch_id)->where('product_id',$request->product_id)->where('shape_id',$request->shape_id)->first() )
        {
            $data =  Storage::where('branch_id',$request->branch_d)->where('product_id',$request->product_id)->where('shape_id',$request->shape_id)->first();
            $data->quantity=$data->quantity + $request->quantity;
            $data->save();
        }else{
            $user = new Storage();
            $user->branch_id=$request->branch_id;
            $user->quantity=$request->quantity;
            $user->sell_price=$request->sell_price;
            $user->product_id=$request->product_id;
            $user->shape_id=$request->shape_id;
            $user->save();

        }

        $pro = Product::find($request->product_id);
        $branch = Branch::find($request->branch_id);
        $storageTransaction = new StorageTransaction;
        $storageTransaction->type='income';
        $storageTransaction->note = 'تم توريد عدد ' . $request->quantity . " من المنتج " .  $pro->ar_title . 'لفرع '. $branch->ar_name;
        $storageTransaction->branch_id=$request->branch_id;
        $storageTransaction->quantity=$request->quantity;
        $storageTransaction->shape_id=$request->shape_id;
        $storageTransaction->product_id=$request->product_id;
        $storageTransaction->admin_id=Auth::guard('admin')->id();
        $storageTransaction->save();

        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }


    public function destroy(Request $request)
    {
        try {
            Storage::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function getAvaliablbeStorage($id){
        $Products = Storage::where('branch_id',$id)->get();

        return view('admin.Storage.selector',compact('Products'));
    }

    public function getShapeStorage($id ,$product){
        $Products = Storage::where('branch_id',$id)->where('product_id',$product)->get();

        return view('admin.Storage.selectorShape',compact('Products'));
    }

    public function TransferStorage(Request $request){

        $data = $this->validate(request(), [
            'quantity' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'shape_id' => 'required|exists:shapes,id',
            'branch_from' => 'required|exists:branches,id',
            'branch_to' => 'required|exists:branches,id'

        ]);

        $data =  Storage::where('branch_id',$request->branch_from)->where('product_id',$request->product_id)->where('shape_id',$request->shape_id)->first();
        if($request->quantity > $data->quantity ){
            return redirect()->back()->with('error_message', 'عفوا الكمية اكبر من المتاحة ');
        }
        $data->quantity=$data->quantity - $request->quantity;
        $data->save();


        if(Storage::where('branch_id',$request->branch_to)->where('product_id',$request->product_id)->where('shape_id',$request->shape_id)->first() )
        {
            $data =  Storage::where('branch_id',$request->branch_to)->where('product_id',$request->product_id)->where('shape_id',$request->shape_id)->first();
            $data->quantity=$data->quantity + $request->quantity;
            $data->save();
        }else{
            $user = new Storage();
            $user->branch_id=$request->branch_to;
            $user->quantity=$request->quantity;
            $user->sell_price=$data->sell_price;
            $user->product_id=$request->product_id;
            $user->shape_id=$request->shape_id;
            $user->save();

        }

        $pro = Product::find($request->product_id);
        $branch = Branch::find($request->branch_to);
        $branchFrom = Branch::find($request->branch_from);
        $storageTransaction = new StorageTransaction;
        $storageTransaction->type='outcome';
        $storageTransaction->note = ' تم تحويل مخزون  عدد ' . $request->quantity . " من المنتج " .  $pro->ar_title . ' لفرع  '. $branch->ar_name;
        $storageTransaction->branch_id=$request->branch_from;
        $storageTransaction->quantity=$request->quantity;
        $storageTransaction->shape_id=$request->shape_id;
        $storageTransaction->product_id=$request->product_id;
        $storageTransaction->admin_id=Auth::guard('admin')->id();
        $storageTransaction->save();

        $storageTransaction = new StorageTransaction;
        $storageTransaction->type='income';
        $storageTransaction->note = 'تم استقبال مخزون من فرع ' . $branchFrom->ar_name . ' عدد ' . $request->quantity . " من المنتج " .  $pro->ar_title ;
        $storageTransaction->branch_id=$request->branch_to;
        $storageTransaction->quantity=$request->quantity;
        $storageTransaction->shape_id=$request->shape_id;
        $storageTransaction->product_id=$request->product_id;
        $storageTransaction->admin_id=Auth::guard('admin')->id();
        $storageTransaction->save();

        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');

    }

}

