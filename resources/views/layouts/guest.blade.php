<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SIMANDAU</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/materialicons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/alpine.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('js/echart.js') }}"></script>
</head>
<body class="font-roboto">
  @include('sweetalert::alert')
  <div class="flex flex-wrap h-screen" x-data="{open: false , isOpen: false }">
    <section class="relative mx-auto">
      <!-- navbar -->
      <nav class="flex sticky top-0 z-50 justify-between bg-white text-yellow-900 w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a class="text-3xl font-bold font-heading" href="#">
            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
            SIMANDAU
          </a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li><a class="hover:text-yellow-600" href="/">Home</a></li>
            <li><a class="hover:text-yellow-600" href="/public/news">Berita</a></li>
            <li><a class="hover:text-yellow-600" href="/public/okelah">OKELAH</a></li>
            <li><a class="hover:text-yellow-600" href="/public/statistic">Statistik</a></li>
            <li><a class="hover:text-yellow-600" href="/public/aboutus">Tentang Kami</a></li>
            <li><a class="hover:text-yellow-600" href="/public/complaint">Layanan Pengaduan</a></li>
            <li><a class="hover:text-yellow-600" href="/public/mail">Layanan Persuratan</a></li>
          </ul>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5 items-center">
            <!-- Sign In / Register      -->
            <button @click="open = !open" class="flex items-center hover:text-yellow-600" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </button>
          </div>
        </div>
        <div x-show="open" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 mt-20 mr-8" style="width:20rem;">
          @if (!Auth::guest())
          <div class="py-2">
            <a href="/public/profile" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
              @if(auth()->user()->avatar_file != null)
              <img class="h-8 w-8 rounded-full object-cover mx-1" src="{{ asset('storage/avatar/' . auth()->user()->avatar_file) }}" alt="avatar">
              @else
              <img class="h-8 w-8 rounded-full object-cover mx-1" src="{{ asset('storage/avatar/default.png') }}" alt="avatar">
              @endif
              <p class="text-gray-600 text-sm mx-2">
                <span class="font-bold" href="#">{{auth()->user()->first_name}} {{auth()->user()->last_name}}
                </p>
              </a>
              <a href="/public/okelah/payment" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <p class="text-gray-600 text-sm mx-2">
                  <span class="font-bold" href="#">Payment History
                  </p>
                </a>
              </div>
              @endif
              @if (!Auth::guest())
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="block bg-gray-800 text-white text-center font-bold py-2">
                  <button href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
                </a>
              </form>
              @else
              <a href="/login" class="block bg-gray-800 text-white text-center font-bold py-2">Log In</a>
              @endif
            </div>
            <!-- Responsive navbar -->
            <div class="navbar-burger self-center mr-6 xl:hidden">
              <button @click="isOpen = !isOpen" type="button" class="text-yellow-900 hover:text-yellow-600 focus:outline-none focus:text-yellow-900" aria-label="toggle menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-yellow-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
              </button>
            </div>
          </nav>
          <nav :class="isOpen ? '' : 'hidden'" class="xl:hidden sm:flex sm:justify-center sm:items-center mb-4 ml-4">
            <div class="flex flex-col sm:flex-row">
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Home</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Berita</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">OKELAH</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Statistik</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Tentang Kami</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Layanan Pengaduan</a>
              <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Layanan Persuratan</a>
            </div>
          </nav>
          <div class="font-roboto relative text-gray-700 antialiased">
            @yield('content')
          </div>
          <footer class="text-yellow-900 body-font bg-yellow-200">
            <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
              <div class="w-64 flex-shrink-0 items-center text-center md:mx-0 mx-auto md:text-center">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                  <img class="w-2/6 text-yellow-900 p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" src="{{ asset('images/kaltara-footer.png') }}" alt="KALTARA">
                  <span class="ml-3 text-sm text-yellow-900">Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan</span>
                </a>
                <p class="mt-2 text-xs text-yellow-900 text-left">Jln. Iskandar Muda Kelurahan Nunukan Barat Kab. Nunukan</p>
                <p class="mt-2 text-xs text-yellow-900 text-left">Kode POS 77482</p>
              </div>
              <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
                  <nav class="list-none mb-10">
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                    </li>
                  </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
                  <nav class="list-none mb-10">
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                    </li>
                  </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
                  <nav class="list-none mb-10">
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                    </li>
                  </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
                  <nav class="list-none mb-10">
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                    </li>
                    <li>
                      <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                    </li>
                  </nav>
                </div>
              </div>
            </div>
            <div class="bg-yellow-900">
              <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                <p class="text-yellow-200 text-sm text-center sm:text-left">© 2021 —
                  <a rel="noopener noreferrer" class="text-yellow-200 ml-1">Cabdisdikbud Kaltara Wilayah Nunukan</a>
                </p>
              </div>
            </div>
          </footer>
        </section>
      </div>
    </body>
    </html>
