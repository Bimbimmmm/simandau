@extends('layouts.guest')
@php
$i=0;
@endphp
@section('content')
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="hidden w-full text-gray-600 md:flex md:items-center">
            <a href="/public/okelah/payment">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
            </a>
          </div>
          <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
            Payment Details
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
            <th class="text-left">Nama Bank</th>
            <th class="hidden text-right md:table-cell">Nomor Rekening</th>
            <th class="hidden text-right md:table-cell">Pemiilik Rekening</th>
          </tr>
        </thead>
        <tbody>
          @for($a=0 ; $a < $count; $a++)

          <tr>
            <td class="hidden pb-4 md:table-cell">
              <a>
                <img src="{{ asset('storage/bank/' . $bank_account[$a][$a]->bank_icon) }}" class="w-32 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a>
                <p class="mb-2 md:ml-4">{{$bank_account[$a][$a]->bank_name}}</p>
              </a>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                {{$bank_account[$a][$a]->account_number}}
              </span>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                {{$bank_account[$a][$a]->owner_name}}
              </span>
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
      <hr class="pb-6 mt-6">
      <div class="my-4 mt-6 -mx-2 lg:flex">
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">
              Pembayaran dapat dikirimkan ke rekening sekolah, jika memesan dari dua sekolah berbeda, dapat
              melakukan pembayaran ke rekening sekolah masing-masing
            </p>
            <div class="flex justify-between border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Product
              </div>
              @foreach($gets as $get)
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$get->cart->qty}} X {{$get->cart->product->name}}
              </div>
              @endforeach
            </div>
            @php
            $shipping_cost = "Rp. " . number_format($data->shipping_cost,2,',','.');
            $subtotal = "Rp. " . number_format($data->total_cost,2,',','.');
            $a=$data->shipping_cost+$data->total_cost;
            $total = "Rp. " . number_format($a,2,',','.');
            @endphp
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Subtotal
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$subtotal}}
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Shipping Cost
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$shipping_cost}}
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Total
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$total}}
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Status
              </div>
              @if($data->is_payed == true)
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$data->status}}
              </div>
              @else
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                {{$data->status}}
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="lg:px-2 lg:w-1/2">
          @if(session('errors'))
          @foreach ($errors->all() as $error)
          <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center">
            <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
              <path fill="currentColor"  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path>
            </svg>
            <span class="text-red-800">{{ $error }}</span>
          </div>
          @endforeach
          @endif
          @if($data->is_payed == true)
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Payment Details</h1>
          </div>
          <p class="mb-6 italic">
            Pembayaran berhasil, menunggu diverifikasi oleh penjual dan dikirim
          </p>
          <div class="flex justify-between border-b">
            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
              Date Payed
            </div>
            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
              {{$data->date_payed}}
            </div>
          </div>
          @else
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Payment Proof</h1>
          </div>
          <p class="mb-6 italic">
            Jika melakukan pembayaran kepada lebih dari satu sekolah silahkan mengupload bukti transfer
            dalam satu file pdf / foto
          </p>
          <form action="{{ route('paymentproof', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex w-full h-48 items-center justify-center bg-grey-lighter">
              <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-blue-900">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">Select a file</span>
                <input id="paymentproof" name="paymentproof" type='file' class="hidden" />
              </label>
            </div>
            <span id="payment_proof"></span>
            <button type="submit" class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
              </svg>
              <span class="ml-2 mt-5px">Upload Payment Proof</span>
            </button>
          </div>
        </form>
        @endif
        @if($data->shipping_number != null)
        <div class="flex justify-between border-b">
          <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
            Date Shipped
          </div>
          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
            {{$data->date_shipped}}
          </div>
        </div>
        <div class="flex justify-between border-b">
          <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
            Airwaybill
          </div>
          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
            {{$data->shipping_number}} by {{$data->shipping_carrier}}
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
<script>
let paymentproof = document.getElementById('paymentproof');
let payment_proof = document.getElementById('payment_proof');

paymentproof.addEventListener('change', function(){
  if(this.files.length)
      payment_proof.innerText = this.files[0].name;
  else
      payment_proof.innerText = '';
});
</script>
@endsection
