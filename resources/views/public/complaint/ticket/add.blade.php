@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-indigo-200 py-14">
  <h1 class="mb-12 text-center text-4xl text-black font-bold">Buat Tiket</h1>
  <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <form action="/public/complaint/ticketing/store" method="POST" class="w-full max-w-lg" enctype="multipart/form-data">
      @csrf
      @if(session('errors'))
      @foreach ($errors->all() as $error)
      <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center">
        <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
          <path fill="currentColor"  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path>
        </svg>
        <span class="text-red-800">{{ $error }}</span>
      </div>
      @endforeach
      @endif
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Prioritas Tiket <span class="text-xs text-red-500"><i>*required</i></span>
          </label>
          <select name="importance_level" id="importance_level" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="">== Pilih Prioritas Tiket ==</option>
            <option value="Tinggi">Tinggi</option>
            <option value="Sedang">Sedang</option>
            <option value="Rendah">Rendah</option>
          </select>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Judul Tiket <span class="text-xs text-red-500"><i>*required</i></span>
          </label>
          <input name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" required>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Pesan <span class="text-xs text-red-500"><i>*required</i></span>
          </label>
          <textarea name="message" id="message" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required></textarea>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Lampiran
          </label>
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
