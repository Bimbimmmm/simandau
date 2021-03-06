@extends('layouts.operator')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">AKUN BANK</h2>
    </div>
    <div class="my-2 flex sm:flex-row flex-col">
      <div class="block relative">
        <a class="text-white" href="/operator/bank/create">
          <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-200 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div>
              <p class=" text-xs font-bold ml-2 ">
                TAMBAH BANK
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
          <thead>
            <tr>
              <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
              Nama Bank
            </th>
            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Nama Pemilik Rekening
          </th>
            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Nomor Rekening
          </th>
          <th
          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
          Tanggal Ditambahkan
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
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-900" colspan="5">Belum Ada Data Akun Rekening</td>
  </tr>
  @else
  @foreach($datas as $data)
  <tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <div class="flex items-center">
        <div class="ml-3">
          <p class="text-gray-900 whitespace-no-wrap">
            {{$data->bank_name}}
          </p>
        </div>
      </div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <div class="text-gray-900 whitespace-no-wrap">{{$data->owner_name}}</div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <p class="text-gray-900 whitespace-no-wrap">
        {{$data->account_number}}
      </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <p class="text-gray-900 whitespace-no-wrap">
        {{$data->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}
      </p>
    </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <a href="{{ url ('/operator/bank/store', array("$data->id")) }}" class="text-red-600 hover:text-red-400    ml-2">
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
