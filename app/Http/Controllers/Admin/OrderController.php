<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Auth;
use Yajra\DataTables\DataTables;
class OrderController extends Controller
{
    public function index()
    {
        return view('admin.Order.index');
    }


    public function User_Orders($id){
        $user_id = $id;
        return view('admin.Order.index',compact('user_id'));

    }


    public function datatable(Request $request)
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
            $data->whereDate('created_at', '<=', $request->from);
        }
        if($request->to){
            $data->whereDate('created_at','>=',$request->to);
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



            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Order_detail/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تفاصيل الطلب </a>';

                return $actions;

            })


            ->rawColumns(['actions', 'checkbox', 'name', 'type','payment_type','is_payed'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Order_detail($id)
    {
        $data = Order::findOrFail($id);

        return view('admin.Order.Detail',compact('data'));
    }


    public function updateOrderStates(Request $request){

        $data = Order::findOrFail($request->id);
        $data->type=$request->type;
        $data->is_payed=$request->is_payed;
        $data->save();

        return back()->with('message','success');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

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
       /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Order::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
