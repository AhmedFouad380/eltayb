<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.Slider.index');
    }
    public function datatable(Request $request)
    {
        $data = Slider::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
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
                $actions = ' <a href="' . url("Slider-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active'])
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
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'image' => 'required',
            'is_active' => 'nullable|string',

        ]);


        $user = new Slider();
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_description=$request->ar_description;
        $user->en_description=$request->en_description;
        $user->is_active=$request->is_active;
        $user->image=$request->image;
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
        $employee = Slider::findOrFail($id);
        return view('admin.Slider.edit', compact('employee'));
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
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'image' => '',
            'is_active' => 'nullable|string',
        ]);


        $user = Slider::find($request->id);
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_description=$request->ar_description;
        $user->en_description=$request->en_description;
        $user->is_active=$request->is_active;
        $user->image=$request->image;
        $user->save();


        return redirect(url('Slider_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Slider::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
