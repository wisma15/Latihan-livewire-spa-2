<div>
    <div class="mt-32 min-w-screen min-h-screen flex justify-center font-sans overflow-hidden rounded-xl">
        <div class="w-full lg:w-5/6">
            <div class="bg-gray-200 shadow-md rounded">
                <table class="focus-within:min-w-max w-full table-auto">
                    <thead>
                        <tr class=" text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Tanggal Psn</th>
                            <th class="py-3 px-6 text-center">Kode Psn</th>
                            <th class="py-3 px-6 text-center">User</th>
                            <th class="py-3 px-6 text-center">Pesanan</th>
                            <th class="py-3 px-6 text-center">Total</th>
                            <th class="py-3 px-6 text-center">Status</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-600 bg-white text-sm rounded font-light">
                        <?php $no = 1; ?>
                        @forelse ($pesanan as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 text-center">
                                    <div class="items-center">
                                        <span>{{ $no++ }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="">
                                        <span>
                                            {{ $item->created_at }}
                                        </span>
                                    </div>
                                </td>
                                <td align="center" class="items-center whitespace-nowrap">
                                    <div class="">
                                        <div class="">
                                            <span>
                                                {{ $item->kode_pemesanan }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td align="center" class="items-center whitespace-nowrap">
                                    <div class="">
                                        <div class="">
                                            <span>
                                                <?php $users = \App\Models\User::where('id',
                                                $item->user_id)->get(); ?>
                                                @foreach ($users as $user)
                                                    <span>
                                                        {{ $user->name }}
                                                    </span>
                                                @endforeach
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
                                        <span class="font-bold">Rp. {{number_format($item->total_harga+$item->kode_unik)}}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="mb-4">
                                        {{-- <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label> --}}
                                        <select wire:model="" type="text" class="float-right bg-none border-none appearance-none w-full text-gray-700 focus:outline-none focus:shadow-outline" id="kategori_id" wire:model="kategori_id">
                                            <option value="">Belum Lunas</option>
            
                                            @foreach ($status as $sts)
                                                <option value="{{ $sts->id_status}}">
                                                    {{ $sts->nama_status}}
                                                    {{-- {{ $item->status()->get()->implode('nama_status')}} --}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id') <span class="text-red-500">{{ $message }}</span>@enderror
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

                {{ $pesanan->links() }}
        </div>
    </div>
</div>
