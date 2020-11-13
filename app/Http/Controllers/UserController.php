<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Layouts.home');
    }
    public function about(){
        return view('includes.about');
    }
}
