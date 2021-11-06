@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-gray-100 py-14">
  <h1 class="mb-12 text-center text-4xl text-black font-bold">Layanan Pengaduan</h1>
  <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img class="rounded-t-lg" src="{{ asset('images/simacan.jpg') }}" alt="SIMACAN">
      </a>
      <div class="p-5 text-center">
        <a>
          <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">PS3 SIMACAN</h5>
        </a>
        <p class="font-normal text-gray-700 mb-3 capitalize text-center">
          pojok solusi 3 adalah salah satu fitur yang terdapat dalam aplikasi SIMACAN
          (sistem informasi cabang dinas pendidikan) sebagai layanan non-Administrasi bagi ASN dan masyarakat
          untuk mengatur jadwal pertemuan langsung dengan kepala cabang
        </p>
        <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="https://app.simacankaltara.com/PojokSolusi3" target="_blank">
          Kunjungi
        </a>
      </div>
    </div>
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
      <a>
        <img class="rounded-t-lg" src="{{ asset('images/simandau.jpg') }}" alt="SIMANDAU">
      </a>
      <div class="p-5 text-center">
        <a>
          <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">e-Ticketing SIMANDAU</h5>
        </a>
        <p class="font-normal text-gray-700 mb-3 capitalize text-center">
          e-Ticketing SIMANDAU adalah layanan yang terdapat pada aplikasi SIMANDAU terkait dengan pelayanan Cabang
          dinas pendidikan dan kebudayaan provinsi kalimantan utara wilayah nunukan yang diselesaikan secara online
          dalam bentuk live chat
        </p>
        <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="/public/complaint/ticketing">
          Kunjungi
        </a>
      </div>
    </div>
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 p-4">
      <a>
        <img class="rounded-t-lg" src="{{ asset('images/lapor.jpg') }}" alt="NEO-JER">
      </a>
      <div class="p-5 text-center">
        <a>
          <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 text-center">LAPOR!</h5>
        </a>
        <p class="font-normal text-gray-700 mb-3 capitalize text-center">
          LAPOR! (layanan aspirasi dan pengaduan online rakyat) adalah aplikasi yang dikelola
          secara langsung oleh KEMENPAN-RB, KEMENDAGRI, KOMINFO, Kantor staf presiden, dan OMBUDSMAN Republik Indonesia
          sebagai portal pengaduan dan penyampaian aspirasi
        </p>
        <a class="text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="https://www.lapor.go.id/" target="_blank">
          Kunjungi
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
