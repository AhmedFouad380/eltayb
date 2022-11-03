<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Shape;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductImagesController extends Controller
{

    public function index($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.ProductImages.index',compact('data'));
    }
    public function datatable(Request $request)
    {
        $data = ProductImages::orderBy('id', 'desc')->where('product_id',$request->id);
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->editColumn('image', function ($row) {
                $is_active = '<img width="100px" height="100px" src=" '. $row->image .'"/>';
                    return $is_active;
            })

            ->rawColumns([ 'checkbox', 'image'])
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
         $this->validate(request(), [
            'product_id' => 'required',
            'images'=>'required|',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

         foreach($request->images as $image){
             $user = new ProductImages();
             $user->product_id=$request->product_id;
             $user->image=$image;
             $user->save();
         }


        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


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
            ProductImages::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
