@extends('layouts.guest')
@php
$i=0;
@endphp
@section('content')
<div class="bg-gray-100">
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
        OKELAH
      </div>
      <div class="flex items-center justify-end w-full">
      </div>
    </div>
    <h3 class="text-gray-600 text-sm font-medium md:text-center capitalize">
      Produk Kerajinan Siswa - Siswi {{$message->type}}
    </h3>
  </div>
</header>
<main class="my-8">
  <div class="container mx-auto px-6">
    <div class="mt-16">
      @foreach($datas as $data)
      @php
      $idEnOkelah=Crypt::encrypt($data->id);
      $price = number_format($data->price,2,',','.');
      @endphp
      <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
          <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ asset('storage/product/' . $product_preview[$i]->file) }}')">
            <button onclick="window.location='{{ url ('/public/okelah/view', array( $idEnOkelah )) }}'" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
              <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </button>
          </div>
          <div class="px-5 py-3">
            <h3 class="text-blue-300">{{$data->schoolOperator->school->school_name}}</h3>
            <h3 class="text-gray-700 uppercase">{{$data->name}}</h3>
            <span class="text-gray-500 mt-2">Rp. {{$price}}</span>
          </div>
        </div>
      </div>
      @php
      $i=$i+1;
      @endphp
      @endforeach
    </div>
  </div>
</main>
</div>
@endsection
