<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Shape;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.Product.index');
    }
    public function datatable(Request $request)
    {
        $data = Product::orderBy('id', 'desc');
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

            ->editColumn('is_new', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_new == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('is_discount', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_discount == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('is_hot', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_hot == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('category_id', function ($row) {
                return $row->Category->ar_title;
            })
            ->editColumn('unit_id', function ($row) {
                if (isset($row->units->ar_name)){
                    return $row->units->ar_name;

                }else{
                    $name = '';
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">غير معروف</span>';
                    return $name;
                }
            })
            ->AddColumn('availableCount', function ($row) {
                return $row->Storage->sum('available_quantity');
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Shapes/" . $row->id) . '" class="btn btn-light-dark"><i class="bi bi-alt"></i> الاحجام </a>';
                $actions .= ' <a href="' . url("ProductImages/" . $row->id) . '" class="btn btn-light-dark"><i class="bi bi-alt"></i> صور المنتج </a>';
                $actions .= ' <a href="' . url("Product-edit/" . $row->id) . '" class="btn btn-light-dark"><i class="bi bi-pin-angle"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active','is_discount','is_new','is_hot','unit_id'])
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
            'is_active' => 'nullable|string',
            'category_id'=>'required',
            'shape_price'=>'required',
            'shape_ar_title'=>'required',
            'shape_en_title'=>'required',
        ]);

        $user = new Product;
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_description=$request->ar_description;
        $user->en_description=$request->en_description;
        $user->image=$request->image;
        $user->category_id=$request->category_id;
        $user->is_active=$request->is_active;
        $user->is_discount=$request->is_discount;
        $user->discount_value=$request->discount_value;
        $user->is_new=$request->is_new;
        $user->unit_id=$request->unit_id;
        $user->is_hot=$request->is_hot;
        $user->save();

        if($request->shape_price){

            $shape_ar_title = $request->shape_ar_title;
            $shape_en_title = $request->shape_en_title;
            foreach($request->shape_price as $key => $price){

                $shapes = new Shape();
                $shapes->price=$price;
                $shapes->ar_title=$shape_ar_title[$key];
                $shapes->en_title=$shape_en_title[$key];
                $shapes->product_id=$user->id;
                $shapes->save();
            }
        }


        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }

    public function datatableProduct_Reports(Request $request)
    {
        $data = Product::orderBy('id', 'asc');
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->AddColumn('SellCount', function ($row) {
                return $row->OrderDetails->sum('count');
            })
            ->AddColumn('availableCount', function ($row) {
                return $row->Storage->sum('available_quantity');
            })
            ->rawColumns(['actions', 'checkbox', 'SellCount','availableCount'])
            ->make();

    }
    public function report(){

        return view('admin.Product.report');

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
        $employee = Product::findOrFail($id);
        return view('admin.Product.edit', compact('employee','id'));
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
            'is_active' => 'nullable|string',
        ]);


        $user =  Product::findOrFail($request->id);
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_description=$request->ar_description;
        $user->en_description=$request->en_description;
        $user->image=$request->image;
        $user->category_id=$request->category_id;
        $user->is_active=$request->is_active;
        $user->is_discount=$request->is_discount;
        $user->discount_value=$request->discount_value;
        $user->unit_id=$request->unit_id;
        $user->is_new=$request->is_new;
        $user->is_hot=$request->is_hot;
        $user->save();



        return redirect(url('Product_Setting'))->with('message', 'تم التعديل بنجاح ');
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
            Product::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function getProducts($id){

        $unit_id = Product::findOrFail($id)->unit_id;
        $data = Unit::findOrFail($unit_id)->ar_name;

        return response()->json($data);


    }
}
