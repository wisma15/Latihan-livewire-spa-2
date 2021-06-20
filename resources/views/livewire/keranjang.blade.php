<div>
    <div class="container mx-auto flex flex-wrap pt-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
            Keranjang
        </h1>
                        
        <div class="w-full">
            <div class="h-1 mx-auto bg-yellow-template w-64 opacity-90 my-0 py-0 rounded-t"></div>
        </div>
    </div>

    <div class="min-w-screen min-h-screen flex justify-center font-sans overflow-hidden rounded-xl">
        <div class="w-full lg:w-5/6">
            <button wire:click="keHistory()"
                class=" px-10 py-1 bg-yellow-template text-gray-700 ml-3 mt-5 rounded">
                History
            </button>
            <div class="bg-gray-200 shadow-md rounded mt-3">
                <table class="focus-within:min-w-max w-full table-auto">
                    <thead>
                        <tr class=" text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Nama</th>
                            <th class="py-3 px-6 text-center">Gambar</th>
                            <th class="py-3 px-6 text-center">Jumlah</th>
                            <th class="py-3 px-6 text-center">Harga</th>
                            <th class="py-3 px-6 text-center">Total</th>
                            <th class="py-3 px-6 text-center"></th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-600 bg-white text-sm rounded font-light">
                        <?php $no = 1; ?>
                        @forelse ($pesanan_detail as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span>{{ $no++ }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="">
                                        <span>
                                            {{ $item->post()->get()->implode('nama') }}
                                        </span>
                                    </div>
                                </td>
                                <td align="center" class="items-center whitespace-nowrap">
                                    <div class="">
                                        <div class="">
                                            {{-- {{ $item->post()->get()->implode('file_name')}} --}}
                                            <img src="{{ asset('storage/'.$item->post()->get()->implode('file_name'),) }}" width="150" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="">
                                        <span>{{ $item->jumlah_pesanan }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span>Rp.
                                            {{ number_format($item->post()->get()->implode('harga'), ) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span class="font-semibold">Rp. {{ number_format($item->total_harga) }}</span>
                                    </div>
                                </td>

                                <td class="py-3 text-center">
                                    <div class="item-center justify-center">
                                        <button wire:click="destroy({{ $item->id }})"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <table>
                                <tr>
                                    <h1 class="text-gray-700 text-xl font-bold py-3 w-full text-center">
                                        ANDA BELUM MEMASUKAN PESANAN KE KERANJANG :)
                                    </h1>
                                </tr>
                            </table>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (!empty($pesanan))
                <div class="uppercase text-sm float-right text-right bg-white text-gray-700 w-full shadow-md rounded mt-1 pt-2 mb-6">
                    <table class="float-right  pr-10 ">
                        <tr class="font-bold text-gray-600">
                            <td class="">Total Harga :</td>
                            <td class="py-3 px-2 pr-10">Rp. {{ number_format($pesanan->total_harga) }}</td>
                        </tr>
                        <tr class="font-bold text-gray-600">
                            <td class="">Kode Unik :</td>
                            <td class="py-3 px-2 pr-10">{{ $pesanan->kode_unik }}</td>
                        </tr>
                        <tr class="font-bold text-gray-600">
                            <td class="">Total Bayar :</td>
                            <td class="py-3 px-2 pr-10">Rp.
                                {{ number_format($pesanan->total_harga + $pesanan->kode_unik) }}</td>
                        </tr>

                        <tr class=" font-bold">
                            <td class=""></td>
                            <td class="py-3 px-2 pb-4 pr-7">
                                <a href="{{ route('checkout') }}" class="inline-flex items-center px-6 py-2 bg-green-400 text-white text-sm font-medium rounded 
                            hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500  ">
                                    <span>Checkout</span>
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
            {{-- {{ $post->links() }} --}}
        </div>
    </div>
</div>
