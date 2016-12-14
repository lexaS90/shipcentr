<?php

namespace App\Http\Controllers\admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class Settings extends Controller
{
    public function edit(Request $request) {

       if ($request->isMethod('get')){
           $settings =  Setting::getSettings();
           return view('admin/settings_form', $settings);
       }
        
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'site_name' => 'required',
                'email' => 'required|email',
            ]);
        }

        Setting::updateSettings($request->all());

        return Redirect::route('settings')->with('status', 'Данные успешно сохранены');
        
       
    }
}
