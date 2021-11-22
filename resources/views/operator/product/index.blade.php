@extends('layouts.operator')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">PRODUK OKELAH</h2>
    </div>
    @if($count > 0)
    <div class="my-2 flex sm:flex-row flex-col">
      <div class="block relative">
        <a class="text-white" href="/operator/product/create">
          <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-200 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div>
              <p class=" text-xs font-bold ml-2 ">
                TAMBAH PRODUK
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    @else
    <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
      <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
        <path fill="currentColor" d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path>
      </svg>
      <span class="text-red-800"> Anda Belum Menambahkan Nomor Rekening! </span>
    </div>
    @endif
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
          <thead>
            <tr>
              <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
              Nama Produk
            </th>
            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Deskripsi Produk
          </th>
          <th
          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
          Harga
        </th>
        <th
        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
        Status
      </th>
      <th
      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
      Aksi
    </th>
  </tr>
</thead>
<tbody>
  @if($count == 0)
  <tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-900" colspan="5">Belum Ada Data Produk</td>
  </tr>
  @else
  @foreach($datas as $data)
  <tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <div class="flex items-center">
        <div class="ml-3">
          <p class="text-gray-900 whitespace-no-wrap">
            {{$data->name}}
          </p>
        </div>
      </div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <div class="text-gray-900 whitespace-no-wrap">{!! $data->description !!}</div>
    </td>
    @php
    $price = number_format($data->price,2,',','.');
    @endphp
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <p class="text-gray-900 whitespace-no-wrap">
        Rp. {{$price}}
      </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      @if($data->is_available == TRUE)
    <span
      class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
      <span aria-hidden
      class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
      <span class="relative">Tersedia</span>
    </span>
    @else
    <span
      class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
      <span aria-hidden
      class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
      <span class="relative">Tidak Tersedia</span>
    </span>
    @endif
    </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <a href="#" class="text-green-600 hover:text-green-400 mr-2">
      <i class="material-icons-outlined text-base">visibility</i>
    </a>
    <a href="#" class="text-yellow-600 hover:text-yellow-400  mx-2">
      <i class="material-icons-outlined text-base">edit</i>
    </a>
    <a href="#" class="text-red-600 hover:text-red-400    ml-2">
      <i class="material-icons-round text-base">delete_outline</i>
    </a>
  </td>
</div>
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
