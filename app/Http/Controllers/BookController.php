<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\BookException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       

        //Lưu sesstion có tên là cart
        $cart = ['Rau'];
        $request->session()->put('cart', $cart);
        $request->session()->push('cart', 'Hoa');
        $request->session()->push('cart', 'Ca');

        //dat lai gia tri
        //$request->session()->put('cart', []);

        //Lấy session có tên là cart
        $cart = $request->session()->get('cart');

        //Xoa
        $request->session()->forget('cart');

        //Set

        //Lấy session có tên là cart
        $cart = $request->session()->get('cart');

        //xoa tat ca
        $request->session()->flush();

        dd($cart);

        // try {
        //     throw new BookException();
        // } catch (BookException $e) {
        //     // dd($e->getMessage());
        // }
        $params = [];
        return view('books.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //them
        session(['cart' => '123']);

        //sua
        session()->put('cart', []);

        //xem
        $cart = session('cart');

        //xoa
        session()->forget('cart');

        dd($cart);

        $params = [];
        return view('books.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
            'name' => 'required',
            'add_1' => 'required',
            'add_2' => 'required'
        ];
        if(!empty($request->add_1) ){
            unset($rules['add_2']);
        }
        if(!empty($request->add_2) ){
            unset($rules['add_1']);
        }
        $messages = [
            'name.required' => 'Vui long nhap tieu de'
        ];
        $validated = $request->validate($rules,$messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
