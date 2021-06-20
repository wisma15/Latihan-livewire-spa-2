<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class KonfirmasiPesanan extends Component
{
    use WithPagination;

    public $status_id, $status_nama;

    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        $this->status = $pesanan->status;
        $this->store();
    }

    public function store()
    {
        $result = Pesanan::updateOrCreate(['id' => $this->id], [
            'status' => $this->status,
        ]);
        if ($result != "0") {
            session()->flash('message', 'berhasil mengupdate data');
        } else {
            session()->flash('errMessage', 'gagal mengupdate data');
        }
    }

    public function render()
    {   
        $pesanans = Pesanan::with('status')->simplePaginate(4);
        $statuses = Status::all();
        return view('livewire.konfirmasi-pesanan',[
            'pesanan' => $pesanans,
            'status' => $statuses,
        ]);
    }
}
