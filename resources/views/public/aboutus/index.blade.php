@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-yellow-900 py-14">
  <h1 class="mb-12 text-center text-4xl text-white font-bold">Kata Pengantar Kepala Cabang</h1>
  <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <div class="w-full md:w-1/4 ml-auto mr-auto px-4">
      <img alt="..." class="max-w-full rounded-lg shadow-lg" src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80">
    </div>
    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
      <div class="md:pr-12">
        <h3 class="text-3xl font-semibold text-white">A growing company</h3>
        <p class="mt-4 text-lg leading-relaxed text-white">
          The extension comes with three pre-built pages to help you get
          started faster. You can change the text and images and you're
          good to go.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="min-h-screen bg-white py-14">
  <h1 class="mb-12 text-center text-4xl text-black font-bold">Tupoksi Cabang Dinas</h1>
  <div class="md:flex md:justify-center md:space-x-8 md:px-14">
    <div class="mb-4">
      <div class="flex max-w-full w-full bg-white shadow-md rounded-lg overflow-hidden mx-auto">
        <div class="w-2 bg-red-600">
        </div>
        <div class="w-full flex justify-between items-start px-2 py-2">
          <div class="flex flex-col ml-2">
            <label class="text-gray-800">Your submission was rejected</label>
            <p class="text-gray-500 ">Lorem ipsum dolor sit amet consectetur sit amet
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="min-h-screen bg-blue-200 py-14">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Struktur Organisasi</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
      <div class=" px-10 py-6 mx-auto">
        <div class="max-w-6xl px-10 py-6 mx-auto bg-gray-50">
          <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
            <img class="object-cover w-full shadow-sm h-full" src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="min-h-screen bg-gray-100 py-14">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Profil Pegawai Cabang Dinas</h1>

    <div class="md:flex md:justify-center md:space-x-8 md:px-14 mb-10">
      <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80')"></div>
            </div>
            <div class="py-12 px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
                <h2 class="text-3xl text-gray-800 font-bold">Nama</h2>
                <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>
                <div class="mt-8">
                    <a href="#" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded">Start Now</a>
                </div>
            </div>
        </div>
    </div>

  </div>
  @endsection
