@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">BERITA</h2>
    </div>
    <div class="my-2 flex sm:flex-row flex-col">
      <div class="block relative">
        <a class="text-white" href="/administrator/news/create">
          <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-200 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div>
              <p class=" text-xs font-bold ml-2 ">
                BUAT BERITA
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
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Penulis</th>
            <th class="px-4 py-3">Tanggal Dibuat</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach($datas as $data)
          <tr class="text-gray-700 text-center">
            <td class="px-4 py-3 text-ms border font-semibold">{{$data->title}}</td>
            <td class="px-4 py-3 text-ms border">{{$data->author}}</td>
            <td class="px-4 py-3 text-sm border">{{$data->created_at}}</td>
            <td class="px-4 py-3 text-xs border">
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
@endsection
