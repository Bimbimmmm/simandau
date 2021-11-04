@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center mb-6 leading-tight">TRANSAKSI OKELAH</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">ID Pesanan</th>
            <th class="px-4 py-3">Nama Pemesan</th>
            <th class="px-4 py-3">Alasan Penolakan</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          @php
          $price = number_format($data->price,2,',','.');
          $idEn=Crypt::encrypt($data->id);
          @endphp
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->id}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->user->first_name}} {{$data->user->last_name}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->pending_reason}}</td>
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/administrator/transaction/show', array("$idEn")) }}" class="text-green-600 hover:text-green-400 mr-2">
                <i class="material-icons-outlined text-base">visibility</i>
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
