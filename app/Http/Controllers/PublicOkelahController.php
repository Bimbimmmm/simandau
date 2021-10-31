<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ReferenceSchoolType;
use App\Models\Cart;

class PublicOkelahController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user_id = auth()->user()->id;
    $product_preview = [];
    $i=0;
    $cart_preview = [];
    $x=0;
    $datas = Product::where('is_deleted', FALSE)->get();
    foreach ($datas as $data) {
      $product_preview_data=ProductImage::where('product_id', $data->id)->first();
      $product_preview[$i] = $product_preview_data;
      $i=$i+1;
    }

    $carts=Cart::where(['user_id' => $user_id, 'is_checkouted' => FALSE])->get();
    foreach ($carts as $cart) {
      $cart_preview_data=ProductImage::where('product_id', $cart->product->id)->first();
      $cart_preview[$x] = $cart_preview_data;
      $x=$x+1;
    }
    return view('public/okelah/index', compact('datas', 'product_preview', 'carts', 'cart_preview'));
  }

  public function category($id){

    $product_preview = [];
    $i=0;
    $message=ReferenceSchoolType::where('id', $id)->first();
    $datas = Product::where(['is_deleted' => FALSE, 'reference_school_type_id' => $id])->get();
    foreach ($datas as $data) {
      $product_preview_data=ProductImage::where('product_id', $data->id)->first();
      $product_preview[$i] = $product_preview_data;
      $i=$i+1;
    }
    return view('public/okelah/category', compact('datas', 'product_preview', 'message'));
  }

  public function checkout()
  {
    return view('public/okelah/checkout');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  public function addcart(Request $request, $idEn)
  {
    $id=Crypt::decrypt($idEn);
    $user_id = auth()->user()->id;
    $rules = [
        'qty'                 => 'required|min:1'
    ];

    $messages = [
        'qty.required'        => 'Jumlah Barang wajib diisi',
        'qty.min'             => 'Jumlah Barang minimal 1'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput($request->all);
    }

    $check=Cart::where(['user_id' => $user_id, 'product_id' => $id])->first();

    if($check == null){
      $cart = new Cart;
      $cart->user_id = $user_id;
      $cart->product_id = $id;
      $cart->qty = $request->qty;
      $cart->is_checkouted = FALSE;
      $save = $cart->save();
    }else{
      $newqty=$request->qty + $check->qty;
      $cart = Cart::findOrFail($check->id);
      $cart->update([
            'qty'   => $newqty
        ]);
    }

    return redirect()->route('publicokelahindex');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($idEn)
  {
    $id=Crypt::decrypt($idEn);
    $product=Product::where('id', $id)->first();
    $product_images=ProductImage::where('product_id', $product->id)->get();
    return view('public/okelah/view', compact('product', 'product_images'));
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
