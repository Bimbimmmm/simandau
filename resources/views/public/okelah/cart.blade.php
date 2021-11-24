@extends('layouts.guest')
@php
$i=0;
$x=-1;
@endphp
@section('content')
<div class="min-h-screen w-full bg-white container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div>
      <h1 class="mb-12 text-center text-2xl text-gray-700 font-bold">Keranjang Belanja</h1>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="my-2 flex sm:flex-row flex-col w-32">
        <div class="block relative">
          <button onclick="checkoutConfirmation()" class="text-white" href="/public/mail/add">
            <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs cursor-pointer hover:bg-green-400 hover:text-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <div>
                <p class=" text-xs font-bold ml-2 ">
                  CHECKOUT
                </p>
              </div>
            </div>
          </button>
        </div>
      </div>
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md text-center font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Foto Produk</th>
              <th class="px-4 py-3">Nama Produk</th>
              <th class="px-4 py-3">Jumlah Produk</th>
              <th class="px-4 py-3">Harga Satuan Produk</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach($carts as $cart)
            @php
            $x=$x+1;
            $price = number_format($cart->product->price,0,',','.');
            @endphp
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">{{$loop->iteration}}</td>
              <td class="px-4 py-3 text-ms border">
                <img class="h-20 w-20 object-cover rounded" src="{{ asset('storage/product/' . $cart_preview[$x]->file) }}" alt="">
              </td>
              <td class="px-4 py-3 text-ms border">{{$cart->product->name}}</td>
              <td class="px-4 py-3 text-sm border">{{$cart->qty}} pcs</td>
              <td class="px-4 py-3 text-ms border">Rp.{{$price}}</td>
              <td class="px-4 py-3 text-ms border">
                <form method="POST" action="{{ route('userokelah.destroy', $cart->id) }}">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="text-red-700" onclick="deleteItem(this)" data-id="{{ $cart->id }}"><i class="material-icons-round text-xl">delete_outline</i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
function checkoutConfirmation() {
  swal({
    title: "Lanjutkan Pembayaran?",
    text: "Dengan Mengklik Tombol Lanjutkan, Anda Akan Diarahkan Ke Halaman Pembayaran",
    type: "question",
    showCancelButton: !0,
    confirmButtonText: "Lanjutkan",
    cancelButtonText: "Batalkan",
    reverseButtons: !0
  }).then(function (e) {

    if (e.value === true) {

      window.location = "/public/okelah/checkout";

    } else {
      e.dismiss;
    }

  }, function (dismiss) {
    return false;
  })
}
</script>

<script type="text/javascript">
$('.show_confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
    title: `Are you sure you want to delete this record?`,
    text: "If you delete this, it will be gone forever.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })

  .then((willDelete) => {
    if (willDelete) {
      form.submit();
    }
  });
});
</script>
@endsection
