<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class Task1Controller extends Controller
{
    function index(){
        // dd(User::find(34295)->category);
        $orders = Order::query()->paginate(4);
        return view("task1.index",compact("orders"));
    }

    function filter(Request $request){
        // dd($request->input("date_from"));
        if($field = $request->input("distributor")){
            $orders = Order::query()->join("users","orders.purchaser_id","=","users.id")
            ->where("username","like","%$field%")->orWhere("first_name","like","%$field%")
            ->orWhere("orders.id","like",$field)->orWhere("last_name","like","%$field%")->select("orders.*")->paginate(4);
        }
        if($request->input("date_from") and $request->input("date_to")){
            $orders= Order::query()->whereBetween("order_date",[$request->date_from,$request->date_to])->paginate(4);
        }
        
        return view("task1.index",compact("orders"));
    }
}
