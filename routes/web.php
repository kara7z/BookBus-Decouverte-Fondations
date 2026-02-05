<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('index');
});
Route::get('/citys',function (){
    return view('citys');
});
Route::get('/login',function (){
    return view('login');
});