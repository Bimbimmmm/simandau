@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center mb-6 leading-tight">TRANSAKSI ID : {{$data->id}}</h2>
    </div>
    <div class="p-10 border-2 border-green-600 md:w-3/4 lg:w-1/2 mx-auto">
      <form action="{{ url('/administrator/transaction/accept', array($data->id))}}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alasan Penolakan Oleh Sekolah
            </label>
            <p class="block dark:text-white tracking-wide text-gray-700 text-xs font-bold mb-2"> {{$data->pending_reason}}</p>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alasan Penolakan Banding
            </label>
            <textarea name="status" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="shipping_carrier" type="text" required></textarea>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Bukti Pembayaran
            </label>
            <img class="w-1/3" src="{{ asset('storage/payment/' . $data->payment_proof) }}" alt="">
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
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto border-2 border-red-600 mt-12">
      <div>
        <h2 class="text-2xl text-center leading-tight mb-6">Form Penolakan Order</h2>
      </div>
      <form action="{{ url('/administrator/transaction/reject', array($data->id))}}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alasan Penolakan
            </label>
            <textarea name="reject_reason" class="appearance-none border border-red-600 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pending_reason" type="text" required></textarea>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3">
            <button class="shadow bg-red-600 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Reject
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
