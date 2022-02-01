@extends('layouts.guest')
@section('content')
<div class="min-h-screen container mx-auto px-4 sm:px-8">
  <div class="py-8 justify-center">
    <div>
      <h1 class="mb-12 text-center text-2xl text-black font-bold">Tiket Dengan Kode : #{{$data->code}}</h1>
      <section class=" py-1">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
          @if($data->is_finished != TRUE)
          <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
              <span class="font-medium">Tiket Aktif
              </div>
            </div>
            @else
            <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
              <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <div>
                <span class="font-medium">Tiket Sudah Ditutup
                </div>
              </div>
              @endif
              @if($data->is_finished != TRUE)
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6 bg-red-500">
                  <div class="text-center flex justify-between">
                    <h6 class="text-white text-xl font-bold">
                      {{$data->title}}
                    </h6>
                  </div>
                </div>
                @php
                $idEn=Crypt::encrypt($data->id);
                @endphp
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form action="{{ url('/public/complaint/ticketing/reply', array($idEn))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                      Reply  <span class="text-xs text-red-500"><i>*required</i></span>
                    </h6>
                    <div class="flex justify-center flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <textarea type="text" name="message" id="message" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required></textarea>
                        </div>
                      </div>
                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input type='file' id="file" name="file" hidden>
                          </label>
                          <span id="file_name"></span>
                          <div class="container mt-3" id="alertbox">
                            <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                            role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path
                              d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p>File Berekstensi *.pdf, *.png, atau *.jpg Dengan Maksimal Size 2MB</p>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="md:flex md:items-center">
                      <div class="md:w-1/3">
                        <button class="shadow bg-green-600 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                          Submit
                        </button>
                      </div>
                      <div class="md:w-2/3"></div>
                    </div>
                  </form>
                </div>
              </div>
              @endif
            </div>
            <h1 class="mb-12 text-center text-xl text-black font-bold">Balasan Tiket</h1>
            @foreach($messages as $message)
            <article class="border w-2/4 mx-auto border-gray-400 rounded-lg md:p-4 bg-white sm:py-3 py-4 px-2 m-10" data-article-path="/hagnerd/setting-up-tailwind-with-create-react-app-4jd" data-content-user-id="112962">
              <div role="presentation">
                <div>
                  <div class="m-2">
                    <div class="flex items-center">
                      <div class="mr-2">
                        <a href="/hagnerd">
                          <img class="rounded-full w-8" src="{{ asset('storage/avatar/' . $message->user->avatar_file) }}" loading="lazy">
                        </a>
                      </div>
                      <div>
                        <p>
                          <a class="text text-gray-700 text-sm hover:text-black">{{$message->user->first_name}} {{$message->user->last_name}}</a>
                        </p>
                        <a href="/hagnerd/setting-up-tailwind-with-create-react-app-4jd" class="text-xs text-gray-600 hover:text-black">
                          <time datetime="2019-08-02T13:58:42.196Z">{{$message->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</time>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="pl-12 md:pl-10 xs:pl-10">
                    <div class="mb-1 leading-6">
                      {!! $message->message !!}
                    </div>
                    @if($message->file != null)
                    <div class="flex justify-between items-center">
                      <div class="flex">
                        <a href="{{ asset('storage/ticketing/' . $message->file) }}" class="py-1 pl-1 pr-2 text-gray-600 text-sm rounded hover:bg-gray-100 hover:text-black">
                          <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                          </svg>
                          Lampiran
                        </a>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </article>
            @endforeach
          </section>
        </div>
      </div>
    </div>
    <script>
    var konten = document.getElementById("message");
    CKEDITOR.replace(konten,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
    <script>
    let file = document.getElementById('file');
    let file_name = document.getElementById('file_name');

    file.addEventListener('change', function(){
      if(this.files.length)
      file_name.innerText = this.files[0].name;
      else
      file_name.innerText = '';
    });
  </script>
  @endsection
