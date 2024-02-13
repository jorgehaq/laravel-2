<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $orders=Order::where('status','0')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function vieworder($id){

        return view();
    }
}
