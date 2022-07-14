<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //lay tat ca du lieu
    public function index(){
        return view('tasks.index');
    }

    //trang tao moi
    public function create(){
        return view('tasks.create');
    }

    //trang chinh sua
    public function edit($id){
        return view('tasks.edit');
    }

    //trang xem chi tiet
    public function show($id){
        return view('tasks.show');
    }

    //luu du lieu moi
    public function store( Request $request ){
        // dd( $request->all() );
        $name = $request->name;
        $email = $request->email;
        dd( $name .' - '. $email );
        echo __METHOD__;die();
    }

    //cap nhat du lieu
    public function update( $id, Request $request ){
         // dd( $request->all() );
         $name = $request->name;
         $email = $request->email;
         dd( $id .' - '. $name .' - '. $email );
         echo __METHOD__;die();
    }

    //xoa du lieu
    public function destroy( $id ){
        dd($id);
    }
    
}
