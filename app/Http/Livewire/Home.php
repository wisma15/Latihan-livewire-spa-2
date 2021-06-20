<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use App\Models\Post;

class Home extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = Post::orderBy('id', 'desc')->limit(4)->get();
        $kategories = Kategori::all();
        return view('pages.home',[
            'kategori' => $kategories,
        ])
        ->layout('layouts.home');
    }
}
