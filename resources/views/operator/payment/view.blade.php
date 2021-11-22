@extends('layouts.operator')
@section('content')
<div class="container px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl mb-6 text-center leading-tight">PROSES TRANSAKSI ID : {{$data->id}}</h2>
    </div>
    @if($data->is_finished == FALSE && $data->is_pending == FALSE)
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
      @if(session('errors'))
      @foreach ($errors->all() as $error)
      <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center">
        <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
          <path fill="currentColor"  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path>
        </svg>
        <span class="text-red-800">{{ $error }}</span>
      </div>
      @endforeach
      @endif
      <form action="{{ url('/operator/payment/accept', array($data->id))}}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Nama Ekspedisi
            </label>
            <input name="shipping_carrier" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="shipping_carrier" type="text" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Nomor Resi
            </label>
            <input name="shipping_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="shipping_number" type="text" required>
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
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto border-2 border-red-600">
      <div>
        <h2 class="text-2xl text-center leading-tight mb-6">Form Penolakan Order</h2>
      </div>
      <form action="{{ url('/operator/payment/reject', array($data->id))}}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alasan Penolakan
            </label>
            <textarea name="pending_reason" class="appearance-none border border-red-600 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pending_reason" type="text" required></textarea>
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
    @elseif($data->is_finished == TRUE)
    <div class="bg-indigo-700 px-4 py-5 border-b rounded-t sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-white">
        Transaksi Oleh {{$data->user->first_name}} {{$data->user->last_name}}
      </h3>
    </div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
      <ul class="divide-y divide-gray-200">
        <li>
          <a class="block hover:bg-gray-50">
            <div class="px-4 py-4 sm:px-6">
              <div class="flex items-center justify-between">
                <p class="text-sm text-gray-700 truncate">
                  {{$data->status}} Menggunakan {{$data->shipping_carrier}} Dengan Resi {{$data->shipping_number}}
                </p>
                <div class="ml-2 flex-shrink-0 flex">
                  <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Delivered
                  </p>
                </div>
              </div>
              <div class="mt-2 sm:flex sm:justify-between">
                <div class="sm:flex">
                  <p class="flex items-center text-sm text-gray-500">
                    <time>{{$data->updated_at}}</time>
                  </p>
                </div>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
    @elseif($data->is_pending == TRUE)
    <div class="bg-red-700 px-4 py-5 border-b rounded-t sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-white">
        Transaksi Oleh {{$data->user->first_name}} {{$data->user->last_name}}
      </h3>
    </div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
      <ul class="divide-y divide-gray-200">
        <li>
          <a class="block hover:bg-gray-50">
            <div class="px-4 py-4 sm:px-6">
              <div class="flex items-center justify-between">
                <p class="text-sm text-gray-700 truncate">
                  {{$data->status}} dengan alasan {{$data->pending_reason}}
                </p>
                <div class="ml-2 flex-shrink-0 flex">
                  <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Pending
                  </p>
                </div>
              </div>
              <div class="mt-2 sm:flex sm:justify-between">
                <div class="sm:flex">
                  <p class="flex items-center text-sm text-gray-500">
                    <time>{{$data->updated_at}}</time>
                  </p>
                </div>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
    @endif
  </div>
</div>
@endsection
