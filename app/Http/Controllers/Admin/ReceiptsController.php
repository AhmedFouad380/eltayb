<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ReceiptsController extends Controller
{
    //
    public function index()
    {
        return view('admin.Receipts.index');
    }
    public function datatable(Request $request)
    {
        $data = Receipt::orderBy('id', 'desc');

        if(isset($request->from)) {
            $data->whereDate('created_at', '>=', $request->from);
        }
        if(isset($request->to)){
            $data->whereDate('created_at','<=',$request->to);
        }
        if($request->payment_type && $request->payment_type != 0){
            $data->where('payment_type',$request->payment_type);
        }
        if(isset($request->supplier_id) && $request->supplier_id != 0){
            $data->where('supplier_id',$request->supplier_id);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('supplier', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->supplier->name . '</span>';
                return $name;
            })
            ->editColumn('value', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->value . '</span>';

                return $name;
            })
            ->editColumn('notes', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->notes . '</span>';
                return $name;
            })
            ->editColumn('photo', function ($row) {
                $name = '';
                $name .= ' <a class="badge badge-light-danger fw-bolder text-hover-primary mb-1" href="'.$row->photo.'" target="_blank">' .' <span class="menu-link py-3" >
                    </span> عرض الملف</a>';
                return $name;
            })
            ->editColumn('reciever_name', function ($row) {
                $name = '';
                if ($row->reciever_name != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->reciever_name . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder">غير معروف</span>';

                }
                return $name;
            })
            ->editColumn('transfer_cheque_number', function ($row) {
                $name = '';
                if ($row->transfer_number != null ){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->transfer_number . '</span>';

                }else if ($row->cheque_number != null){
                    $name .= ' <span class="badge badge-light-danger fw-bolder">'.$row->cheque_number .'</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder">لا يوجد</span>';

                }
                return $name;
            })
            ->editColumn('receipt_type', function ($row) {
                $name = '';
                foreach(config('enum.receipt_type') as $key => $value)
                    if ($row->receipt_type === $key){
                        if ($key === 'in'){
                            $name .= ' <span class="badge badge-success fw-bolder"> ' . $value . '</span>';
                        }else{
                            $name .= ' <span class="badge badge-danger fw-bolder"> ' . $value . '</span>';
                        }
                    }
                return $name;
            })
            ->editColumn('payment_type', function ($row) {
                $name = '';
                foreach(config('enum.payment_type') as $key => $value)
                    if ($row->payment_type === $key){
                        $name .= ' <span class="badge badge-info fw-bolder"> ' . $value . '</span>';
                    }else{

                    }

                return $name;
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("receipts-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                $actions .= ' <a href="' . url("receipts-details/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تفاصيل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'supplier','value','photo','payment_type','receipt_type','notes','transfer_cheque_number','reciever_name'])
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
            'supplier_id' => 'required|string',
            'value' => 'required',
            'photo' => 'required',

        ]);


        $receipt = new Receipt();
        $receipt->supplier_id=$request->supplier_id;
        $receipt->value=$request->value;
        $receipt->date=$request->date;
        $receipt->reciever_name=$request->reciever_name;
        $receipt->notes=$request->notes;
        $receipt->photo=$request->photo;
        $receipt->transfer_number=$request->transfer_number;
        $receipt->cheque_number=$request->cheque_number;
        if ($request->receipt_type == 'out'){
            $receipt->receipt_type=$request->receipt_type;
            $receipt->invoice_id = $request->invoice_id;

        }else{
            $receipt->receipt_type=$request->receipt_type;
        }
        $receipt->payment_type=$request->payment_type;
        $receipt->created_by=Auth::guard('admin')->user()->id;

        $receipt->updated_by=Auth::guard('admin')->user()->id;

        $receipt->save();

        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Receipt::findOrFail($id);
        return view('admin.Receipts.edit', compact('employee'));
    }
    public function details($id)
    {
        $employee = Receipt::findOrFail($id);
        return view('admin.Receipts.index-receipt', compact('employee'));
    }
    public function print_receipt($id)
    {
        $employee = Receipt::findOrFail($id);
        $settings = Setting::findOrFail(1);
        return view('admin.Receipts.print2', compact(['employee','settings']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate(request(), [
            'supplier_id' => 'required|string',
            'value' => 'required',
            'photo' => 'required',

        ]);

        $receipt = Receipt::whereId($request->id)->firstOrFail();
        $receipt->supplier_id=$request->supplier_id;
        $receipt->value=$request->value;
        $receipt->date=$request->date;
        $receipt->reciever_name=$request->reciever_name;
        $receipt->notes=$request->notes;
        $receipt->photo=$request->photo;
        $receipt->payment_type=$request->payment_type;
        if ($request->payment_type == 'cash' && $request->payment_type == 'visa'){
            $receipt->transfer_number=null;
            $receipt->cheque_number=null;
        }elseif ($request->payment_type == 'bank_transfer'){
            $receipt->transfer_number=$request->transfer_number;
            $receipt->cheque_number=null;
        }elseif ($request->payment_type == 'cheque'){
            $receipt->transfer_number=null;
            $receipt->cheque_number=$request->cheque_number;
        }
        $receipt->updated_by=Auth::user()->id;
        $receipt->receipt_type=$request->receipt_type;
        $receipt->save();


        return redirect(url('receipts_Setting'))->with('message', 'تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Receipt::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
