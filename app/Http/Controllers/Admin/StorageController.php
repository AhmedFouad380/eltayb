<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Storage;
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
            'purchase_price' => 'required',
            'date' => 'nullable',
            'product_id' => 'required|exists:products,id',
            'shape_id' => 'required|exists:shapes,id'

        ]);


        $user = new Storage();
        $user->num=$request->num;
        $user->branch_id=$request->branch_id;
        $user->is_available=$request->is_available;
        $user->available_quantity=$request->quantity;
        $user->quantity=$request->quantity;
        $user->sell_price=$request->sell_price;
        $user->is_available=$request->is_available;
        $user->purchase_price=$request->purchase_price;
        $user->date=$request->date;
        $user->product_id=$request->product_id;
        $user->shape_id=$request->shape_id;
        $user->save();

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

}

