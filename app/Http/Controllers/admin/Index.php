<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function Index(){

        $data = [];

        $data['count_all'] = \App\Order::all()->count();
        $data['count_status_ok'] = \App\Order::all()->where('status', 1)->count();
        $data['count_status_no'] = \App\Order::all()->where('status', 0)->count();

        return view('admin/index', $data);
    }
}
