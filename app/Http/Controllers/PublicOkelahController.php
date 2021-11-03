<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use Alert;
use GuzzleHttp\Client;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\ReferenceSchoolType;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\UserAddress;

class PublicOkelahController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $product_preview = [];
    $i=0;
    $cart_preview = [];
    $x=0;

    $datas = Products::where('is_deleted', FALSE)->get();
    foreach ($datas as $data) {
      $product_preview_data=ProductImage::where('product_id', $data->id)->first();
      $product_preview[$i] = $product_preview_data;
      $i=$i+1;
    }
    if(!Auth::check()) {
      $carts=null;
    }else{
      $user_id = auth()->user()->id;
      $carts=Cart::where(['user_id' => $user_id, 'is_checkouted' => FALSE])->get();
      foreach ($carts as $cart) {
        $cart_preview_data=ProductImage::where('product_id', $cart->product_id)->first();
        $cart_preview[$x] = $cart_preview_data;
        $x=$x+1;
      }
    }
    return view('public/okelah/index', compact('datas', 'product_preview', 'carts', 'cart_preview'));
  }

  public function category($id){

    $product_preview = [];
    $i=0;
    $message=ReferenceSchoolType::where('id', $id)->first();
    $datas = Products::where(['is_deleted' => FALSE, 'reference_school_type_id' => $id])->get();
    foreach ($datas as $data) {
      $product_preview_data=ProductImage::where('product_id', $data->id)->first();
      $product_preview[$i] = $product_preview_data;
      $i=$i+1;
    }
    return view('public/okelah/category', compact('datas', 'product_preview', 'message'));
  }

  public function checkout()
  {
    $user_id = auth()->user()->id;
    $product_preview = [];
    $product_weight = 0;
    $weight=0;
    $i=0;
    $carts=Cart::where(['user_id' => $user_id, 'is_checkouted' => FALSE])->get();
    $count=Cart::where(['user_id' => $user_id, 'is_checkouted' => FALSE])->count();
    $address=UserAddress::where('user_id', $user_id)->first();
    if($count == 0){
      Alert::error('Gagal', 'Keranjang Kamu Kosong');
      return redirect()->route('publicokelahindex');
    }else{
      foreach ($carts as $cart) {
        $product_preview_cart=ProductImage::where('product_id', $cart->product_id)->first();
        $product_preview[$i] = $product_preview_cart;
        $product_weight=$product_weight + $cart->product->weight;
        $i=$i+1;
      }
      $weight=$product_weight * 1000;
      //Get Shipping Cost STILL BUG
      /*
      $user=UserAddress::where('user_id', $user_id)->first();

      if (str_contains($user->city, "KABUPATEN")) {
        $cut_city = substr($user->city,10);
        $lower_city = strtolower($cut_city);
        $city = ucfirst($lower_city);
      }
      else if(str_contains($user->city, "KOTA"))
      {
        $cut_city = substr($user->city,5);
        $lower_city = strtolower($cut_city);
        $city = ucfirst($lower_city);

      }
      $city_endpoint = "https://api.rajaongkir.com/starter/city";
      $client_city = new \GuzzleHttp\Client();
      $key = "d03fe88f37177d6a89fdd3a609e31772";
      $get_city = $client_city->request('GET', $city_endpoint, ['query' => [
        'key' => $key
      ]]);
      $statusCode = $get_city->getStatusCode();
      $content = json_decode($get_city->getBody(), true);
      $buyer_city_id=0;
      for ($i=0; $i < 501; $i++) {
        if($content['rajaongkir']['results'][$i]['city_name'] == $city){
          $buyer_city_id = $content['rajaongkir']['results'][$i]['city_id'];
        }
      }
      $cost_endpoint = "https://api.rajaongkir.com/starter/cost";
      $client_cost = new \GuzzleHttp\Client();
      $response = $client_cost->post('https://api.rajaongkir.com/starter/cost', [
        'headers' => ['key' => $key],
        'form_params' => [
          'origin' => '311',
          'destination' => $buyer_city_id,
          'weight' => $weight,
          'courier' => "jne",
        ]
      ]);

      $cost = json_decode($response->getBody(), true);
      $shipping_cost = $cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
      */
      $shippingCost = 15000;
      return view('public/okelah/checkout', compact('carts', 'product_preview', 'address', 'shippingCost'));
    }
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
    $total_cost=Crypt::decrypt($request->tce);
    $shipping_cost=Crypt::decrypt($request->sce);
    $user_id = auth()->user()->id;

    /*$payment = new Payment;
    $payment->user_id = $user_id;
    $payment->status = "Belum Dibayar";
    $payment->total_cost = $total_cost;
    $payment->shipping_cost = $shipping_cost;
    $payment->is_payed = FALSE;
    $payment->is_finished = FALSE;
    $payment->is_pending = FALSE;
    $payment->is_rejected = FALSE;
    $save = $payment->save();
    */
    $data = Payment::where(['user_id' => $user_id, 'total_cost' => $total_cost, 'is_payed' => FALSE])->first();

    $count=count($request->cart_id);
    if($request->cart_id != null){
      for ($i=0; $i < $count; $i++) {
        $cart_id=Crypt::decrypt($request->cart_id[$i]);
        $payment_item = new PaymentItem;
        $payment_item->payment_id = $data->id;
        $payment_item->cart_id = $cart_id;
        $save2 = $payment_item->save();

        $cart = Cart::findOrFail($cart_id);
        $cart->update([
            'is_checkouted' => TRUE
        ]);

      }
    }
    if($save2){
        Alert::success('Berhasil', 'Pembayaran Berhasil Dibuat');
        return redirect()->route('userpaymentindex');
    } else {
        Alert::error('Gagal', 'Gagal Membuat Pembayaran! Silahkan ulangi beberapa saat lagi');
        return redirect()->route('publicokelahindex');
    }
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
    $product=Products::where('id', $id)->first();
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
