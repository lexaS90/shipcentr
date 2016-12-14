<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function Index() {

        $settings = Setting::getSettings();

        return view('web/index', $settings);
    }
}
