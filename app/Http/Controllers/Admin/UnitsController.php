<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnitsController extends Controller
{
    //
    public function index()
    {
        return view('admin.units.index');
    }
    public function datatable(Request $request)
    {
        $data = Unit::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('ar_name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->ar_name . '</span>';
                return $name;
            })
            ->editColumn('en_name', function ($row) {
                $name = '';
                if ($row->en_name != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->en_name . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder"> غير معروف</span>';

                }
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
                $actions = ' <a href="' . url("units-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'ar_name','en_name', 'is_active'])
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
            'ar_name' => 'required|string',
            'is_active' => 'nullable|string',

        ]);


        $unit = new Unit();
        $unit->ar_name=$request->ar_name;
        $unit->en_name=$request->en_name;
        $unit->is_active=$request->is_active;
        $unit->save();

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
        $employee = Unit::findOrFail($id);
        return view('admin.units.edit', compact('employee'));
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
            'ar_name' => 'required|string',
            'is_active' => 'nullable|string',

        ]);

        $unit = Unit::whereId($request->id)->firstOrFail();
        $unit->ar_name=$request->ar_name;
        $unit->en_name=$request->en_name;
        $unit->is_active=$request->is_active;
        $unit->save();


        return redirect(url('units_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Unit::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
