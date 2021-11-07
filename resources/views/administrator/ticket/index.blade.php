@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight mb-5">TIKET</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Nama Pelapor</th>
            <th class="px-4 py-3">Status / Prioritas</th>
            <th class="px-4 py-3">Tanggal Dibuat</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->title}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->user->first_name}} {{$data->user->last_name}}</td>
            <td class="px-4 py-3 text-ms border">
              @if($data->is_finished == FALSE)
              <span class="inline-block rounded-full text-white bg-blue-500 px-2 py-1 text-xs font-bold mr-3">Aktif</span>
              @elseif($data->is_finished == TRUE && $data->is_deleted == FALSE)
              <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs font-bold mr-3">Selesai</span>
              @elseif($data->is_deleted == TRUE)
              <span class="inline-block rounded-full text-white bg-red-500 px-2 py-1 text-xs font-bold mr-3">Dihapus</span>
              @endif
              / {{$data->importance_level}}
            </td>
            <td class="px-4 py-3 text-sm border">{{$data->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</td>
            @php
            $idEn=Crypt::encrypt($data->id);
            @endphp
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/administrator/ticket/show', array("$idEn")) }}" class="text-green-600 hover:text-green-400 mr-2">
                <i class="material-icons-outlined text-base">visibility</i>
              </a>
              @if($data->is_deleted == TRUE)
              @else
              <a href="{{ url ('/administrator/ticket/destroy', array("$idEn")) }}" class="text-red-600 hover:text-red-400    ml-2">
                <i class="material-icons-round text-base">delete_outline</i>
              </a>
              @endif
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
