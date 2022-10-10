<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Shape;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class frontController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt($credentials ,$remember_me)) {
            // Authentication passed...
            return redirect()->intended('/Dashboard');
        }
        if (Auth::guard('web')->attempt($credentials ,$remember_me)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else {
            return back()->with('message', 'Failed');
        }

    }

    public function logout(){

        Auth::guard('web')->logout();

            return redirect('/')->with('message','success');
    }
    public function register(){
        return view('front.register');
    }
    public function registerUser(Request $request){
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:users|min:11',

        ]);
        $data = new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->password=Hash::make($request->password);
        $data->save();
        Auth::login($data);
        return redirect('/')->with('message', 'تم التعديل بنجاح ');

    }
    public function UpdateProfile(Request $request){
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:11|unique:users,id,'.$request->id,

        ]);
        $data =  User::findOrFail($request->id);
        $data->name=$request->name;
//        $data->email=$request->email;
        $data->phone=$request->phone;
        if($request->password){
            $data->password=Hash::make($request->password);
        }
        $data->save();
        return back()->with('message', 'تم التعديل بنجاح ');

    }

    public function product_model(Request $request){
        $data = Product::findOrFail($request->id);
        return view('front.product-model',compact('data'));
    }
    public function product_details($id){
        $data = Product::findOrFail($id);
        return view('front.shop-product-full',compact('data'));
    }

    public function Category($id,Request $request){
        $Category = Category::findOrFail($id);
        if($request->size ){
            $Products = Product::where('category_id',$id)->where('is_active','active')->paginate($request->size);

        }else{
            $Products = Product::where('category_id',$id)->where('is_active','active')->paginate(10);

        }
        return view('front.products', compact('Category','Products'));
    }

    public function Search(Request $request){


        $data = Product::where('is_active','active')->
                where(function ($q) use ($request) {
                    $q->where('ar_title','like','%'.$request->search.'%')->
                    OrWhere('en_title','like','%'.$request->search.'%')->
                    OrWhere('ar_description','like','%'.$request->search.'%')->
                    OrWhere('en_description','like','%'.$request->search.'%');
                });
                if($request->category_id != 0){
                    $data->where('category_id',$request->catgory_id);
                }
           $Products = $data->paginate(10);
        return view('front.search', compact('Products'));
    }
    public function HotDeals(Request $request){


        $data = Product::where('is_active','active')->where('is_hot',1)->OrderBy('id','desc');
        $Products = $data->paginate(10);
        return view('front.search', compact('Products'));
    }

    public function cart(Request $request){

        $Carts = Cart::where('user_id',Auth::guard('web')->id())->get();

            return view('front.cart',compact('Carts'));
    }

    public function addCart(Request $request){
        $Product = Product::findOrFail($request->id);
        if($request->count){
            if(Cart::where('user_id',Auth::guard('web')->id())->where('product_id',$Product->id)->where('shape_id',$request->shape_id)->count() > 0){
                $cart =  Cart::where('user_id',Auth::guard('web')->id())->where('product_id',$Product->id)->where('shape_id',$request->shape_id)->first();
                $cart->count= $request->count;
                $cart->save();
            }else{
                $cart = new Cart();
                $cart->product_id = $Product->id;
                $cart->user_id=Auth::guard('web')->id();
                if(isset($request->count)){
                    $cart->count=$request->count;
                }else{
                    $cart->count=1;
                }
                $cart->shape_id=$request->shape_id;
                $cart->save();
            }

        }else{
            if(Cart::where('user_id',Auth::guard('web')->id())->where('product_id',$Product->id)->where('shape_id',$request->shape_id)->count() > 0){
                $cart =  Cart::where('user_id',Auth::guard('web')->id())->where('product_id',$Product->id)->where('shape_id',$request->shape_id)->first();
                $cart->count=$cart->count + 1;
                $cart->save();
            }else{
                $cart = new Cart();
                $cart->product_id = $Product->id;
                $cart->user_id=Auth::guard('web')->id();
                if(isset($request->count)){
                    $cart->count=$request->count;
                }else{
                    $cart->count=1;
                }
                $cart->shape_id=$request->shape_id;
                $cart->save();
            }
        }



        return response()->json(Cart::where('user_id',Auth::guard('web')->id())->sum('count'));
    }


    public function qtyUp(Request $request){
        $cart = Cart::findOrFail($request->id);
        $cart->count=$request->value;
        $cart->save();
        return response()->json(Cart::where('user_id',Auth::guard('web')->id())->sum('count'));

    }

    public function deleteCartItem(Request $request){
         Cart::where('id',$request->id)->delete();
        return response()->json(['message'=>'success']);

    }

    public function deleteALl(Request $request){
        Cart::where('user_id',Auth::guard('web')->id())->delete();
        return response()->json(['message'=>'success']);

    }
    public function  ApplyCoupon(Request $request){
       $coupon =  Coupon::where('name',$request->coupon)->first();
       if(session()->get('coupon')){
           return back()->with('CouponMessage','AlreadyAdd');

       }
       if(isset($coupon) && $coupon->use_count != $coupon->used_count && $coupon->is_active == 'active' && $coupon->expire_date >= \Carbon\Carbon::now()){
           session()->put('coupon', $coupon->id);

           return redirect('cart')->with('CouponMessage','success');
       }else{
           return back()->with('CouponMessage','failed');
       }

    }
    public function Contact(){

        return view('front.contact');
    }
    public function Page($id){
        $data = Page::findOrFail($id);
        return view('front.page-about',compact('data'));
    }

    public function removeCoupon(){

        session()->forget('coupon');

        return redirect('cart')->with('CouponMessage','success');

    }


    public function cancel_order(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id'=>'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => validation(), 'msg' => $validator->messages()->first(), 'data' => (object)[]], validation());
        }

        $Order = Order::findOrFail($request->order_id);
        if($Order->type ==  'pending'){
            $Order->type='canceled';
            $Order->save();
            return response()->json(msgdata($request, success(), 'success', (object)[]) ,success());
        }else{
            return response()->json(msgdata($request, error(), 'error', (object)[]) ,error());
        }

    }
    public function RateOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id'=>'required|exists:orders,id',
            'rate'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => validation(), 'msg' => $validator->messages()->first(), 'data' => (object)[]], validation());
        }

        $Order = Order::findOrFail($request->order_id);
        $Order->rate=$request->rate;
        $Order->save();

        return response()->json(msgdata($request, success(), 'success', (object)[]) ,success());

    }


    public function StoreOrder(Request $request){
    $this->validate(request(), [
            'address_id'=>'exists:addresses,id',
            'payment_type'=>'required'
        ]);

        $Carts = Cart::where('user_id',Auth::guard('web')->id())->get();
        if(count($Carts) == 0){
            return response()->json(msgdata($request, error(), 'cart_empty', (object)[]) ,success());
        }
        $Order = new Order();
        $Order->order_num=rand(9999999,999999999);
        $Order->payment_type=$request->payment_type;
        $Order->tax=Setting::find(1)->tax;
        $Order->delivery_fees=Setting::find(1)->delivery_fees;
        $address = Address::find($request->address_id);
        $Order->lat=$address->lat;
        $Order->lng	=$address->lng;
        $Order->address_id=$request->address_id;
        $Order->user_id=Auth::guard('web')->id();
        $Order->note=$request->note;
        if(session()->get('coupon')){
            $coupon = Coupon::findOrFail(session()->get('coupon'));
            $Order->coupon_id=$coupon->id;
            $Order->coupon_percent=$coupon->percent;
        }
        $Order->save();

        $total_price = [];
        foreach($Carts as $Cart){
                $Item = Product::findOrFail($Cart->product_id);
                $ItemShape = Shape::findOrFail($Cart->shape_id);
                $OrderDetail = new OrderDetail();
                $OrderDetail->item_id=$Cart->item_id;
                $OrderDetail->shape_id=$Cart->shape_id;
                $OrderDetail->user_id=Auth::guard('web')->id();
                $OrderDetail->note=$Cart->note;
                $OrderDetail->count=$Cart->count;
                $OrderDetail->ar_title=$Item->ar_title;
                $OrderDetail->en_title=$Item->en_title;
                $OrderDetail->ar_title_shape=$ItemShape->ar_title;
                $OrderDetail->en_title_shape=$ItemShape->en_title;
                $OrderDetail->price=$ItemShape->price * $Cart->count;
                $OrderDetail->order_id=$Order->id;
                $OrderDetail->save();
                 $total_price[] = $Cart->count *  $ItemShape->price;
        }
        $total_price[]=Setting::find(1)->tax;
        $total_price[]=Setting::find(1)->delivery_fees;
        if(session()->get('coupon')){
            $coupon = Coupon::findOrFail(session()->get('coupon'));
            $total = array_sum($total_price) - ((array_sum($total_price) * $coupon->percent )/ 100);
        }else{
            $total = array_sum($total_price);
        }

        $Order->total_price=$total;
        $Order->save();


        Cart::where('user_id',Auth::guard('web')->id())->delete();

        return redirect('/MyOrder')->with('Message','success');
    }

    public function profile(){
        $data = User::findOrFail(Auth::guard('web')->id());
        $Orders = Order::where('user_id',$data->id)->OrderBy('id','desc')->paginate(10);
        $addresses = Address::where('user_id',$data->id)->OrderBy('id','desc')->get();

        return view('front.page-account',compact('data','Orders','addresses'));
    }



}
