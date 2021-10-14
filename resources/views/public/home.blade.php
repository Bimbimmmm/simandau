@extends('layouts.guest')
<style>
header {
  background:url('https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');}
</style>
@section('content')
<!-- Welcome HERO -->
<header id="up" class="bg-center bg-fixed bg-no-repeat bg-center bg-cover h-screen relative">
  <div class="h-screen bg-opacity-50 bg-black flex items-center justify-center" style="background:rgba(0,0,0,0.5);">
    <div class="mx-2 text-center">
      <h1 class="text-gray-100 font-extrabold text-4xl xs:text-5xl md:text-6xl">
        Welcome
      </h1>
      <h2 class="text-gray-200 font-extrabold text-3xl xs:text-4xl md:text-5xl leading-tight">
        Sistem Monitoring Pendidikan dan Kebudayaan Kalimantan Utara
      </h2>
      <div class="inline-flex">
      </div>
    </div>
  </div>
</header>
<!-- Service Product HERO -->
<header>
  <div class="min-h-screen bg-black py-14">
    <h1 class="mb-12 text-center text-4xl text-white font-bold">Produk Layanan</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
      <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
          <img class="rounded-t-lg" src="{{ asset('images/simacan.jpg') }}" alt="SIMACAN">
        </a>
        <div class="p-5 text-center">
          <a>
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">SIMACAN</h5>
          </a>
          <p class="font-normal text-gray-700 mb-3 capitalize text-center">
            sistem informasi manajemen cabang dinas pendidikan adalah suatu layanan yang digunakan untuk memudahkan pelayanan administrasi maupun non-administrasi bagi ASN yang berada di bawah lingkup Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan
          </p>
          <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="https://app.simacankaltara.com/" target="_blank">
            Kunjungi
          </a>
        </div>
      </div>
      <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
        <a>
          <img class="rounded-t-lg" src="{{ asset('images/sielang.jpg') }}" alt="SIELANG">
        </a>
        <div class="p-5 text-center">
          <a>
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">SIELANG</h5>
          </a>
          <p class="font-normal text-gray-700 mb-3 capitalize text-center">
            sistem informasi e-learning adalah suatu layanan yang digunakan oleh tenaga pendidik dan peserta didik
            dalam menunjang proses belajar mengajar di sekolah. serta menjadi alat monitoring dan evaluasi terhadap
            peserta didik oleh orang tua dan performa tenaga pendidik oleh atasan
          </p>
          <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="#">
            Kunjungi
          </a>
        </div>
      </div>
      <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
        <a>
          <img class="rounded-t-lg" src="{{ asset('images/neojer.jpg') }}" alt="NEO-JER">
        </a>
        <div class="p-5 text-center">
          <a>
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">NEO-JER</h5>
          </a>
          <p class="font-normal text-gray-700 mb-3 capitalize text-center">
            north borneo journal of educational research adalah sebuah Jurnal Ilmiah yang telah
             memiliki p-ISSN: 2723-1577 dan e-ISSN: 2723-5874. Menerbitkan artikel terkhusus bidang
             Pendidikan secara online. jurnal ini terbuka bagi masyarakat umum/praktisi maupun ASN di seluruh indonesia
          </p>
          <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="http://cabdindikbudnunukan.id/journal/index.php/neo-jer" target="_blank">
            Kunjungi
          </a>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Recently News HERO -->
<header>
  <div class="min-h-screen bg-white py-14">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Berita Terbaru</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-white p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="https://kuyou.id/content/images/ctc_2020021605150668915.jpg" alt="Image Size 720x400">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
          <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
        </div>
      </div>
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-white p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="https://kuyou.id/content/images/ctc_2020021605150668915.jpg" alt="Image Size 720x400">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
          <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
        </div>
      </div>
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-white p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="https://kuyou.id/content/images/ctc_2020021605150668915.jpg" alt="Image Size 720x400">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
          <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
        </div>
      </div>
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-white p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="https://kuyou.id/content/images/ctc_2020021605150668915.jpg" alt="Image Size 720x400">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
          <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- OKELAH Product HERO -->
<header>
  <div class="min-h-screen bg-gray-100 py-14">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Produk OKELAH</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <div class="bg-white rounded-xl overflow-hidden shadow-xl hover:scale-105 hover:shadow-2xl transform duration-500 cursor-pointer p-8">
      <div class="p-4">
        <spna class="bg-red-500 py-2 px-4 text-sm font-semibold text-white rounded-full cursor-pointer">-30% Sale</spna>
        <h1 class="mt-4 text-3xl font-bold hover:underline cursor-pointer">Super Books</h1>
        <p class="mt-2 font-sans text-gray-700">by Diseño Constructivo</p>
      </div>
      <div class="relative">
        <img class="w-80" src="https://images.unsplash.com/photo-1571167530149-c1105da4c2c7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=376&q=80" />
        <p class="absolute text-lg transform translate-x-20 -translate-y-24 bg-blue-600 text-white py-3 px-6 rounded-full cursor-pointer hover:scale-105 duration-500">Comprar ahora</p>
      </div>
    </div>
    <div class="bg-white rounded-xl overflow-hidden shadow-xl hover:scale-105 hover:shadow-2xl transform duration-500 cursor-pointer p-8">
      <div class="p-4">
        <spna class="bg-red-500 py-2 px-4 text-sm font-semibold text-white rounded-full cursor-pointer">-30% Sale</spna>
        <h1 class="mt-4 text-3xl font-bold hover:underline cursor-pointer">Super Books</h1>
        <p class="mt-2 font-sans text-gray-700">by Diseño Constructivo</p>
      </div>
      <div class="relative">
        <img class="w-80" src="https://images.unsplash.com/photo-1571167530149-c1105da4c2c7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=376&q=80" />
        <p class="absolute text-lg transform translate-x-20 -translate-y-24 bg-blue-600 text-white py-3 px-6 rounded-full cursor-pointer hover:scale-105 duration-500">Comprar ahora</p>
      </div>
    </div>
    <div class="bg-white rounded-xl overflow-hidden shadow-xl hover:scale-105 hover:shadow-2xl transform duration-500 cursor-pointer p-8">
      <div class="p-4">
        <spna class="bg-red-500 py-2 px-4 text-sm font-semibold text-white rounded-full cursor-pointer">-30% Sale</spna>
        <h1 class="mt-4 text-3xl font-bold hover:underline cursor-pointer">Super Books</h1>
        <p class="mt-2 font-sans text-gray-700">by Diseño Constructivo</p>
      </div>
      <div class="relative">
        <img class="w-80" src="https://images.unsplash.com/photo-1571167530149-c1105da4c2c7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=376&q=80" />
        <p class="absolute text-lg transform translate-x-20 -translate-y-24 bg-blue-600 text-white py-3 px-6 rounded-full cursor-pointer hover:scale-105 duration-500">Comprar ahora</p>
      </div>
    </div>
  </div>
</div>
</header>
@endsection
