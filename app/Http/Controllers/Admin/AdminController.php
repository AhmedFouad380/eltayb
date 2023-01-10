<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;
Use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.Admin.index');
    }
    public function datatable(Request $request)
    {
        $data = Admin::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>
                                   <br> <small class="text-gray-600">' . $row->email . '</small>';
                return $name;
            })
            ->editColumn('branch', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->branch->ar_name . '</span>';
                return $name;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Admin-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                $actions .= ' <a href="' . url("Admin-details/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> الحسابات </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active','branch'])
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:admins|min:8',
            'is_active' => 'nullable|string',

        ]);


        $user = new Admin;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->percentage=$request->percentage;
        $user->branch_id=$request->branch_id;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->is_active=$request->is_active;
        if($request->role_id){
            $user->roles()->sync([$request->role_id]);
        }
        $user->save();

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
        $employee = Admin::findOrFail($id);
        return view('admin.Admin.edit', compact('employee'));
    }
    public function details($id,Request $request)
    {
        $employee = Admin::findOrFail($id);
        $data = Invoice::orderBy('id', 'desc')->where('type','outcome')->where('created_by',$id)->get();

        /*el search mesh sha8al ya ba4mohnds ahmed ya fo2ad 3amlk comment b el font el 3reeeeeeeeeeeeeeeeeeeeeeeeed*/




        if(isset($request->from)) {
            $data->whereDate('date', '>=', $request->from)->get();
        }
        if(isset($request->to)){
            $data->whereDate('date','<=',$request->to)->get();
        }





        /*el search mesh sha8al ya ba4mohnds ahmed ya fo2ad 3amlk comment b el font el 3reeeeeeeeeeeeeeeeeeeeeeeeed*/

        $purchase_price =0;
        $sell_price = 0;
        foreach ($data as $invoice){
            foreach($invoice->invoicesDetails as $invoiceDetail){
                $purchase_price += $invoiceDetail->purchase_price * $invoiceDetail->quantity;
                $sell_price += $invoiceDetail->sell_price * $invoiceDetail->quantity;
            }
        }
        $total_earn = $sell_price - $purchase_price;
        $percentage = ($total_earn * $employee->percentage)/100;
        return view('admin.Admin.details',compact(['employee','percentage','sell_price']));
    }
    public function datatable_admin(Request $request)
    {
        $employee = Admin::findOrFail($request->id);

        $data = Invoice::orderBy('id', 'desc')->where('type','outcome');
        if($request->id){
            $data->where('created_by',$request->id);
        }
        if(isset($request->from)) {
            $data->whereDate('date', '>=', $request->from);
        }
        if(isset($request->to)){
            $data->whereDate('date','<=',$request->to);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('num', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->id . '</span>';
                return $name;
            })
            ->editColumn('total_price', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->total_price . '</span>';
                return $name;
            })
            ->editColumn('details', function ($row) use ($employee) {
                $name = '';
                $purchase_price =0;
                $sell_price = 0;
                foreach ($row->invoicesDetails as $invoice){
                    $purchase_price += $invoice->purchase_price * $invoice->quantity;
                    $sell_price += $invoice->sell_price * $invoice->quantity;
                }
                $total_earn = $sell_price - $purchase_price;
                $percentage = ($total_earn * $employee->percentage)/100;
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $percentage . '</span>';
                return $name;
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("invoices-details/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> رابط الفاتورة </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'num', 'total_price','details'])
            ->make();

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
            'name' => 'required|string',
            'id' => 'required|exists:users,id',
            'email' => 'required|email|unique:admins,email,' . $request->id,
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:8|unique:admins,phone,' . $request->id,
            'is_active' => 'nullable|string',

        ]);



        $user = Admin::whereId($request->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->percentage=$request->percentage;
        $user->branch_id=$request->branch_id;
        $user->is_active=$request->is_active;
        if($request->role_id){
            $user->roles()->sync([$request->role_id]);
        }
        if(isset($user->password)){
            $user->password=Hash::make($request->password);
        }
        $user->save();





        return redirect(url('Admin_setting'))->with('message', 'تم التعديل بنجاح ');
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
            Admin::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
