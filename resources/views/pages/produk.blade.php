<div>
    
    <section class="gradient border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
                {{$nama}}
            </h1>

            <div class="w-full mb-5">
                <div class="h-1 mx-auto bg-yellow-template w-64 opacity-90 my-0 py-0 rounded-t"></div>
            </div>

            <!-- search box -->
            <div class="w-1/5">
            </div>
            <div class="w-3/5 p-1 mb-7">
                <div class="box-wrapper">
                    <div class="relative text-gray-600 ">
                        <input wire:model="search" type="search" name="serch" placeholder="Search" class="w-full shadow-1 shadow-xl h-10 px-5 pr-10 rounded-full text-sm 
                            border-2 border-gray-400 focus:outline-none">
                        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-1/5">
            </div>


            @forelse ($posts as $item)
                <div class='flex max-w-sm w-60 my-3 bg-gray-100 shadow-2xl rounded-lg overflow-hidden mx-auto'>
                    <div class='flex items-center w-full px-2 py-3'>
                        <div class='mx-3 w-full'>
                            <div class="flex flex-row mb-4">
                                <div class="flex flex-col mt-1">
                                    <div class='text-gray-600 text-xl uppercase text-center font-semibold'>{{ $item->nama }}</div>
                                </div>
                            </div>
                            <div class='text-gray-400 font-medium text-sm rounded-md cursor-pointer mb-2'>
                                <img class="rounded" src="{{ asset('storage/' . $item->file_name) }}" width="300">
                            </div>
                            <div class="flex flex-col justify-start mb-4">
                                <p class="text-gray-500 mt-2 mb-1 ml-1 font-extrabold">Rp. {{ number_format($item->harga) }}
                                </p>
                            </div>
                            <div>
                                <a href="{{route('produkdetail', $item->id)}}" class="block bg-yellow-template py-1 px-2 text-gray-600 text-center 
                            rounded shadow-lg uppercase mt-3 mb-2 hover:bg-gray-400 hover:text-white 
                            duration-300 ease-in-out font-bold">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-center text-gray-600">
                    Data produk tidak tersedia
                </h1>
            @endforelse
            
            <div class="w-full"></div>
            <div class="container mx-auto content-center w-2/6 pt-10 pb-12">
                {{ $posts->links() }}
            </div>

    </section>

</div>
 