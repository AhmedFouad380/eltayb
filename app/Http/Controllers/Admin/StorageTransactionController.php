<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageTransaction;
use Yajra\DataTables\DataTables;

class StorageTransactionController extends Controller
{
    public function index($id = null)
    {

        return view('admin.StorageTransaction.index',compact('id'));

    }
    public function datatable(Request $request)
    {
        $data = StorageTransaction::orderBy('id', 'desc');
        if($request->product_id  && $request->product_id != 0){
            $data->where('product_id',$request->product_id);
        }
        if($request->branch_id && $request->branch_id != 0){
            $data->where('branch_id',$request->branch_id);
        }
        if($request->shape_id && $request->shape_id != 0){
            $data->where('shape_id',$request->shape_id);
        }
        if($request->type && $request->type != 0){
            $data->where('type',$request->type);
        }
        $query = $data;
        return DataTables::of($query)
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
            ->AddColumn('Shape', function ($row) {
                return $row->Shape->ar_title;
            })
            ->editColumn('branch_id', function ($row) {
                return $row->Branch->ar_name;
            })
            ->editColumn('type', function ($row) {
                if($row->type == 'income'){
                    return 'وارد';
                }else{
                    return 'صادر';
                }
            })

            ->rawColumns(['checkbox', 'name'])
            ->make();

    }
}
