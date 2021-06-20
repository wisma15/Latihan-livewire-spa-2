<div>
    <div class="mt-32 min-w-screen min-h-screen flex justify-center font-sans overflow-hidden rounded-xl">
        <div class="w-full lg:w-5/6">
            <div class="bg-gray-200 shadow-md rounded mt-6">
                <table class="focus-within:min-w-max w-full table-auto">
                    <thead>
                        <tr class=" text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Tanggal Pesanan</th>
                            <th class="py-3 px-6 text-center">Kode Pemesanan</th>
                            <th class="py-3 px-6 text-center">Pesanan</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Total</th>
                            <th class="py-3 px-6 text-center">Act</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-600 bg-white text-sm rounded font-light">
                        <?php $no = 1; ?>
                        @forelse ($pesanans as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span>{{ $no++ }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="">
                                        <span>
                                            {{$item->created_at}}
                                        </span>
                                    </div>
                                </td>
                                <td align="center" class="items-center whitespace-nowrap">
                                    <div class="">
                                        <div class="">
                                            <span>
                                                {{$item->kode_pemesanan}}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 text-left">
                                    <div class="">
                                        <span>
                                            <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $item->id)->get(); ?>
                                            @foreach ($pesanan_details as $pesanan_detail)
                                                <span>
                                                    {{$pesanan_detail->post->nama}} <b>({{$pesanan_detail->jumlah_pesanan}}x)</b>, 
                                                </span>
                                            @endforeach
                                        </span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        @if ($item->status == 1)
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Belum Lunas</span>
                                        @else
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Lunas</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span class="font-bold">Rp. {{number_format($item->total_harga+$item->kode_unik)}}</span>
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
                            <h1 class="text-gray-700 text-center">
                                tidak ada data
                            </h1>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (!empty($pesanan))
                <div class="uppercase text-sm float-right text-right bg-white text-gray-700 w-1/3 shadow-md rounded mt-1 pt-2 mb-6">
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