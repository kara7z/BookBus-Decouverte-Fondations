<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/search',function (){
    return view('search');
} );

Route::post('/home',function (Request $request){
    return view('home',['name'=>'kara','na'=>$request->input("descpription"),'names'=>['kara','oussama','home','dd']]);
} );
Route::get('/form',function (){
    return view('form');
});