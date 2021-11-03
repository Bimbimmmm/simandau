@extends('layouts.guest')
@php
$i=0;
$x=-1;
@endphp
@section('content')
<div class="bg-gray-100" x-data="{ cartOpen: false , isOpen: false }">
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
    </div>
  </header>
  <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-20 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
    <div class="flex items-center justify-between">
      <h3 class="text-2xl font-medium text-gray-700">Keranjang Anda</h3>
      <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>
    <hr class="my-3">
    @if(Auth::check())
    @foreach($carts as $cart)
    @php
    $x=$x+1;
    $price = number_format($cart->product->price,2,',','.');
    @endphp
    <div class="flex justify-between mt-6">
      <div class="flex">
        <img class="h-20 w-20 object-cover rounded" src="{{ asset('storage/product/' . $cart_preview[$x]->file) }}" alt="">
        <div class="mx-3">
          <h3 class="text-sm text-gray-600">{{$cart->product->name}}</h3>
          <div class="flex items-center mt-2">
            <span class="text-gray-700 mx-2">{{$cart->qty}} pcs x</span>
            <span class="text-gray-600">Rp.{{$price}}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
      <button type="button" name="button" onclick="checkoutConfirmation()">
        <span>Checkout</span>
      </button>
    </a>
    <h3 class="text-sm text-gray-400">dengan mengklik tombol checkout pesanan akan dilanjutkan ke pembayaran</h3>
    @else
    <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500" href="/login">

      <span>Login</span>
      <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>

    </a>
    @endif
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
            @php
            $a=6;
            @endphp
            <button onclick="window.location='{{ url ('/public/okelah/category', array( $a )) }}'" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
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
              @php
              $b=4;
              @endphp
              <button onclick="window.location='{{ url ('/public/okelah/category', array( $b )) }}'" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                <span>Lihat Sekarang</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </button>
            </div>
          </div>
        </div>
        <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
          <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
              <h2 class="text-2xl text-white font-semibold">Produk Kerajinan Sekolah Menengah Kejuruan</h2>
              <p class="mt-2 text-gray-400 capitalize">
                bagian ini berisi produk-produk kreatif hasil program kewirausahaan siswa-siswi di sekolah menengah kejuruan
              </p>
              @php
              $c=5;
              @endphp
              <button onclick="window.location='{{ url ('/public/okelah/category', array( $c )) }}'" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                <span>Lihat Sekarang</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16">
        <h3 class="text-gray-600 text-2xl font-medium text-center">All Product</h3>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
          @foreach($datas as $data)
          @php
          $idEnOkelah=Crypt::encrypt($data->id);
          $price = number_format($data->price,2,',','.');
          @endphp
          <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ asset('storage/product/' . $product_preview[$i]->file) }}')">
              <button onclick="window.location='{{ url ('/public/okelah/view', array( $idEnOkelah )) }}'" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
              </button>
            </div>
            <div class="px-5 py-3">
              <h3 class="text-blue-300">{{$data->schoolOperator->school->school_name}}</h3>
              <h3 class="text-gray-700 uppercase">{{$data->name}}</h3>
              <span class="text-gray-500 mt-2">Rp. {{$price}}</span>
            </div>
          </div>
          @php
          $i=$i+1;
          @endphp
          @endforeach
        </div>
      </div>
    </div>
  </main>
</div>
<script type="text/javascript">
function checkoutConfirmation() {
  swal({
    title: "Lanjutkan Pembayaran?",
    text: "Dengan Mengklik Tombol Lanjutkan, Anda Akan Diarahkan Ke Halaman Pembayaran",
    type: "question",
    showCancelButton: !0,
    confirmButtonText: "Lanjutkan",
    cancelButtonText: "Batalkan",
    reverseButtons: !0
  }).then(function (e) {

    if (e.value === true) {

      window.location = "/public/okelah/checkout";

    } else {
      e.dismiss;
    }

  }, function (dismiss) {
    return false;
  })
}
</script>
@endsection
