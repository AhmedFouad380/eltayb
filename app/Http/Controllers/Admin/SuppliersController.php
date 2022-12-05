<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SuppliersController extends Controller
{
    //
    public function index()
    {
        return view('admin.suppliers.index');
    }
    public function datatable(Request $request)
    {
        $data = Supplier::orderBy('id', 'desc');

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
                if ($row->email != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>
                                <br> <small class="text-gray-600">' . $row->email . '</small>';
                }else{
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>
                                <br> <small class="text-danger-600">لا يوجد ايميل</small>';
                }

                return $name;
            })
            ->editColumn('phone', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $name;
            })
            ->editColumn('phone_nd', function ($row) {
                $name = '';
                if ($row->phone_nd != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone_nd . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder">غير معروف</span>';

                }
                return $name;
            })
            ->editColumn('address', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->address . '</span>';
                return $name;
            })
            ->editColumn('notes', function ($row) {
                $name = '';
                if ($row->notes != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->notes . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder">غير معروف</span>';

                }
                return $name;
            })


            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("suppliers-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name','phone','phone_nd','address','notes'])
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
        ]);


        $supplier = new Supplier();
        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->phone_nd=$request->phone_nd;
        $supplier->address=$request->address;
        $supplier->notes=$request->notes;
        $supplier->save();

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
        $employee = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('employee'));
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
        ]);

        $supplier = Supplier::whereId($request->id)->firstOrFail();
        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->phone_nd=$request->phone_nd;
        $supplier->address=$request->address;
        $supplier->notes=$request->notes;
        $supplier->save();


        return redirect(url('suppliers_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Supplier::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
