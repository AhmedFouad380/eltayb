<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceDetails;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use function MongoDB\BSON\fromJSON;

class ReportController extends Controller
{
    public function OrderReports(){

        return view('admin.Order.report');
    }

    public function datatableOrderReports(Request $request)
    {
        $data = InvoiceDetails::orderBy('id', 'desc')->where('type','outcome')->get();
        if($request->type && $request->type != 0){
            $data->where('type',$request->type);
        }
        if($request->user_id && $request->user_id != 0){
            $data->where('user_id',$request->user_id);
        }
        if($request->payment_type && $request->payment_type != 0){
            $data->where('payment_type',$request->payment_type);
        }
        if($request->is_payed && $request->payment_type != 3){
            $data->where('is_payed',$request->is_payed);
        }
        if($request->from) {
            $data->whereDate('created_at', '>=', $request->from);
        }
        if($request->to){
            $data->whereDate('created_at','<=',$request->to);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->AddColumn('product', function ($row) {
                $name = $row->Product->ar_title;
                return $name;
            })
            ->AddColumn('shape', function ($row) {
                $name = $row->Shape->ar_title;
                return $name;
            })
            ->editColumn('invoice_number', function ($row) {
                $type = '<div class="fw-bolder"> '.$row->invoice->id .'</div>';
                return $type;
            })

            ->editColumn('quantity', function ($row) {
                $type = '<div class="fw-bolder"> '.$row->quantity .'</div>';
                return $type;
            })
            ->editColumn('unit', function ($row) {
                $type = '<div class="fw-bolder"> '.$row->product->units->ar_name .'</div>';
                return $type;
            })
            ->editColumn('sell_price', function ($row) {
                $type = '<div class="fw-bolder"> '.$row->sell_price .'</div>';
                return $type;
            })

            ->editColumn('branch_name', function ($row) {
                $type = '<div class="fw-bolder"> '.$row->invoice->branch->ar_name .'</div>';
                return $type;
            })

            ->rawColumns([ 'checkbox', 'shape', 'product','branch_name','sell_price','quantity','invoice_number','unit'])
            ->make();

    }
}
