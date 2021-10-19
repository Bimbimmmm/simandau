@extends('layouts.guest')
@section('content')
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="hidden w-full text-gray-600 md:flex md:items-center">
            <a href="/public/okelah">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
            </a>
          </div>
          <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
            Payment Details
          </div>
          <div class="flex items-center justify-end w-full">
          </div>
        </div>
      </div>
    </header>
    <div class="flex-1">
      <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Bank</th>
            <th class="hidden text-right md:table-cell">Account Number</th>
            <th class="hidden text-right md:table-cell">Account Name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img src="{{ asset('images/bri.png') }}" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">Bank Rakyat Indonesia (BRI)</p>
              </a>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                501801024604531
              </span>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                Indah Nurul Aprilia
              </span>
            </td>
          </tr>
          <tr>
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img src="{{ asset('images/bca.png') }}" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">Bank Central Asia (BCA)</p>
              </a>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                8735427152
              </span>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                Indah Nurul Aprilia
              </span>
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="pb-6 mt-6">
      <div class="my-4 mt-6 -mx-2 lg:flex">
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p>
            <div class="flex justify-between border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Product
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                aaa
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Subtotal
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                rp
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Shipping Cost
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                ongkir
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Total
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                rp
              </div>
            </div>
            <div class="flex justify-between pt-4 border-b">
              <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                Status
              </div>
              <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                status
              </div>
            </div>
          </div>
        </div>
        <div class="lg:px-2 lg:w-1/2">


          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Payment Details</h1>
          </div>
          <p class="mb-6 italic">Payment is successful, waiting for seller verification and order delivery</p>
          <div class="flex justify-between border-b">
            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
              Date Payed
            </div>
            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
              dd/mm/yyyy
            </div>
          </div>
          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Payment Proof</h1>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
          <div class="flex w-full h-48 items-center justify-center bg-grey-lighter">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input name="paymentproof" type='file' class="hidden" />
            </label>
          </div>
            <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
              </svg>
              <span class="ml-2 mt-5px">Upload Payment Proof</span>
            </button>
        </div>
      </form>
      <div class="flex justify-between border-b">
        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
          Date Shipped
        </div>
        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
          dd/mm/yyyy
        </div>
      </div>
      <div class="flex justify-between border-b">
        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
          Airwaybill
        </div>
        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
           by JNE
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
