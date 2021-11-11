<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Validator;
use Illuminate\Support\Facades\Hash;
use DataTables, URL, DB;

class SettingController extends Controller
{
    public function index(Request $request){
        $setting = Generalsetting::get();
        foreach($setting as $row){
            $data[$row->key] = $row->value;
        }
        return view('admin.setting.index',['result'=>$data]);
    }

    public function save(Request $request){
        $data = $request->all();
        $app_image = $request->file('app_image');

        if(isset($app_image)) {
            $images = $this->ImageUploadStore($app_image,'images\app');
            $data['app_logo'] = $images;
        }

        foreach ($data as $key => $value) {
            $Generalsetting = Generalsetting::where('key',$key)->first();
            if (isset($Generalsetting->id)) {
                $Generalsetting->value = $value;
                $Generalsetting->save();
            }
        }
        return redirect()->route('setting');
    }
}