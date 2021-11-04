@extends('layouts.guest')
@section('content')
<div class="container mx-auto bg-gray-50 min-h-screen p-8 antialiased">
  <div>
    @foreach($datas as $data)
    <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5 h-30">
      <div class="flex p-3 border-l-8 border-yellow-600">
        <div class="space-y-1 border-r-2 pr-3">
          @if($data->shipping_number != null)
          <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> Receipt #</span> {{$data->shipping_number}}</div>
          @else
          <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> Receipt #</span> Resi Belum Diinput</div>
          @endif
          <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> Payment Date</div>
            <div class="text-sm leading-5 font-semibold">{{$data->created_at}}</div>
          </div>
          <div class="flex-1">
            <div class="ml-3 space-y-1 border-r-2 pr-3">
              <div class="text-base leading-6 font-normal">Pesanan Pojok Kerajinan Sekolah</div>
              @if($data->shipping_carrier != null)
              <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Carrier</span> {{$data->shipping_carrier}}</div>
              @else
              <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Carrier</span> Pesanan Belum Dikirim</div>
              @endif
              <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Destination</span> {{$data->address}}</div>
            </div>
          </div>
          <div class="border-r-2 pr-3">
            <div >
              <div class="ml-3 my-3 border-gray-200 border-2 bg-gray-300 p-1">
                <div class="uppercase text-xs leading-4 font-medium">Payment ID</div>
                <div class="text-center text-sm leading-4 font-semibold text-gray-800">{{$data->id}}</div>
              </div>
            </div>
          </div>
          <div>
            @if($data->is_payed == FALSE)
            <div class="ml-3 my-5 bg-red-600 p-1 w-20">
              <div class="uppercase text-xs leading-4 font-semibold text-center text-red-100">Unpaid</div>
            </div>
            @elseif($data->is_payed == TRUE && $data->is_finished == FALSE && $data->is_pending == FALSE && $data->is_rejected == FALSE)
            <div class="ml-3 my-5 bg-green-600 p-1 w-20">
              <div class="uppercase text-xs leading-4 font-semibold text-center text-green-100">Payed</div>
            </div>
            @elseif($data->is_pending == TRUE)
            <div class="ml-3 my-5 bg-red-600 p-1 w-20">
              <div class="uppercase text-xs leading-4 font-semibold text-center text-red-100">Pending</div>
            </div>
            @elseif($data->is_rejected == TRUE)
            <div class="ml-3 my-5 bg-black p-1 w-20">
              <div class="uppercase text-xs leading-4 font-semibold text-center text-white">Rejected</div>
            </div>
            @elseif($data->is_finished == TRUE)
            <div class="ml-3 my-5 bg-green-800 p-1 w-20">
              <div class="uppercase text-xs leading-4 font-semibold text-center text-green-100">Finished</div>
            </div>
            @endif
          </div>
          @php
          $idEn=Crypt::encrypt($data->id);
          @endphp
          <div>
            <button onclick="window.location='{{ url ('/public/okelah/payment', array( $idEn )) }}'" class="text-gray-100 rounded-sm my-5 ml-2 focus:outline-none bg-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection
