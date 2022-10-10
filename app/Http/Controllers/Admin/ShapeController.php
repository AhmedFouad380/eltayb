<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use App\Models\Shape;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShapeController extends Controller
{
    public function index($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.Shapes.index',compact('id','data'));
    }
    public function datatable(Request $request)
    {
        $data = Shape::orderBy('id', 'desc')->where('product_id',$request->id);

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })


            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Shapes-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox'])
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
            'price' => 'required|string',
        ]);


        $user = new Shape();
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->price=$request->price;
        $user->product_id=$request->product_id;
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
        $employee = Shape::findOrFail($id);
        return view('admin.Shapes.edit', compact('employee'));
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
            'price' => 'required|string',
        ]);


        $user = Shape::find($request->id);
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->price=$request->price;
        $user->save();


        return redirect(url('Shapes',$user->product_id))->with('message', 'تم التعديل بنجاح ');
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
            Shape::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
