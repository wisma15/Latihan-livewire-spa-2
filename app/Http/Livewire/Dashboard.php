<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Kategori;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Dashboard extends Component
{
    use WithFileUploads;
    use withPagination;
    public  $nama,
        $deskripsi,
        $harga,
        $kategori_id,
        $file_name,
        $modal = false,
        $post_id,
        $old_file_name,
        $deleteConfirmation = false,
        $deleteId;

    public function render()
    {
        // $posts = Post::with('kategori')->get();
        // return view('dashboard', [
        //     'post' => $posts,
        // ]);

        $posts = Post::with('kategori')->latest()->simplePaginate(7);
        $kategories = Kategori::all();
        return view('dashboard', [
            'post' => $posts,
            'kategori' => $kategories,
            
        ]);
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->resetField();
    }

    public function resetField()
    {
        $this->nama = "";
        $this->deskripsi = "";
        $this->harga = null;
        $this->kategori_id = null;
        $this->file_name = null;
        $this->deleteId = null;
    }

    public function store()
    {
        $imageValidation = '';
        if ($this->file_name != $this->old_file_name) {
            $imageValidation = "required|image|mimes:jpg,jpeg,png|max:5024";
        }

        $this->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'file_name' => $imageValidation
        ]);


        if ($this->file_name != $this->old_file_name) {
            $fileName = $this->file_name->store('post');
        } else {
            $fileName = $this->file_name;
        }

        $result = Post::updateOrCreate(['id' => $this->post_id], [
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'kategori_id' => $this->kategori_id,
            'file_name' => $fileName
        ]);
        if ($result != "0") {
            session()->flash('message', 'berhasil mengupdate data');
        } else {
            session()->flash('errMessage', 'gagal mengupdate data');
        }
        $this->closeModal();
        $this->resetField();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->nama = $post->nama;
        $this->deskripsi = $post->deskripsi;
        $this->harga = $post->harga;
        $this->kategori_id = $post->kategori_id;
        $this->file_name = $post->file_name;
        $this->old_file_name = $post->file_name;
        $this->post_id = $id;
        $this->openModal();
    }

    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->deleteConfirmation = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteConfirmation = false;
        $this->resetField();
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $result = $post->delete();
        if ($result != "0") {
            session()->flash('message', 'berhasil menghapus data');
        } else {
            session()->flash('errMessage', 'gagal menghapus data');
        }
        $this->closeDeleteModal();
    }
}
