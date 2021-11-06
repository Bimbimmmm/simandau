@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-gray-100 container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h1 class="mb-12 text-center text-4xl text-black font-bold">Layanan Tiket Pengaduan</h1>
    </div>
    <div class="my-2 flex sm:flex-row flex-col">
      <div class="block relative">
        <a class="text-white" href="/public/complaint/ticketing/create">
          <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-200 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div>
              <p class=" text-xs font-bold ml-2 ">
                BUAT TIKET
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Status / Prioritas</th>
            <th class="px-4 py-3">Tanggal Tiket</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->title}}</td>
            @if($data->is_finished != TRUE)
            <td class="px-4 py-3 text-ms border">
              <span class="inline-block rounded-full text-white bg-indigo-500 px-2 py-1 text-xs font-bold mr-3">Open</span> / {{$data->importance_level}}
            </td>
            @else
            <td class="px-4 py-3 text-ms border">
              <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs font-bold mr-3">Selesai</span> / {{$data->importance_level}}
            </td>
            @endif
            @php
            $idEn=Crypt::encrypt($data->id);
            @endphp
            <td class="px-4 py-3 text-sm border">{{$data->created_at}}</td>
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/public/complaint/ticketing/show', array($idEn)) }}" class="text-green-600 hover:text-green-400 mr-2">
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
