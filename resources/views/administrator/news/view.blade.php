@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">LIHAT BERITA</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <tbody class="bg-white">
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Judul</td>
            <td class="px-4 py-3 text-ms border">{{$news->title}}</td>
          </tr>
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Penulis</td>
            <td class="px-4 py-3 text-ms border">{{$news->author}}</td>
          </tr>
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Isi Berita</td>
            <td class="px-4 py-3 text-ms border">{!! $news->content !!}</td>
          </tr>
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Foto Header</td>
            <td class="px-4 py-3 text-ms border">
              <img src="{{ asset('storage/news/' . $news->header_image) }}" class="w-1/3">
            </td>
          </tr>
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Foto Konten</td>
            <td class="px-4 py-3 text-ms border">
              <img src="{{ asset('storage/news/' . $news->content_image) }}" class="w-1/3">
            </td>
          </tr>
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">Tanggal Dibuat</td>
            <td class="px-4 py-3 text-ms border">{{$news->created_at}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">KOMENTAR</h2>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Isi Komentar</th>
            <th class="px-4 py-3">Tanggal Komentar</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($comments as $comment)
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$comment->user->first_name}} {{$comment->user->last_name}}</td>
            <td class="px-4 py-3 text-ms border">{{$comment->comment}}</td>
            <td class="px-4 py-3 text-sm border">{{$comment->created_at}}</td>
            <td class="px-4 py-3 text-xs border">
              <a href="{{ url ('/administrator/news/destroycomment', array("$comment->id")) }}" class="text-red-600 hover:text-red-400    ml-2">
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
