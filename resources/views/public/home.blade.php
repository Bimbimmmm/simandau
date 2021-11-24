@extends('layouts.guest')
@php
$i=0;
@endphp
@section('content')
<!-- Welcome HERO -->

<div class="flex flex-wrap justify-center animate__animated animate__fadeInUp">
  <img src="{{asset('images/rev.jpg')}}" >
</div>
<!-- Service Product HERO -->
<header>
  <div class="min-h-screen bg-yellow-900 py-14">
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
          <a class="text-white bg-blue-700 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="https://app.simacankaltara.com/" target="_blank">
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
          <a class="text-white bg-blue-700 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="#">
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
          <a class="text-white bg-blue-700 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="http://cabdindikbudnunukan.id/journal/index.php/neo-jer" target="_blank">
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
      @foreach($newss as $news)
      @php
      $caption = substr($news->content, 0, 250);
      $idEnNews=Crypt::encrypt($news->id);
      @endphp
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="bg-white p-6 rounded-lg">
          <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="{{ asset('storage/news/' . $news->header_image) }}">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{$news->author}}</h3>
          <a href="{{ url ('/public/news/view', array("$idEnNews")) }}"><h2 class="text-lg text-gray-900 font-medium title-font mb-4 hover:underline">{{$news->title}}</h2></a>
          <p class="leading-relaxed text-base">{!! $caption !!}....</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</header>
<!-- OKELAH Product HERO -->
<header>
  <div class="min-h-screen bg-gray-100 py-14">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Produk OKELAH</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
      @foreach($products as $product)
      @php
      $idEnOkelah=Crypt::encrypt($product->id);
      $price = number_format($product->price,2,',','.');
      @endphp
      <a href="{{ url ('/public/okelah/view', array("$idEnOkelah")) }}">
        <div class="bg-white rounded-xl overflow-hidden shadow-xl hover:scale-105 hover:shadow-2xl transform duration-500 cursor-pointer p-8">
          <div class="p-4">
            <spna class="bg-red-500 py-2 px-4 text-sm font-semibold text-white rounded-full cursor-pointer">Rp. {{$price}}</spna>
            <h1 class="mt-4 text-3xl font-bold hover:underline cursor-pointer">{{$product->name}}</h1>
            <p class="mt-2 font-sans text-gray-700">by {{$product->schoolOperator->school->school_name}}</p>
          </div>
          <div class="relative">
            @if($product_image !=null)
            <img class="w-80" src="{{ asset('storage/product/' . $product_image[$i]->file) }}" />
            @endif
          </div>
        </a>
        @php
        $i=$i+1;
        @endphp
        @endforeach
      </div>
    </div>
  </header>
  @endsection
