<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Produk extends Component
{
    //public $posts;
    use WithPagination;

    public $search;
    protected $updateQueryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $posts = Post::where('nama', 'like', '%'.$this->search.'%')->simplePaginate(4);
        } else {
            $posts = Post::simplePaginate(4);
        }
        
        return view('pages.produk', [
            'posts' => $posts,
            'nama' => 'Semua Produk',
        ])->layout('layouts.home');
    }

    

}
