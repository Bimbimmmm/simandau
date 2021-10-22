@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h2 class="text-2xl text-center leading-tight">AKUN PENGGUNA</h2>
    </div>
    <div class="my-2 flex sm:flex-row flex-col">
      <div class="block relative">
        <a class="text-white" href="/administrator/users/create">
          <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-200 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div>
              <p class=" text-xs font-bold ml-2 ">
                TAMBAH OPERATOR
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
          <thead>
            <tr>
              <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
              Nama
            </th>
            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            NIK
          </th>
          <th
          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
          Email
        </th>
        <th
        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
        Status
      </th>
      <th
      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
      Aksi
    </th>
  </tr>
</thead>
<tbody>
  @foreach($datas as $data)
  <tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <div class="flex items-center">
        @if($data->avatar_file == null)
        <div class="flex-shrink-0 w-10 h-10">
          <img class="w-full h-full rounded-full"
          src="{{ asset('storage/avatar/default.png') }}"
          alt="" />
        </div>
        @else
        <div class="flex-shrink-0 w-10 h-10">
          <img class="w-full h-full rounded-full"
          src="{{ asset('storage/avatar/' . $data->avatar_file) }}"
          alt="" />
        </div>
        @endif
        <div class="ml-3">
          <p class="text-gray-900 whitespace-no-wrap">
            {{$data->first_name}} {{$data->last_name}}
          </p>
        </div>
      </div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <p class="text-gray-900 whitespace-no-wrap">{{$data->id_number}}</p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      <p class="text-gray-900 whitespace-no-wrap">
        {{$data->email}}
      </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
      @if($data->is_guest == TRUE)
        <span
        class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
        <span aria-hidden
        class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
        <span class="relative">User</span>
      </span>
      @elseif($data->is_operator == TRUE)
      <span
      class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
      <span aria-hidden
      class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
      <span class="relative">Operator</span>
    </span>
      @endif
    </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <a href="#" class="text-green-600 hover:text-green-400 mr-2">
      <i class="material-icons-outlined text-base">visibility</i>
    </a>
    <a href="#" class="text-yellow-600 hover:text-yellow-400  mx-2">
      <i class="material-icons-outlined text-base">edit</i>
    </a>
    <a href="#" class="text-red-600 hover:text-red-400    ml-2">
      <i class="material-icons-round text-base">delete_outline</i>
    </a>
  </td>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
