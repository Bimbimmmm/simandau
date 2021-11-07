@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight mb-6">Surat Masuk</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Tanggal Masuk</th>
            <th class="px-4 py-3">Nama Pengirim</th>
            <th class="px-4 py-3">Institusi</th>
            <th class="px-4 py-3">Judul Surat</th>
            <th class="px-4 py-3">Prioritas</th>
            <th class="px-4 py-3">Kontak Pengirim</th>
            <th class="px-4 py-3">File Surat</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</td>
            @if($data->user_id == null)
            <td class="px-4 py-3 text-ms border">{{$data->full_name}}</td>
            @else
            <td class="px-4 py-3 text-ms border">{{$data->user->first_name}} {{$data->user->last_name}}</td>
            @endif
            <td class="px-4 py-3 text-sm border">{{$data->institution}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->title}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->importance_level}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->contact}}</td>
            <td class="px-4 py-3 text-sm border">
              <a href="{{ asset('storage/incoming_mail/' . $data->file) }}">{{$data->file}}</a>
            </td>
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/administrator/mail/destroy', array("$data->id")) }}" class="text-red-600 hover:text-red-400    ml-2">
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
