<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminUrunController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSiparisController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\UrunController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UrunController::class, 'index'])->name('home');

Route::get('/misyonvizyon', function () {
    return view('shared.misyonvizyon');
});

Route::get('/hakkimizda', function () {
    return view('shared.hakkimizda');
});

Route::get('/iletisim', function () {
    return view('shared.iletisim');
});
Route::post('/iletisim', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'subject' => 'required',
        'message' => 'required'
    ]);

    Mail::send('mail', array(
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'user_query' => $request->message,
    ), function ($message) use ($request) {
        $message->from($request->email);
        $message->to('yakupyasa1@gmail.com', 'Admin')->subject($request->subject);
    });

    return redirect(url('/'));
});

Route::get('/urunler/{urun:slug}', [UrunController::class, 'show']);

Route::get('/sepetim', [SepetController::class, 'index'])->name('home')->middleware('can:customer');
Route::post('/sepetekleveyaguncelle', [SepetController::class, 'store'])->middleware('can:customer');
Route::delete('/sepetim/{sepet}/sil', [SepetController::class, 'destroy'])->name('sepet.sil')->middleware('can:customer');
Route::post('/siparisver', [SiparisController::class, 'store'])->middleware('can:customer');
Route::get('/siparislerim', [SiparisController::class, 'index'])->middleware('can:customer');
Route::get('/siparislerim/{siparis_kod}', [SiparisController::class, 'show'])->middleware('can:customer');
Route::get('/bilgilerim', [CustomerController::class, 'edit'])->middleware('can:customer');
Route::post('/bilgilerim', [CustomerController::class, 'update'])->middleware('can:customer');

//admin
//urun
Route::get('/admin/urunler', [AdminUrunController::class, 'index'])->name('admin.urunler')->middleware('can:admin');
Route::get('/admin/urunler/{urun}/duzenle', [AdminUrunController::class, 'edit'])->name('urun.duzenlesayfa')->middleware('can:admin');
Route::patch('/admin/urunler/{urun}/duzenle', [AdminUrunController::class, 'update'])->name('urun.duzenle')->middleware('can:admin');
Route::get('/admin/urunler/urunekle', [AdminUrunController::class, 'create'])->name('urun.eklesayfa')->middleware('can:admin');
Route::post('/admin/urunler/urunekle', [AdminUrunController::class, 'store'])->name('urun.ekle')->middleware('can:admin');
Route::post('/admin/urunler/{urun}/sil', [AdminUrunController::class, 'destroy'])->name('urun.sil')->middleware('can:admin');
//customer
Route::get('/admin/kullanicilar', [AdminCustomerController::class, 'index'])->name('admin.customers')->middleware('can:admin');
Route::get('/admin/kullanicilar/{user}/duzenle', [AdminCustomerController::class, 'edit'])->name('customer.editpage')->middleware('can:admin');
Route::patch('/admin/kullanicilar/{user}/duzenle', [AdminCustomerController::class, 'update'])->name('customer.edit')->middleware('can:admin');
Route::post('/admin/kullanicilar/{user}/sil', [AdminCustomerController::class, 'destroy'])->name('customer.delete')->middleware('can:admin');
//siparis
Route::get('/admin/siparisler', [AdminSiparisController::class, 'index'])->name('admin.siparisler')->middleware('can:admin');
Route::get('/admin/siparisler/{siparis_kod}/duzenle', [AdminSiparisController::class, 'edit'])->name('admin.siparisduzenlesayfa')->middleware('can:admin');
Route::patch('/admin/siparisler/{siparis_kod}/duzenle', [AdminSiparisController::class, 'update'])->name('admin.siparisduzenle')->middleware('can:admin');


Route::get('/admin/bilgilerim', [AdminController::class, 'edit'])->name('admin.bilgilerim')->middleware('can:admin');
Route::post('/admin/bilgilerim', [AdminController::class, 'update'])->name('admin.bilgilerimiduzenle')->middleware('can:admin');

require __DIR__ . '/auth.php';
