<div>
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 ">
            <div class="pl-4 flex items-center">
                <img src="{{ asset('frontend/onigiri.svg') }}" class="mr-2" alt="" width="40">
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                    href="{{ url('/') }}">
                    <!--Icon from: http://www.potlabicons.com/ -->
                    RiceBox
                </a>
            </div>
            <div>
                <div class="hidden md:block pl-10 items-center">
                    <a href="{{ route('/') }}" class="toggleColour inline-block py-1 md:py-4 mr-6 font-bold">Home</a>

                    <div class="group inline-block">
                        <button class="toggleColour outline-none focus:outline-none px-3 rounded-sm flex items-center">
                            <span class="py-1 mr-6 md:py-4 font-bold flex-1">Produk</span>
                            <span>
                                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                          transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </span>
                        </button>
                        <ul class="text-md text-gray-700 font-semibold bg-white rounded-md transform scale-0 group-hover:scale-100 absolute 
                    transition duration-150 ease-in-out origin-top min-w-32">

                            @foreach ($kategori as $ktg)
                            <li class="rounded-sm px-1 py-2 text-center template-hover ">
                                <a href="{{route('produkkategori', $ktg->id_produk)}}">
                                    {{$ktg->nama_produk}}
                                </a>
                            </li>
                            @endforeach


                            <li class="px-1 py-2 text-center font-bold border-t-2 border-gray-300 template-hover rounded-b-md">
                                <a href="{{ route('produk') }}">
                                    Semua Produk
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-gray-template p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                    <a class="inline-flex items-center toggleColour py-2 px-4 text-gray-100 font-bold no-underline" href="{{route('keranjang')}}">
                        <span>Keranjang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        @if($jumlah_pesanan !== 0)
                        (<span class="text-yellow-template">{{$jumlah_pesanan}}</span>)
                        @endif
                    </a>
                </li>
                </ul>
                @auth
                    <a href="{{ url('/dashboard') }}" id="navAction"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-2 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Dashboard
                    </a>
                @endauth
                @guest
                    <a href="{{ url('/register') }}" id="navAction"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-2 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Register
                    </a>
                    &nbsp;
                    <a href="{{ url('/login') }}" id="navAction"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-2 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Login
                    </a>
                @endguest
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
</div>
