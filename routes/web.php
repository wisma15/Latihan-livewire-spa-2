<?php

use App\Http\Livewire\Checkout;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\History;
use App\Http\Livewire\Keranjang;
use App\Http\Livewire\KonfirmasiPesanan;
use App\Http\Livewire\Produk;
use App\Http\Livewire\Produkdetail;
use App\Http\Livewire\Produkkategori;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', Home::class)->name('/');

Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/produk', Produk::class)->name('produk');
Route::get('/produk/kategori/{kategoriId}', Produkkategori::class)->name('produkkategori');
Route::get('/produk/{id}', Produkdetail::class)->name('produkdetail'); 
Route::get('/keranjang', Keranjang::class)->name('keranjang'); 
Route::get('/checkout', Checkout::class)->name('checkout'); 
Route::get('/history', History::class)->name('history'); 
Route::get('/konfirmasi', KonfirmasiPesanan::class)->name('konfirmasi'); 
