<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    $cities = DB::table('cities')->get()->pluck('name');
    return view('index',['cities'=>$cities]);
});
Route::get('/offers',function (){
    return view('offers');
});
Route::get('/login',function (){
    return view('login');
});
Route::get('/register',function (){
    return view('register');
});
