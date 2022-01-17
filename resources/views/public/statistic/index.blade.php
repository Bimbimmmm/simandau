@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-gray-100 py-14">
  <h1 class="mb-12 text-center text-4xl text-black font-bold">Monitoring Pendidikan Siswa-Siswi</h1>
  <header>
    <form action="/public/statistic/search" method="POST">
        @csrf
    <div class=" mx-auto px-6 py-3">
      <div class="relative max-w-lg mx-auto">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
          <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="number" placeholder="Cari Data Siswa Berdasarkan NISN..." required>
      </div>
    </div>
  </form>
  </header>
</div>
@endsection
