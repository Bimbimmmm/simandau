@extends('layouts.guest')
@php
$total_price=0;
$i=0;
$totp=0;
$total_cost_encrypted=0;
$shipping_cost_encrypted=0;
$fp=0;
$cart_id=[];
$x=-1;
@endphp
@section('content')
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="hidden w-full text-gray-600 md:flex md:items-center">
            <a href="/public/okelah">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
            </a>
          </div>
          <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
            Detail Keranjang
          </div>
          <div class="flex items-center justify-end w-full">
          </div>
        </div>
      </div>
    </header>
    <div class="flex-1">
      <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Nama Produk</th>
            <th class="text-left">Asal Produk</th>
            <th class="hidden text-right md:table-cell">Jumlah Produk</th>
            <th class="hidden text-right md:table-cell">Harga Produk</th>
            <th class="hidden text-right md:table-cell">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          @foreach($carts as $cart)
          <tr>
            <td class="hidden pb-4 md:table-cell">
              <a>
                <img src="{{ asset('storage/product/' . $product_preview[$i]->file) }}" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a>
                <p class="mb-2 md:ml-4">{{$cart->product->name}}</p>
              </a>
            </td>
            <td>
              <a>
                <p class="mb-2 md:ml-4">{{$cart->product->schoolOperator->school->school_name}}</p>
              </a>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                {{$cart->qty}}
              </span>
            </td>
            @php
            $price = number_format($cart->product->price,2,',','.');
            $tot = $cart->qty * $cart->product->price;
            $total = number_format($tot,2,',','.');
            $totp = $totp + $tot;
            $total_cost_encrypted=Crypt::encrypt($totp);
            $shipping_cost_encrypted=Crypt::encrypt($shippingCost);
            $total_price = number_format($totp,2,',','.');
            $shipping_cost = number_format($shippingCost,2,',','.');
            $pf = $shippingCost + $totp;
            $final_price = number_format($pf,2,',','.');
            $i=$i+1;
            @endphp
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                Rp. {{$price}}
              </span>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                Rp. {{$total}}
              </span>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <hr class="pb-6 mt-6">
      <form action="{{ route('userpay')}}" method="POST">
          @csrf
        <div class="my-4 mt-6 -mx-2 lg:flex">
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Alamat Pengiriman</h1>
          </div>
          <div class="p-4">
            <div class="justify-center md:flex">
              <p class="mb-4 text-base">{{$address->address}}, {{$address->village}}, {{$address->district}}, {{$address->city}}, {{$address->province}}, {{$address->zip_code}}</p>
            </div>
          </div>
          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Catatan Untuk Penjual</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">Masukkan catatan mengenai detail pengiriman</p>
            <textarea name="notes" class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
          </div>
        </div>
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Detail Pesanan</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">Ongkos kirim dan ongkos packing dihitung berdasarkan berat barang dan jarak pengiriman</p>
              <div class="flex justify-between border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                  Subtotal
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                  Rp. {{$total_price}}
                </div>
              </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Ongkos Kirim
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    Rp. {{$shipping_cost}}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    Rp . {{$final_price}}
                  </div>
                </div>
              <input type="hidden" id="tce" name="tce" value="{{$total_cost_encrypted}}">
              <input type="hidden" id="sce" name="sce" value="{{$shipping_cost_encrypted}}">
              @foreach($carts as $cart)
              @php
              $x=$x+1;
              $pie=Crypt::encrypt($cart->id);
              @endphp
              <input type="hidden" id="cart_id[{{$x}}]" name="cart_id[{{$x}}]" value="{{$pie}}">
              @endforeach
              <a>
                <button type="submit" class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                  <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                  <span class="ml-2 mt-5px">Procceed to checkout</span>
                </button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
