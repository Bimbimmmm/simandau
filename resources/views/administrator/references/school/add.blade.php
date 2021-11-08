@extends('layouts.admin')
@section('content')
<div class="container px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">TAMBAH SEKOLAH</h2>
    </div>
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
      <form action="/administrator/reference/school/store" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Tipe Sekolah
            </label>
            <select name="reference_school_type_id" id="reference_school_type_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              <option value="">Pilih Tipe Sekolah</option>
              @foreach($types as $type)
              <option value="{{$type->id}}">{{$type->type}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white" for="grid-password">
              Nama Sekolah
            </label>
            <input id="school_name" name="school_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alamat
            </label>
            <input id="address" name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Provinsi
            </label>
            <select name="province" id="province" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              <option value="">Pilih Provinsi</option>
              @foreach($provinces as $province)
              <option value="{{$province->code}}">{{$province->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Kabupaten / Kota
            </label>
            <select name="city" id="city" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </select>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Kecamatan
            </label>
            <select name="district" id="district" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </select>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="dark:text-white block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Kelurahan / Desa
            </label>
            <select name="village" id="village" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </select>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3">
            <button class="shadow bg-green-600 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Submit
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>
    </div>
  </div>
</div>
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
@endsection
