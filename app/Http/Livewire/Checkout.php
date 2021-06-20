<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga, $nomorhp, $alamat;

    public function mount()
    {
        if(!Auth::user()){
            return redirect()->route('login');
        }else{
            
        }

        $this->nomorhp = Auth::user()->nomorhp;
        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($pesanan)){
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }else{
            return redirect()->route('/');
        }
    }

    public function checkout(){
        $this->validate([
            'nomorhp' => 'required',
            'alamat' => 'required',
        ]);

        //simpan nohp dan alamat ke data user
        $user = User::where('id', Auth::user()->id)->first();
        $user->nomorhp = $this->nomorhp;
        $user->alamat = $this->alamat;
        $user->update();

        //update data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();
        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Checkout!');

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout')
        ->layout('layouts/home');
    }
}
