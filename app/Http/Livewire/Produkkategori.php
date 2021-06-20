<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Produkkategori extends Component
{
    //public $posts;
    use WithPagination;

    public $search, $kategori;
    protected $updateQueryString = ['search'];

    public function mount($kategoriId)
    {
        $kategoriDetail = Kategori::find($kategoriId);

        if ($kategoriDetail) {
            $this->kategori = $kategoriDetail;
        }
    }

    public function render()
    {

        if ($this->search) {
            $posts = Post::where('kategori_id', $this->kategori->id_produk)->where('nama', 'like', '%' . $this->search . '%')->simplePaginate(4);
        } else {
            $posts = Post::where('kategori_id', $this->kategori->id_produk)->simplePaginate(4);
        }



        return view('pages.produk', [
            'posts' => $posts,
            'nama' => $this->kategori->nama_produk,
        ])->layout('layouts.home');
    }
}
