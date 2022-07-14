<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //lay tat ca du lieu
    public function index(){
        echo __METHOD__;die();
    }

    //trang tao moi
    public function create(){
        echo __METHOD__;die();
    }

    //trang chinh sua
    public function edit($id){
        echo $id;
        echo __METHOD__;die();
    }

    //trang xem chi tiet
    public function show($id){
        echo __METHOD__;die();
    }

    //luu du lieu moi
    public function store( Request $request ){
        echo __METHOD__;die();
    }

    //cap nhat du lieu
    public function update( $id, Request $request ){
        echo __METHOD__;die();
    }
    
}
