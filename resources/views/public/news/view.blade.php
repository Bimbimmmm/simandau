@extends('layouts.guest')
@section('content')
<div class="mt-6 bg-gray-200">
  <div class=" px-10 py-6 mx-auto">
    <div class="max-w-6xl px-10 py-6 mx-auto bg-gray-50">
      <a class="block">
        <img class="object-cover w-full h-full xl:w-1/2 shadow-sm xl:h-1/2" src="{{ asset('storage/news/' . $data->header_image) }}">
      </a>
      <div class="mt-2">
        <a class="sm:text-3xl md:text-3xl lg:text-3xl xl:text-4xl font-bold text-blue-700">{{$data->title}}</a>
        <div class="font-light text-gray-600">
          <a class="flex items-center mt-6 mb-6"><img
            src="{{ asset('images/kaltara.png') }}"
            alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block">
            <h1 class="font-bold text-gray-700 hover:underline">Oleh {{$data->author}}</h1>
          </a>
        </div>
      </div>
      <div class="max-w-4xl mx-auto text-xl text-gray-700 rounded bg-gray-100">
        <p class="text-justify">
          {!! $data->content !!}
        </p>
        <a class="block">
          <img class="object-cover w-3/5 shadow-sm h-9/12" src="{{ asset('storage/news/' . $data->content_image) }}">
        </a>
      </div>
    </div>
    <h2 class="text-2xl mt-4 text-gray-500 font-bold text-center">Berita Lainnya</h2>
    <div class="flex grid h-full grid-cols-12 pb-10 mt-8 sm:mt-16">
      <div class="grid grid-cols-12 col-span-12">
        @foreach($newss as $news)
        @if($news->id != $data->id)
        <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4 mb-4 mr-4">
          <a class="block transition duration-200 ease-out transform hover:scale-110">
            <img class="object-cover w-full shadow-sm h-full" src="{{ asset('storage/news/' . $news->header_image) }}">
          </a>
          <div class="w-full flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
            <h2 class="text-base text-gray-500 font-bold sm:text-lg md:text-xl"><a href="{{ url ('/public/news/view', array("$news->title")) }}">{{$news->title}}</a></h2>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    @php
    $idEn=Crypt::encrypt($data->id);
    @endphp
    @if (!Auth::guest())
    <div class="max-w-4xl py-16 xl:px-8 flex justify-center mx-auto">
      <div class="w-full mt-16 md:mt-0 ">
        <form action="/public/news/store" method="POST" class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
          @csrf
          <h3 class="mb-6 text-2xl font-medium text-center">Tulis Komentar</h3>
          <textarea type="text" name="comment" class="w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Tuliskan Komentarmu" rows="5" cols="33"></textarea>
          <input type="hidden" name="idEn" value="{{ $idEn }}">
          <button type="submit" class=" text-white px-4 py-3 bg-blue-500  rounded-lg">Kirim Komentar</button>
        </form>
      </div>
    </div>
    @else
    <div class="max-w-4xl py-16 xl:px-8 flex justify-center mx-auto">
      <div class="w-full mt-16 md:mt-0 ">
        <form action="/login"  class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
          <h3 class="mb-6 text-2xl font-medium text-center">Tulis Komentar</h3>
          <textarea  class="w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Tuliskan Komentarmu" rows="5" cols="33"></textarea>
          <button type="submit" class=" text-white px-4 py-3 bg-blue-500  rounded-lg">Kirim Komentar</button>
        </form>
      </div>
    </div>
    @endif

    <div class="max-w-4xl px-10 py-16 mx-auto bg-gray-100  bg-white min-w-screen animation-fade animation-delay  px-0 px-8 mx-auto sm:px-12 xl:px-5">
      <p class="mt-1 text-xl font-bold text-left text-gray-800 sm:mx-6 sm:text-2xl md:text-3xl lg:text-4xl sm:text-center sm:mx-0">
        Semua Komentar
      </p>
      @foreach($comments as $comment)
      <div class="flex  items-center w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
        @if($comment->user->avatar_file != null)
        <a class="flex items-center mt-6 mb-6 mr-6"><img src="{{ asset('storage/avatar/' . $comment->user->avatar_file) }}" alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block"></a>
        @else
        <a class="flex items-center mt-6 mb-6 mr-6"><img src="{{ asset('storage/avatar/default.png') }}" alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block"></a>
        @endif
        <div><h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl">{{$comment->user->first_name}} {{$comment->user->last_name}}</h3>
          <p class="text-sm font-bold text-gray-300">{{$comment->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</p>
          <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
            {{$comment->comment}}
          </p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
</div>
@endsection
