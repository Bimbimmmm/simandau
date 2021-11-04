@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center mb-6 leading-tight">PRODUK OKELAH</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Nama Produk</th>
            <th class="px-4 py-3">Deskripsi Produk</th>
            <th class="px-4 py-3">Harga</th>
            <th class="px-4 py-3">Asal Produk</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          @php
          $price = number_format($data->price,2,',','.');
          @endphp
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->name}}</td>
            <td class="px-4 py-3 text-ms border">{!! $data->description !!}</td>
            <td class="px-4 py-3 text-sm border">Rp. {{$price}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->schoolOperator->school->school_name}}</td>
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/administrator/product/destroy', array("$data->id")) }}" class="text-red-600 hover:text-red-400    ml-2">
                <i class="material-icons-round text-base">delete_outline</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
@endsection
