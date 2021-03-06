@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-white py-14">
  <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <div class="md:flex no-wrap md:-mx-2 ">
      <!-- Left Side -->
      <div class="w-full md:w-3/12 md:mx-2">
        <!-- Profile Card -->
        <div class="bg-white p-3 border-t-4 border-green-400">
          <div class="image overflow-hidden">
            <img class="h-64 w-64 mx-auto"
            src="{{ asset('storage/avatar/' .$user->avatar_file) }}">
          </div>
          <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->first_name}} {{$user->last_name}}</h1>
          <ul
          class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
          <li class="flex items-center py-3">
            <span>Status</span>
            <span class="ml-auto"><span
              class="bg-green-500 py-1 px-2 rounded text-white text-sm">Guest</span></span>
            </li>
            <li class="flex items-center py-3">
              <span>Member since</span>
              <span class="ml-auto">{{$user->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</span>
            </li>
          </ul>
        </div>
        <div class="my-4"></div>
      </div>
      <div class="w-full md:w-9/12 mx-2">
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
            <span clas="text-green-500">
              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </span>
          <span class="tracking-wide">Tentang</span>
        </div>
        <div class="text-gray-700">
          <div class="grid md:grid-cols-2 text-sm">
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Nama Depan</div>
              <div class="px-4 py-2">{{$user->first_name}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Nama Belakang</div>
              <div class="px-4 py-2">{{$user->last_name}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Nomor Induk Kependudukan</div>
              <div class="px-4 py-2">{{$user->id_number}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">E-Mail</div>
              <div class="px-4 py-2">{{$user->email}}</div>
            </div>
          </div>
        </div>
        <button
        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
        Edit Profil</button>
      </div>
      <!-- End of about section -->

      <div class="my-4"></div>

      <!-- Experience and education -->
      <div class="bg-white p-3 shadow-sm rounded-sm">

        <div class="grid grid-cols-2">
          <div>
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
              <span clas="text-green-500">
                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </span>
            <span class="tracking-wide">Alamat</span>
          </div>
          <ul class="list-inside space-y-2">
            @foreach($addresses as $address)
            <li>
              <div class="text-teal-600">{{$address->address}}</div>
              <div class="text-teal-600">{{$address->village}}, {{$address->district}}, {{$address->city}}</div>
              <div class="text-teal-600">{{$address->province}}, {{$address->zip_code}}</div>
              <div class="text-gray-500 text-xs">Ditambahkan pada {{$address->created_at->formatLocalized("%H:%M, %d/%m/%Y")}}</div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
