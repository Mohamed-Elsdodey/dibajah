<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogActivityTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Upload_Files;

    public function __construct()
    {
        /* $this->middleware([('permission:settings index,admin')])->only(['index']);*/
    }

    public function index()
    {


        $settings = Setting::firstOrCreate();
        return view('Admin.settings.index', [
            'settings' => $settings,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $setting=Setting::firstOrNew();
        $setting->update(
            [
                'app_name'=>$request->app_name,

            ]
        );
        if ($request->has('header_logo')){
         $header_logo =  $this->uploadFiles('settings',$request->file('header_logo'),null );
            $setting->update(
                [
                    'header_logo'=>$header_logo,
                ]
            );
        }
        if ($request->has('footer_logo')){
            $footer_logo =  $this->uploadFiles('settings',$request->file('footer_logo'),null );
            $setting->update(
                [
                    'footer_logo'=>$footer_logo,
                ]
            );
        }
        if ($request->has('favicon_logo')){
            $favicon_logo =  $this->uploadFiles('settings',$request->file('favicon_logo'),null );
            $setting->update(
                [
                    'favicon_logo'=>$favicon_logo,
                ]
            );
        }


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);

    }





}
