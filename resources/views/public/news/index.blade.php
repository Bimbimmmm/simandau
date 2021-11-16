@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-gray-100 py-14">
  <div class="px-5 mx-auto max-w-7x1">
    <div class="flex flex-wrap w-full mb-4 p-4">
      <div class="w-full mb-6 lg:mb-0">
        <h1 class="sm:text-4xl text-5xl font-medium font-bold title-font mb-2 text-gray-900">Berita</h1>
        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
      </div>
    </div>
    <div class="flex flex-wrap -m-4">
      @foreach($newss as $news)
      @php
      $caption = substr($news->content, 0, 250);
      $idEn=Crypt::encrypt($news->id);
      @endphp
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="{{ asset('storage/news/' . $news->header_image) }}" alt="Image Size 720x400">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{$news->author}}</h3>
          <a href="{{ url ('/public/news/view', array("$idEn")) }}"><h2 class="text-lg text-gray-900 font-medium title-font mb-4 hover:underline">{{$news->title}}</h2></a>
          <p class="leading-relaxed text-base">{!! $caption !!}....</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
