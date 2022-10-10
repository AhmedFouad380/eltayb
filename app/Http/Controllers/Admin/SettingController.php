<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::findOrFail(1);
        return view('admin.setting.public_setting',compact('settings'));
    }

    public function update(Request $request){

        $data = Setting::findOrFail(1);
        $data->ar_name=$request->ar_name;
        $data->en_name=$request->en_name;
        $data->logo=$request->logo;
        $data->about=$request->about;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->customer_phone=$request->customer_phone;
        $data->email=$request->email;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;
        $data->youtube=$request->youtube;
        $data->delivery_fees=$request->delivery_fees;
        $data->tax=$request->tax;
        $data->hours=$request->hours;
        $data->lat=$request->lat;
        $data->lng=$request->lng;
        $data->save();

        return redirect(url('General_Setting'))->with('message', 'تم التعديل بنجاح ');

    }
}
