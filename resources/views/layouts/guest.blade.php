<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SIMANDAU</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  <div class="flex flex-wrap h-screen">
  <section class="relative mx-auto">
      <!-- navbar -->
    <nav class="flex justify-between bg-gray-900 text-white w-screen">
      <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        <a class="text-3xl font-bold font-heading" href="#">
          <!-- <img class="h-9" src="logo.png" alt="logo"> -->
          SIMANDAU
        </a>
        <!-- Nav Links -->
        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
          <li><a class="hover:text-gray-200" href="/">Home</a></li>
          <li><a class="hover:text-gray-200" href="/public/news">Berita</a></li>
          <li><a class="hover:text-gray-200" href="#">OKELAH</a></li>
          <li><a class="hover:text-gray-200" href="#">Tentang Kami</a></li>
          <li><a class="hover:text-gray-200" href="#">Layanan Pengaduan</a></li>
        </ul>
        <!-- Header Icons -->
        <div class="hidden xl:flex items-center space-x-5 items-center">
          <a class="flex items-center hover:text-gray-200" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            <span class="flex absolute -mt-5 ml-4">
              <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                </span>
              </span>
          </a>
          <!-- Sign In / Register      -->
          <a class="flex items-center hover:text-gray-200" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
          </a>

        </div>
      </div>
      <!-- Responsive navbar -->
      <a class="xl:hidden flex mr-6 items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="flex absolute -mt-5 ml-4">
          <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
          </span>
        </span>
      </a>
      <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </a>
    </nav>
    <div class="font-sans text-gray-700 antialiased">
      @yield('content')
    </div>
    <footer class="text-gray-600 body-font bg-gray-700">
      <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
        <div class="w-64 flex-shrink-0 items-center text-center md:mx-0 mx-auto md:text-center">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <img class="w-2/6 text-white p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" src="{{ asset('images/kaltara-footer.png') }}" alt="KALTARA">
            <span class="ml-3 text-sm text-white">Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan</span>
          </a>
          <p class="mt-2 text-xs text-white text-left">Jln. Iskandar Muda Kelurahan Nunukan Barat Kab. Nunukan</p>
          <p class="mt-2 text-xs text-white text-left">Kode POS 77482</p>
        </div>
        <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="#">First Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Second Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Third Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="#">First Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Second Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Third Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="#">First Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Second Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Third Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="#">First Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Second Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Third Link</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="#">Fourth Link</a>
              </li>
            </nav>
          </div>
        </div>
      </div>
      <div class="bg-gray-900">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
          <p class="text-white text-sm text-center sm:text-left">© 2021 —
            <a rel="noopener noreferrer" class="text-gray-400 ml-1">Cabdisdikbud Kaltara Wilayah Nunukan</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
            <a class="text-gray-200">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-200">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-200">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-200">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </div>
    </footer>
</section>
</div>
</body>
</html>
