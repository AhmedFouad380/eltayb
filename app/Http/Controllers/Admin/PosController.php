<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(Request $request){
        $Products = Product::where('is_active','active')->get();


        if ($request->ajax()) {
            $view = view('posdata',compact('Products'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('admin.pos',compact('Products'));
    }

    public function POSProducts(Request $request)
    {
        $posts = Product::Orderby('id','desc');
        if(isset($request->category_id) && $request->category_id != 0) {
            $posts->where('category_id',$request->category_id);
        }

        $Products = $posts->get();



        return view('admin.posdata',compact('Products'));
    }

}
