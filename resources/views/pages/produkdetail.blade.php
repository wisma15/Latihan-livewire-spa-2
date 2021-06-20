<div>
    <div class="row">
        <div class="col md-12">
            @if (session()->has('message'))
                {{ session('message') }}
            @endif
        </div>
    </div>

    <div class="container mx-auto flex flex-wrap pt-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
            Detail Produk
        </h1>
        <div class="w-full">
            <div class="h-1 mx-auto bg-yellow-template w-64 opacity-90 my-0 py-0 rounded-t"></div>
        </div>
    </div>

    <form wire:submit.prevent="masukanKeranjang" action="">
        <div class="container mx-auto px-6 mb-24 pb-36">
            <div class="md:flex md:items-center">
                <div class="w-full h-64 pt-7 md:w-1/2 lg:h-96 ">
                    <img class="rounded-md shadow-2xl object-cover max-w-lg mx-auto" width="400"
                        src="{{ asset('storage/' . $post->file_name) }}" alt="">
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="font-bold text-xl">{{ $post->nama }}</h3>
                    <span class="text-yellow-template font-semibold mt-3">Rp. {{ number_format($post->harga) }}</span>
                    <hr class="my-3">
                    <div class="mt-2">
                        <label class="text-gray-200 text-sm font-bold" for="jumlah_pesanan">Jumlah</label>

                        <div class="flex items-center mt-1">
                            <button class="text-white focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 text-lg mx-2">
                                <input required type="number"
                                    class="w-12 shadow border rounded text-center bg-gray-100 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="jumlah_pesanan" wire:model="jumlah_pesanan">
                                @error('jumlah_pesanan') <span class="text-red-500">{{ $message }}</span>@enderror
                            </span>
                            <button class="text-white focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3 mb-5">
                        <label class="text-gray-200 text-sm font-bold" for="count">Deskripsi:</label>
                        <div class="flex items-center mt-1 font-md text-gray-300">
                            {{ $post->deskripsi }}
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="flex items-center mt-6">
                        <button class="inline-flex items-center px-6 py-2 bg-yellow-template text-gray-700 text-sm font-medium rounded 
                            hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500  ">
                            <span>Tambah</span>
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
