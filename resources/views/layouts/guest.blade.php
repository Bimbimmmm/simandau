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
  <script src="{{ asset('js/alpine.min.js') }}" defer></script>
</head>
<body class="font-roboto">
  <div class="flex flex-wrap h-screen" x-data="{open: false , isOpen: false }">
    <section class="relative mx-auto">
      <!-- navbar -->
      <nav class="flex sticky top-0 z-50 justify-between bg-white text-yellow-900 w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a class="text-3xl font-bold font-heading" href="#">
            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
            SIMANDAU
          </a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li><a class="hover:text-yellow-600" href="/">Home</a></li>
            <li><a class="hover:text-yellow-600" href="/public/news">Berita</a></li>
            <li><a class="hover:text-yellow-600" href="/public/okelah">OKELAH</a></li>
            <li><a class="hover:text-yellow-600" href="/public/statistic">Statistik</a></li>
            <li><a class="hover:text-yellow-600" href="/public/aboutus">Tentang Kami</a></li>
            <li><a class="hover:text-yellow-600" href="/public/complaint">Layanan Pengaduan</a></li>
          </ul>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5 items-center">
            <!-- Sign In / Register      -->
            <button @click="open = !open" class="flex items-center hover:text-yellow-600" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </button>
          </div>
        </div>
        <div x-show="open" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 mt-20 mr-8" style="width:20rem;">
            <div class="py-2">
                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" href="#">Nama
                    </p>
                </a>
                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" href="#">Payment History
                    </p>
                </a>
              </div>
            <a href="/login" class="block bg-gray-800 text-white text-center font-bold py-2">Log In</a>
            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">Log Out</a>
        </div>
        <!-- Responsive navbar -->
        <div class="navbar-burger self-center mr-6 xl:hidden">
          <button @click="isOpen = !isOpen" type="button" class="text-yellow-900 hover:text-yellow-600 focus:outline-none focus:text-yellow-900" aria-label="toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-yellow-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </nav>
      <nav :class="isOpen ? '' : 'hidden'" class="xl:hidden sm:flex sm:justify-center sm:items-center mb-4 ml-4">
        <div class="flex flex-col sm:flex-row">
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Home</a>
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Berita</a>
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">OKELAH</a>
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Statistik</a>
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Tentang Kami</a>
          <a class="mt-3 text-yellow-900 hover:text-yellow-600 sm:mx-3 sm:mt-0" href="#">Layanan Pengaduan</a>
        </div>
      </nav>
      <div class="font-roboto relative text-gray-700 antialiased">
        @yield('content')
        <div class="fixed bottom-0 right-0 flex flex-col items-end ml-6 w-full">
          <!-- Chat -->
          <div class="chat-modal hidden mr-5 flex flex-col mb-5 shadow-lg sm:w-1/2 md:w-1/3 lg:w-1/4">
            <!-- close button -->
            <div class="close-chat bg-red-500 hover:bg-red-600 text-white mb-1 w-10 flex justify-center items-center px-2 py-1 rounded self-end cursor-pointer">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
              </svg>
            </div>
            <!-- admin profile -->
            <div class="flex justify-between items-center text-white p-2 bg-blue-500 border shadow-lg mr-5 w-full">
              <div class="flex items-center">
                <img src="https://f0.pngfuel.com/png/136/22/profile-icon-illustration-user-profile-computer-icons-girl-customer-avatar-png-clip-art-thumbnail.png" alt="picture" class="rounded-full w-8 h-8 mr-1">
                <h2 class="font-semibold tracking-wider">HartDev</h2>
              </div>
              <div class="flex items-center justify-center">
                <small class="mr-1">online</small>
                <div class="rounded-full w-2 h-2 bg-white"></div>
              </div>
            </div>
            <!-- chats -->
            <div class="flex flex-col bg-gray-200 px-2 chat-services expand overflow-auto">
              <div class="chat bg-white text-gray-700 p-2 self-start my-2 rounded-md shadow mr-3">
                apa ada yang bisa saya bantu ?
              </div>
              <div class="message bg-blue-500 text-white p-2 self-end my-2 rounded-md shadow ml-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, ratione!
              </div>
              <div class="message bg-blue-500 text-white p-2 self-end my-2 rounded-md shadow ml-3">
                Lorem, ipsum.
              </div>
              <div class="message bg-white text-gray-700 p-2 self-start my-2 rounded-md shadow mr-3">
                Lorem ipsum dolor sit amet.
              </div>
              <div class="message bg-blue-500 text-white p-2 self-end my-2 rounded-md shadow ml-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, quod.
              </div>
              <div class="message bg-white text-gray-700 p-2 self-start my-2 rounded-md shadow mr-3">
                Lorem, ipsum dolor.
              </div>

            </div>
            <!-- send message -->
            <div class="relative bg-white">
              <input type="text" name="message" placeholder="ketik pesan anda"
              class="pl-4 pr-16 py-2 border border-blue-500 focus:outline-none w-full">
              <button class="absolute right-0 bottom-0 text-blue-600 bg-white  hover:text-blue-500 m-1 px-3 py-1 w-auto transistion-color duration-100 focus:outline-none">Send</button>
            </div>
          </div>
          <div class="show-chat show mx-10 mb-6 mt-4 text-blue-500 hover:text-blue-600 flex justify-center items-center cursor-pointer ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
          </div>
          <!-- endchat -->
        </div>
      </div>
      <footer class="text-yellow-900 body-font bg-yellow-200">
        <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
          <div class="w-64 flex-shrink-0 items-center text-center md:mx-0 mx-auto md:text-center">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <img class="w-2/6 text-yellow-900 p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" src="{{ asset('images/kaltara-footer.png') }}" alt="KALTARA">
              <span class="ml-3 text-sm text-yellow-900">Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan</span>
            </a>
            <p class="mt-2 text-xs text-yellow-900 text-left">Jln. Iskandar Muda Kelurahan Nunukan Barat Kab. Nunukan</p>
            <p class="mt-2 text-xs text-yellow-900 text-left">Kode POS 77482</p>
          </div>
          <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-bold text-yellow-900 tracking-widest text-md mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">First Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Second Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Third Link</a>
                </li>
                <li>
                  <a class="text-yellow-900 hover:text-red-300" href="#">Fourth Link</a>
                </li>
              </nav>
            </div>
          </div>
        </div>
        <div class="bg-yellow-900">
          <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-yellow-200 text-sm text-center sm:text-left">© 2021 —
              <a rel="noopener noreferrer" class="text-yellow-200 ml-1">Cabdisdikbud Kaltara Wilayah Nunukan</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
              <a class="text-yellow-200">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-yellow-200">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-yellow-200">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-yellow-200">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </footer>
    </section>
  </div>
</body>
<script>
const chatModal = document.querySelector('.chat-modal');
const chatServices = document.querySelector('.chat-services');

const showChat = document.querySelector('.show-chat');
const closeChat = document.querySelector('.close-chat');

showChat.addEventListener('click', function (){
  chatModal.classList.remove('hidden')
  chatModal.classList.add('show')
  showChat.classList.add('hidden')
  setTimeout(() => {
    chatServices.classList.add('expand')
  }, 500);
});
closeChat.addEventListener('click',function () {
  setTimeout(() => {
    showChat.classList.remove('hidden')
  }, 820);
  chatServices.classList.remove('expand')
  setTimeout(() => {
    chatModal.classList.remove('show')
  }, 500);
});
</script>
</html>
