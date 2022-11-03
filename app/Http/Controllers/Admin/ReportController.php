<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function OrderReports(){

        return view('admin.Order.report');
    }

    public function datatableOrderReports(Request $request)
    {
        $data = Order::orderBy('id', 'desc');
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

            ->AddColumn('user_name', function ($row) {
                $name = $row->User->name;
                return $name;
            })
            ->AddColumn('user_phone', function ($row) {
                $name = $row->User->phone;
                return $name;
            })


            ->editColumn('payment_type', function ($row) {
                if($row->payment_type == 'credit'){
                    $type = '<div class="badge badge-info fw-bolder"> فيزا </div>';
                }elseif($row->payment_type == 'cash'){
                    $type = '<div class="badge badge-light-success fw-bolder"> كاش</div>';
                }

                return $type;
            })
            ->editColumn('is_payed', function ($row) {
                if($row->is_payed == 0){
                    $type = '<div class="badge badge-info fw-bolder"> لم يتم الدفع </div>';
                }elseif($row->is_payed == 1){
                    $type = '<div class="badge badge-light-success fw-bolder"> تم الدفع</div>';
                }

                return $type;
            })
            ->editColumn('type', function ($row) {
                if($row->type == 'pending'){
                    $type = '<div class="badge badge-warning fw-bolder"> طلب جديد</div>';
                }elseif($row->type == 'preparing'){
                    $type = '<div class="badge badge-warning fw-bolder"> جاري التجهير</div>';
                } elseif($row->type == 'on_way'){
                    $type = '<div class="badge badge-info fw-bolder"> جاري التوصيل</div>';
                }elseif($row->type == 'delivered'){
                    $type = '<div class="badge badge-light-success fw-bolder"> تم التوصيل</div>';
                }elseif($row->type == 'canceled'){
                    $type = '<div class="badge badge-danger fw-bolder"> تم الالغاء</div>';
                }

                return $type;
            })






            ->rawColumns([ 'checkbox', 'name', 'type','payment_type','is_payed'])
            ->make();

    }


}
