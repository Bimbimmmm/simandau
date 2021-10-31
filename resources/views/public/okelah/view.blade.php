@extends('layouts.guest')
@php
$i=1;
$x=0;
$a=1;
@endphp
@section('content')
<div class="py-16">
  <!-- ./ Breadcrumbs -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <div class="flex flex-col md:flex-row -mx-4">
      <div class="md:flex-1 px-4">
        <div x-data="{ image: 1 }" x-cloak>
          <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
            @foreach($product_images as $product_image)
            <div x-show="image === {{$i}}" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
              <span class="text-5xl">
                <img src="{{ asset('storage/product/' . $product_image->file) }}" alt="">
              </span>
            </div>
            @php
            $i=$i+1;
            @endphp
            @endforeach
          </div>
          @php
          $x=$i-1;
          @endphp
          <div class="flex -mx-2 mb-4">
            @foreach($product_images as $product_image)
              <div class="flex-1 px-2">
                <button x-on:click="image = {{$a}}" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === {{$a}} }" class="focus:outline-none w-full rounded-lg h-12 md:h-24 bg-gray-100 flex items-center justify-center">
                  <span class="text-2xl">
                    <img src="{{ asset('storage/product/' . $product_image->file) }}" class="h-12 md:h-24">
                  </span>
                </button>
              </div>
              @php
              $a=$a+1;
              @endphp
            @endforeach
          </div>
        </div>
      </div>
      <div class="md:flex-1 px-4">
        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{$product->name}}</h2>
        <p class="text-gray-500 text-sm">By <a class="text-indigo-600">{{$product->schoolOperator->school->school_name}}</a></p>
        @php
        $idEnOkelah=Crypt::encrypt($product->id);
        $price = number_format($product->price,2,',','.');
        @endphp
        <div class="flex items-center space-x-4 my-4">
          <div>
            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
              <span class="text-indigo-400 mr-1 mt-1">Rp</span>
              <span class="font-bold text-indigo-600 text-3xl">{{$price}}</span>
            </div>
          </div>
        </div>

        <p class="text-gray-500">{!! $product->description !!}</p>

        <div class="flex py-4 space-x-4">
          <div class="relative">
            <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>
            <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>


          </div>

          <button type="button" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
            Tambahkan Ke Keranjang
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
