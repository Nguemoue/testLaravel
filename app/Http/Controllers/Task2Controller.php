<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Task2Controller extends Controller
{
    function index(){
        return view("task2.index");
    }
}
