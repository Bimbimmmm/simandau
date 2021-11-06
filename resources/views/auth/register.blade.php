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

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/alpine.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/axios.min.js') }}"></script>
</head>
<body class="font-roboto">
  <section class="min-h-screen flex items-stretch text-white ">
    <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url('{{asset('images/login-bg.jpg')}}');">
      <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
      <div class="w-full px-24 z-10">
        <h1 class="text-5xl font-bold text-left tracking-wide">SIMANDAU</h1>
        <p class="text-3xl my-4">Sistem Informasi Monitoring Pendidikan dan Kebudayaan Kalimantan Utara</p>
      </div>
      <div class="bottom-0 absolute p-4 text-center right-0 left-0 flex justify-center space-x-4">
        <span>
          <svg class="text-white"  width="24" height="24" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />  <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" /></svg>
        </span>
        <span>
          <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
        </span>
        <span>
          <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </span>
      </div>
    </div>
    <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #161616;">
      <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url('{{asset('images/login-bg.jpg')}}');">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
      </div>
      <div class="w-full py-6 z-20">
        <h1 class="text-center text-3xl">
          REGISTER
        </h1>
        <p class="text-gray-100">
          Silahkan Mengisi Data Berikut Untuk Melanjutkan Pedaftaran
        </p>
        <form class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="pb-2 pt-4">
            <input type="text" name="first_name" id="first_name" placeholder="Nama Depan" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="pb-2 pt-4">
            <input type="text" name="last_name" id="last_name" placeholder="Nama Belakang" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="pb-2 pt-4">
            <input type="text" name="id_number" id="id_number" placeholder="Nomor Induk Kependudukan" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="pb-2 pt-4">
            <input type="email" name="email" id="email" placeholder="Email" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="pb-2 pt-4">
            <input class="block w-full p-4 text-lg rounded-sm bg-black" type="password" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="pb-2 pt-4">
            <input class="block w-full p-4 text-lg rounded-sm bg-black" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password" required>
          </div>
          <div class="pb-2 pt-4">
            <input type="address" name="address" id="address" placeholder="Alamat Lengkap" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="pb-2 pt-4">
            <select name="province" id="province" class="block w-full p-4 text-lg rounded-sm bg-black">
              <option value="">==Pilih Provinsi==</option>
              @foreach($provinces as $province)
              <option value="{{$province->code}}">{{$province->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="pb-2 pt-4">
            <select name="city" id="city" class="block w-full p-4 text-lg rounded-sm bg-black">
            </select>
          </div>
          <div class="pb-2 pt-4">
            <select name="district" id="district" class="block w-full p-4 text-lg rounded-sm bg-black">
            </select>
          </div>
          <div class="pb-2 pt-4">
            <select name="village" id="village" class="block w-full p-4 text-lg rounded-sm bg-black">
            </select>
          </div>
          <div class="pb-2 pt-4">
            <input type="number" name="zip_code" id="zip_code" placeholder="Kode POS" class="block w-full p-4 text-lg rounded-sm bg-black" required>
          </div>
          <div class="px-4 pb-2 pt-4">
            <button class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none">{{ __('Register') }}</button>
          </div>
          <div class="p-4 text-center right-0 left-0 flex justify-center space-x-4 mt-16 lg:hidden ">
            <a href="#">
              <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
            </a>
            <a href="#">
              <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
            </a>
            <a href="#">
              <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
          </div>
        </form>
        <div class="text-center text-gray-400 hover:underline hover:text-gray-100">
          <a href="/login">Already Have An Account?</a>
        </div>
      </div>
    </div>
  </section>
</body>
<script>
$(document).ready(function() {
  $('#province').on('change', function() {
    var province_id = $(this).val();
    if(province_id) {
      $.ajax({
        url: '/getCity/'+province_id,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data){
            $('#city').empty();
            $('#city').append('<option hidden>Pilih Kota</option>');
            $.each(data, function(key, city){
              $('select[name="city"]').append('<option value="'+ city.code +'">' + city.name+ '</option>');
            });
          }else{
            $('#city').empty();
          }
        }
      });
    }else{
      $('#city').empty();
    }
  });
});
</script>
<script>
$(document).ready(function() {
  $('#city').on('change', function() {
    var city_id = $(this).val();
    if(city_id) {
      $.ajax({
        url: '/getDistrict/'+city_id,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data){
            $('#district').empty();
            $('#district').append('<option hidden>Pilih Kecamatan</option>');
            $.each(data, function(key, district){
              $('select[name="district"]').append('<option value="'+ district.code +'">' + district.name+ '</option>');
            });
          }else{
            $('#district').empty();
          }
        }
      });
    }else{
      $('#district').empty();
    }
  });
});
</script>
<script>
$(document).ready(function() {
  $('#district').on('change', function() {
    var district_id = $(this).val();
    if(district_id) {
      $.ajax({
        url: '/getVillage/'+district_id,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data){
            $('#village').empty();
            $('#village').append('<option hidden>Pilih Kelurahan / Desa</option>');
            $.each(data, function(key, village){
              $('select[name="village"]').append('<option value="'+ village.code +'">' + village.name+ '</option>');
            });
          }else{
            $('#village').empty();
          }
        }
      });
    }else{
      $('#village').empty();
    }
  });
});
</script>
</html>
