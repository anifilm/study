<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        // views/welcome.blade.php 호출
        return view('welcome');
    }
}
