<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminUrunController extends Controller
{
    public function index()
    {
        return view('admin.urunler', ['urunler' => Urun::all()]);
    }

    public function edit(Urun $urun)
    {
        return view('admin.urunduzenle', ['urun' => $urun]);
    }

    public function update(Request $request, Urun $urun)
    {
        $request->validate([
            'image' => 'image'
        ]);

        $imagename = null;

        if ($request->hasFile('image')) {
            $imagename = date('dmYHi') . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/products'), $imagename);
            if (File::exists(public_path('images/products/' . $urun->image))) {
                File::delete(public_path('images/products/' . $urun->image));
            }
        } else {
            $imagename = $urun->image;
        }

        $urun->ad = $request->ad;
        $urun->aciklama = $request->aciklama;
        $urun->slug = Str::slug($request->ad, '-');
        $urun->mensei = $request->mensei;
        $urun->garanti = $request->garanti;
        $urun->boyut = $request->boyut;
        $urun->onbellek = $request->onbellek;
        $urun->ekran_ozellikleri = $request->ekran_ozellikleri;
        $urun->wifi = $request->wifi;
        $urun->ethernet = $request->ethernet;
        $urun->siyah_baski_hizi = $request->siyah_baski_hizi;
        $urun->renkli_baski_hizi = $request->renkli_baski_hizi;
        $urun->ilk_baski_suresi = $request->ilk_baski_suresi;
        $urun->dubleks_baski = $request->dubleks_baski;
        $urun->a3_baski = $request->a3_baski;
        $urun->baski_kalitesi_siyah = $request->baski_kalitesi_siyah;
        $urun->baski_kalitesi_renkli = $request->baski_kalitesi_renkli;
        $urun->faks = $request->faks;
        $urun->renkli_tarama = $request->renkli_tarama;
        $urun->tarayici_bit_derinligi = $request->tarayici_bit_derinligi;
        $urun->tarayici_cozunurlugu = $request->tarayici_cozunurlugu;
        $urun->kagit_turleri = $request->kagit_turleri;
        $urun->agirlik = $request->agirlik;
        $urun->toner_kartus_sayisi = $request->toner_kartus_sayisi;
        $urun->toner_kartus_kapasitesi = $request->toner_kartus_kapasitesi;
        $urun->stok = $request->stok;
        $urun->fiyat = $request->fiyat;
        $urun->satis_durumu = $request->satis_durumu;
        $urun->image = $imagename;

        $urun->save();

        return redirect(url('/admin/urunler'));
    }

    public function create()
    {
        return view('admin.urunekle');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $imagename = date('dmYHi') . $request->image->getClientOriginalName();
        $request->image->move(public_path('images/products'), $imagename);

        $urun = Urun::make([
            'ad' => $request->ad,
            'aciklama' => $request->aciklama,
            'slug' => Str::slug($request->ad, '-'),
            'mensei' => $request->mensei,
            'garanti' => $request->garanti,
            'boyut' => $request->boyut,
            'onbellek' => $request->onbellek,
            'ekran_ozellikleri' => $request->ekran_ozellikleri,
            'wifi' => $request->wifi,
            'ethernet' => $request->ethernet,
            'siyah_baski_hizi' => $request->siyah_baski_hizi,
            'renkli_baski_hizi' => $request->renkli_baski_hizi,
            'ilk_baski_suresi' => $request->ilk_baski_suresi,
            'dubleks_baski' => $request->dubleks_baski,
            'a3_baski' => $request->a3_baski,
            'baski_kalitesi_siyah' => $request->baski_kalitesi_siyah,
            'baski_kalitesi_renkli' => $request->baski_kalitesi_renkli,
            'faks' => $request->faks,
            'renkli_tarama' => $request->renkli_tarama,
            'tarayici_bit_derinligi' => $request->tarayici_bit_derinligi,
            'tarayici_cozunurlugu' => $request->tarayici_cozunurlugu,
            'kagit_turleri' => $request->kagit_turleri,
            'agirlik' => $request->agirlik,
            'toner_kartus_sayisi' => $request->toner_kartus_sayisi,
            'toner_kartus_kapasitesi' => $request->toner_kartus_kapasitesi,
            'stok' => $request->stok,
            'fiyat' => $request->fiyat,
            'satis_durumu' => $request->satis_durumu,
            'image' => $imagename
        ]);

        $urun->save();

        return redirect(url('/admin/urunler'));
    }

    public function destroy(Urun $urun)
    {
        $urun->delete();

        return redirect(url('/admin/urunler'));
    }
}
