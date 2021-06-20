<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Produkdetail extends Component
{
    public $post, $jumlah_pesanan;

    public function mount($id)
    {
        $postDetail = Post::find($id);

        if ($postDetail) {
            $this->post = $postDetail;
        }
    }

    public function masukanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required',
        ]);

        //redirect ke login
        if(!Auth::user()){
            return redirect()->route('login');
        }

        //total harga
        $total_harga = $this->jumlah_pesanan*$this->post->harga;

        //ngecek apakah user memiliki data pesanan dg status 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //menyimpan / update data pesanan utama
        if(empty($pesanan)){
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'PSN-'.$pesanan->id;
            $pesanan->update();
        }else{
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        //menyimpan pesanan detail
        PesananDetail::create([
            'produk_id' => $this->post->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $total_harga,
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses masuk keranjang');
        return redirect()->back();
    }


    public function render()
    {
        return view('pages.produkdetail')
        ->layout('layouts.home');
    }
}
