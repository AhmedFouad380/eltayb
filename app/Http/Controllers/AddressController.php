<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Auth;
class AddressController extends Controller
{
    public function storeAddress(Request $request){
        $this->validate(request(), [
            'name'=>'required',
            'lng'=>'required',
            'address'=>'required',
            'building_num'=>'required',
            'floor_num'=>'required',
        ]);

        $data = new Address();
        $data->name=$request->name;
        $data->lng=$request->lng;
        $data->lat=$request->lat;
        $data->address=$request->address;
        $data->building_num=$request->building_num;
        $data->floor_num=$request->floor_num;
        $data->user_id=Auth::guard('web')->id();
        $data->save();

        return back()->with('message','success');

    }

    public function editAddress(Request $request){
        $data = Address::findOrFail($request->id);
        return view('front.editaddress',compact('data'));

    }


    public function viewMap(Request $request){
        $data = Address::findOrFail($request->id);
        return view('front.viewMap',compact('data'));

    }


    public function UpdateAddress(Request $request){
        $this->validate(request(), [
            'id'=>'required|exists:address,id',
            'name'=>'required',
            'lng'=>'required',
            'address'=>'required',
            'building_num'=>'required',
            'floor_num'=>'required',
        ]);

        $data =  Address::findOrFail($request->id);
        $data->name=$request->name;
        $data->lng=$request->lng;
        $data->lat=$request->lat;
        $data->address=$request->address;
        $data->building_num=$request->building_num;
        $data->floor_num=$request->floor_num;
        $data->save();

        return back()->with('message','success');

    }

    public function deleteAddress($id){
        Address::where('id',$id)->where('user_id',Auth::guard('web')->id())->firstOrFail()->delete();
        return back()->with('message','success');

    }

}
