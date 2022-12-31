<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ExpensesController extends Controller
{
    //
    public function index()
    {
        return view('admin.expenses.index');
    }
    public function datatable(Request $request)
    {
        $data = Expenses::orderBy('id', 'desc');

        if(isset($request->from)) {
            $data->whereDate('date', '>=', $request->from);
        }
        if(isset($request->to)){
            $data->whereDate('date','<=',$request->to);
        }
        if(isset($request->expenses_type_id)){
            $data->where('expenses_type_id',$request->expenses_type_id);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('date', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->date . '</span>';
                return $name;
            })
            ->editColumn('price', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->price . '</span>';
                return $name;
            })

            ->editColumn('expenses-type', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->expensesTypes->name . '</span>';
                return $name;
            })
            ->editColumn('note', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->note . '</span>';
                return $name;
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("expenses-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'price','expenses-type','note','date'])
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
            'price' => 'required|string',
            'date' => 'required',
            'note' => 'required',
            'expenses_type_id' => 'required',

        ]);


        $expenses = new Expenses();
        $expenses->date=$request->date;
        $expenses->price=$request->price;
        $expenses->note=$request->note;
        $expenses->expenses_type_id=$request->expenses_type_id;
        $expenses->admin_id=Auth::guard('admin')->id();
        $expenses->save();

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
        $employee = Expenses::findOrFail($id);
        return view('admin.expenses.edit', compact('employee'));
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
            'price' => 'required|string',
            'date' => 'required',
            'note' => 'required',
            'expenses_type_id' => 'required',
        ]);


        $expenses = Expenses::whereId($request->id)->firstOrFail();
        $expenses->price=$request->price;
        $expenses->date=$request->date;
        $expenses->note=$request->note;
        $expenses->expenses_type_id=$request->expenses_type_id;
        $expenses->admin_id=Auth::guard('admin')->id();
        $expenses->save();



        return redirect(url('expenses_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Expenses::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
