<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
//        in ra màn hình chữ created:
//        dd('created');
//        hoặc trả về vew
        return view('category.add');
    }
}
