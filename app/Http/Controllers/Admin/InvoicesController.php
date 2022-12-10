<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceAddition;
use App\Models\InvoiceDetails;
use App\Models\Product;
use App\Models\Shape;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class InvoicesController extends Controller
{
    //
    public function index($type = null)
    {

        return view('admin.invoices.index',compact('type'));
    }
    public function datatable(Request $request)
    {
        $data = Invoice::orderBy('id', 'desc');
        if(isset($request->type)){
            $data->where('type',$request->type);
        }
        if(isset($request->from)) {
            $data->whereDate('created_at', '<=', $request->from);
        }
        if(isset($request->to)){
            $data->whereDate('created_at','>=',$request->to);
        }
        if($request->payment_type && $request->payment_type != 0){
            $data->where('payment_type',$request->payment_type);
        }
        if(isset($request->supplier_id)){
            $data->where('supplier_id',$request->id);
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
                if ($row->supplier_id !=null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->supplier->name . '</span>';

                }elseif ($row->user_id !=null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->user->name . '</span>';

                }elseif ($row->client_id !=null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->client->name . '</span>';

                }
                return $name;
            })

            ->editColumn('num', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->id . '</span>';

                return $name;
            })
            ->editColumn('value', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->total_price . '</span>';

                return $name;
            })
            ->editColumn('created_by', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->creator->name . '</span>';

                return $name;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("receipts-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                $actions .= ' <a href="' . url("receipts-details/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تفاصيل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'supplier','value','num','created_by'])
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
            'date' => 'string',

        ]);

        if ($request->product_id != null){
            $invoice = new Invoice();
            $invoice->type=$request->type;
            $invoice->date=$request->date;
            $invoice->date=$request->date;
            $invoice->image=$request->image;
            $invoice->supplier_id=$request->supplier_id;
            $invoice->branch_id=$request->branch_id;
            $invoice->created_by=Auth::guard('admin')->user()->id;
            $invoice->save();

            // start list of invoices details
            $product_id = $request->product_id;
            $shape_id = $request->shape_id;
            $quantity = $request->quantity;
            $purchase_price = $request->purchase_price;
            $add_to_storage = $request->add_to_storage;
            $sell_price = $request->sell_price;

            foreach ($request->product_id as $key => $product){
                $invoiceDetails = new InvoiceDetails();
                $invoiceDetails->invoice_id = $invoice->id;
                $invoiceDetails->product_id = $product_id[$key];
                $invoiceDetails->shape_id = $shape_id[$key];
                $invoiceDetails->quantity = $quantity[$key];
                $invoiceDetails->purchase_price = $purchase_price[$key];
                $invoiceDetails->add_to_storage = $add_to_storage[$key];
                $invoiceDetails->sell_price = $sell_price[$key];
                $invoiceDetails->save();

            }
            // end list of invoices details

            $invoiceAdditions = new InvoiceAddition();
            $invoiceAdditions->tax = $request->tax;
            $invoiceAdditions->delivery_fees = $request->delivery_fees;
            $invoiceAdditions->discount = $request->discount;
            $invoiceAdditions->coupon_id = $request->coupon_id;
            $invoiceAdditions->invoice_id = $invoice->id;
            $invoiceAdditions->save();

        }



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
        $employee = Invoice::findOrFail($id);
        return view('admin.invoices.edit', compact('employee'));
    }
    public function details($id)
    {
        $employee = Invoice::findOrFail($id);
        return view('admin.invoices.details', compact('employee'));
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

        $receipt = Invoice::whereId($request->id)->firstOrFail();
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


        return redirect(url('invoices_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Invoice::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function addInvoiceDetailRow(Request $request){

        $num = $request->num;

        return view('Admin.Invoices.invoicedetailsjson',compact('num'));
    }
    public function addInvoiceDetailRow1(Request $request){

        $product = Product::findOrFail($request->product_id);
        $shape = Shape::findOrFail($request->shape_id);
        $shape_title = $shape->ar_title;
        $quantity = $request->quantity;
        $sell_price = $request->sell_price;
        $total_price = $request->total_price;
        $add_to_storage = $request->add_to_storage;
        $unit_name = $request->unit_id;
        if ($request->type == 'income'){
            $purchase_price = $request->purchase_price;

        }else{
            $storage = Storage::where('product_id',$request->product_id);
            if ($storage !=null && $storage->quantity <= $quantity){
                $purchase_price = $storage->purchase_price;
                return view('Admin.Invoices.invoiceitemsjson',compact(['product','unit_name','shape_title','add_to_storage','shape','quantity','sell_price','purchase_price','total_price']));

            }else{
                return response()->json(['message' => 'Failed']);
            }

        }

    }
}
