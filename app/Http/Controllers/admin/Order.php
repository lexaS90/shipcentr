<?php

namespace App\Http\Controllers\admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class Order extends Controller
{
    public function get() {
        return view('admin/order_list');
    }

    public function getOrderJson() {

        $orders = \App\Order::all();

        $res = [];

        foreach($orders as $order) {
            $data = $order['attributes'];

            $files = explode(',', $data['files']);
            $data['files'] = view('admin/files_render', ['files' => $files])->render();
            $data['status'] = view('admin/status_render', ['status' => $data['status']])->render();

            $res[] = $data;
        }

        return response()->json($res);
    }

    public function add(Request $request) {


        $messages = [
            'files.required' => 'Вы не загрузили файл!',
        ];

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'files' => 'required',
        ], $messages);

        $order = new \App\Order();

        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->comment = $request->input('comment');
        $order->files = $request->input('files');

        if ($order->save())
            $this->sendAddMail($request);
        
        return Redirect::route('home')->with('status', 'Ваша заявка принята');
    }
    
    protected function sendAddMail($data) {

        Mail::send('admin/email_add', array('data' => $data), function($message)
        {
            $email = Setting::getSetting('email');
            $message->to($email)->subject('Новый заказ');
        });
    }

    public function update($orderId = 0, Request $request) {
        if ($request->isMethod('get')){

            $orders = \App\Order::find($orderId);


            return view('admin/order_form', $orders['attributes']);
        }

        if ($request->isMethod('post')){

            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
            ]);

            $order = \App\Order::find($request->id);

            $order->name = $request->input('name');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->comment = $request->input('comment');
            $order->status = $request->input('status');

            $order->save();

            return Redirect::route('order_list')->with('status', 'Данные успешно сохранены');
        }
    }
    
    public function remove($orderId, Request $request) {
        if ($request->isMethod('get')) {
            return view('admin/order_remove', ['id' => $orderId]);
        }

        if ($request->isMethod('post')) {
            $order = \App\Order::find($request->id);
            $order->delete();

            return Redirect::route('order_list')->with('status', 'Данные успешно удалены');
        }
    }
}
