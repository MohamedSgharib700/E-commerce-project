<?php

namespace App\Http\Controllers\Admin;

use App\SiteSettings;
use App\SmsGetways;
use App\SenderEmails;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{


    private function rules() 
    {
        return [
          'site_name_ar'        => 'required',
          'site_name_en'        => 'required',
        ];
    }

    public function index()
    {
        $settings   = SiteSettings::first();
        $smsGetways = SmsGetways::pluck('name','id');
        $emails     = SenderEmails::pluck('name','id');
        return View('admin.settings.index',compact('settings','smsGetways','emails'));
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->rules());
        SiteSettings::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, SiteSettings $site_setting)
    {
        $this->validate($request,$this->rules());

        //dd($request->all());
        $site_setting->update($request->all());
        return redirect()->back();
    }

}
