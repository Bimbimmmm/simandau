@extends('layouts.guest')
@section('content')
<div x-data="{ cartOpen: false , isOpen: false }">
<header>
  <div class="container mx-auto px-6 py-3">
    <div class="flex items-center justify-between">
      <div class="hidden w-full text-gray-600 md:flex md:items-center">
        <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        </a>
      </div>
      <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
        OKELAH
      </div>
      <div class="flex items-center justify-end w-full">
        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
          <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </button>
      </div>
    </div>
    <h3 class="text-gray-600 text-sm font-medium md:text-center capitalize">
      pojok kerajinan sekolah adalah layanan yang digunakan oleh sekolah untuk menjual
      produk-produk kreatif buatan siswa-siswi di sekolah
    </h3>
    <div class="relative mt-6 max-w-lg mx-auto">
      <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
          <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>

      <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Search">
    </div>
  </div>
</header>
<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
  <div class="flex items-center justify-between">
    <h3 class="text-2xl font-medium text-gray-700">Keranjang Anda</h3>
    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
      <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
  </div>
  <hr class="my-3">
  <!-- foreach -->
  <div class="flex justify-between mt-6">
    <div class="flex">
      <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
      <div class="mx-3">
        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
        <div class="flex items-center mt-2">
          <button class="text-gray-500 focus:outline-none focus:text-gray-600">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </button>
          <span class="text-gray-700 mx-2">2</span>
          <button class="text-gray-500 focus:outline-none focus:text-gray-600">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </button>
        </div>
      </div>
    </div>
    <span class="text-gray-600">20$</span>
  </div>
  <!-- endforeach -->
  <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
    <span>Chechout</span>
    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
  </a>
</div>
<main class="my-8">
  <div class="container mx-auto px-6">
    <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
      <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
        <div class="px-10 max-w-xl">
          <h2 class="text-2xl text-white font-semibold">Produk Kerajinan Sekolah Luar Biasa</h2>
          <p class="mt-2 text-gray-400 capitalize">
            bagian ini berisi produk-produk kreatif buatan siswa-siswi berkebutuhan khusus di sekolah luar biasa
          </p>
          <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
            <span>Lihat Sekarang</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
          </button>
        </div>
      </div>
    </div>
    <div class="md:flex mt-8 md:-mx-4">
      <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
          <div class="px-10 max-w-xl">
            <h2 class="text-2xl text-white font-semibold">Produk Kerajinan Sekolah Menengah Atas</h2>
            <p class="mt-2 text-gray-400 capitalize">
              bagian ini berisi produk-produk kreatif hasil program kewirausahaan siswa-siswi di sekolah menengah atas
            </p>
            <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
              <span>Lihat Sekarang</span>
              <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </button>
          </div>
        </div>
      </div>
      <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
          <div class="px-10 max-w-xl">
            <h2 class="text-2xl text-white font-semibold">Produk Kerajinan Sekolah Menengah Atas</h2>
            <p class="mt-2 text-gray-400 capitalize">
              bagian ini berisi produk-produk kreatif hasil program kewirausahaan siswa-siswi di sekolah menengah kejuruan
            </p>
            <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
              <span>Lihat Sekarang</span>
              <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-16">
      <h3 class="text-gray-600 text-2xl font-medium text-center">All Product</h3>
      <!-- foreach -->
      <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
          <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
              <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </button>
          </div>
          <div class="px-5 py-3">
            <h3 class="text-blue-300">Seller</h3>
            <h3 class="text-gray-700 uppercase">Judul</h3>
            <h3 class="text-gray-700">Deskripsi</h3>
            <span class="text-gray-500 mt-2">Rp. Harga</span>
          </div>
        </div>
      </div>
      <!-- endforeach -->
    </div>
  </div>
</main>
</div>
@endsection
