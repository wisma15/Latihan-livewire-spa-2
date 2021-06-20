<div>
    <div

        class="mt-32 mx-24 mb-32 bg-white min-w-screen min-h-screen flex justify-center font-sans overflow-hidden rounded-xl">
        <div class="flex flex-row w-full">
            <div class="w-1/2 flex flex-col">
                <h1 class="border-b text-center font-bold text-gray-700 px-5 py-3 ">Informasi Pembayaran</h1>
                <span class="text-gray-600 pt-5 px-10">Untuk pembayaran silahkan dapat dilakukan pada rekening
                    dibawah ini, Sebesar : <strong>Rp. {{number_format($total_harga)}}</strong>
                </span>
                <div class="flex flex-row py-1 pt-3 px-10 text-gray-600">
                    <img class="mr-3" src="{{asset('frontend/bri.png')}}" width="55" alt="BRI">
                    <div class="media-body">
                        <h5 class="mt-0 uppercase font-bold">Bank BRI</h5>
                        No. Rekening 092220494388 a.n <strong>Wisma Yoga</strong>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex flex-col">
                <h1 class="border-b text-center font-bold text-gray-600 px-5 py-3 ">Detail Pengiriman</h1>
                <form class="bg-white px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="nomorhp">
                        Nomor HP
                      </label>
                      <input class="shadow appearance-none border rounded w-full py-2 px-3 
                      text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                      @error('nomorhp') is-invalid @enderror"
                      wire:model="nomorhp" value="{{old('nomorhp')}}" 
                      id="nomorhp" type="text" placeholder="08xxxxxx">
                    </div>
                    <div class="mb-6">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">
                        Alamat
                      </label>
                      <textarea 
                      @error('alamat') is-invalid @enderror"
                      wire:model="alamat"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="alamat" type="text" placeholder="Jl. Sudirman..."></textarea>   
                    </div>
                    <div class="flex items-center justify-between">
                      <button wire:click.prevent="checkout()"
                      class="w-full bg-green-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                      type="submit">
                        Check Out
                      </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
