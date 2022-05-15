<x-app title="Ürün Ekle">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Ürün Ekle') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Ürün ekle</h5>
            <form action="{{ route('urun.ekle') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="ad" class="form-label">Ad</label>
                    <input type="text" class="form-control" id="ad" name="ad" " required>
                </div>
                <div class=" mb-3">
                    <label for="aciklama" class="form-label">Açıklama</label>
                    <textarea class="form-control" id="aciklama" name="aciklama" rows="3" style="resize:vertical" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="mensei" class="form-label">Menşei</label>
                    <input type="text" class="form-control" id="mensei" name="mensei" required>
                </div>
                <div class="mb-3">
                    <label for="garanti" class="form-label">Garanti</label>
                    <input type="text" class="form-control" id="garanti" name="garanti" required>
                </div>
                <div class="mb-3">
                    <label for="boyut" class="form-label">Boyutlar</label>
                    <input type="text" class="form-control" id="boyut" name="boyut" required>
                </div>
                <div class="mb-3">
                    <label for="onbellek" class="form-label">Önbellek</label>
                    <input type="text" class="form-control" id="onbellek" name="onbellek" required>
                </div>
                <div class="mb-3">
                    <label for="ekran_ozellikleri" class="form-label">Ekran özellikleri</label>
                    <input type="text" class="form-control" id="ekran_ozellikleri" name="ekran_ozellikleri" required>
                </div>
                <div class="mb-3">
                    <label for="wifi" class="form-label">Wi-Fi</label>
                    <input type="text" class="form-control" id="wifi" name="wifi" required>
                </div>
                <div class="mb-3">
                    <label for="ethernet" class="form-label">Ethernet</label>
                    <input type="text" class="form-control" id="ethernet" name="ethernet" required>
                </div>
                <div class="mb-3">
                    <label for="siyah_baski_hizi" class="form-label">Siyah baskı hızı</label>
                    <input type="text" class="form-control" id="siyah_baski_hizi" name="siyah_baski_hizi" required>
                </div>
                <div class="mb-3">
                    <label for="renkli_baski_hizi" class="form-label">Renkli baskı hızı</label>
                    <input type="text" class="form-control" id="renkli_baski_hizi" name="renkli_baski_hizi" required>
                </div>
                <div class="mb-3">
                    <label for="ilk_baski_suresi" class="form-label">İlk baskı süresi</label>
                    <input type="text" class="form-control" id="ilk_baski_suresi" name="ilk_baski_suresi" required>
                </div>
                <div class="mb-3">
                    <label for="dubleks_baski" class="form-label">Dubleks baskı</label>
                    <input type="text" class="form-control" id="dubleks_baski" name="dubleks_baski" required>
                </div>
                <div class="mb-3">
                    <label for="a3_baski" class="form-label">A3 baskı</label>
                    <input type="text" class="form-control" id="a3_baski" name="a3_baski" required>
                </div>
                <div class="mb-3">
                    <label for="baski_kalitesi_renkli" class="form-label">Baskı kalitesi &#40;Renkli&#41;</label>
                    <input type="text" class="form-control" id="baski_kalitesi_renkli" name="baski_kalitesi_renkli"
                        required>
                </div>
                <div class="mb-3">
                    <label for="baski_kalitesi_siyah" class="form-label">Baskı kalitesi &#40;Siyah&#41;</label>
                    <input type="text" class="form-control" id="baski_kalitesi_siyah" name="baski_kalitesi_siyah"
                        required>
                </div>
                <div class="mb-3">
                    <label for="faks" class="form-label">Faks</label>
                    <input type="text" class="form-control" id="faks" name="faks" required>
                </div>
                <div class="mb-3">
                    <label for="renkli_tarama" class="form-label">Renkli tarama</label>
                    <input type="text" class="form-control" id="renkli_tarama" name="renkli_tarama" required>
                </div>
                <div class="mb-3">
                    <label for="tarayici_bit_derinligi" class="form-label">Tarayıcı bit derinliği</label>
                    <input type="text" class="form-control" id="tarayici_bit_derinligi" name="tarayici_bit_derinligi"
                        required>
                </div>
                <div class="mb-3">
                    <label for="tarayici_cozunurlugu" class="form-label">Tarayıcı çözünürlüğü</label>
                    <input type="text" class="form-control" id="tarayici_cozunurlugu" name="tarayici_cozunurlugu"
                        required>
                </div>
                <div class="mb-3">
                    <label for="kagit_turleri" class="form-label">Kağıt türleri</label>
                    <input type="text" class="form-control" id="kagit_turleri" name="kagit_turleri" required>
                </div>
                <div class="mb-3">
                    <label for="agirlik" class="form-label">Ağırlık</label>
                    <input type="text" class="form-control" id="agirlik" name="agirlik" required>
                </div>
                <div class="mb-3">
                    <label for="toner_kartus_sayisi" class="form-label">Toner/Kartuş sayısı</label>
                    <input type="text" class="form-control" id="toner_kartus_sayisi" name="toner_kartus_sayisi"
                        required>
                </div>
                <div class="mb-3">
                    <label for="toner_kartus_kapasitesi" class="form-label">Toner/Kartuş kapasitesi</label>
                    <input type="text" class="form-control" id="toner_kartus_kapasitesi"
                        name="toner_kartus_kapasitesi" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fiyat">Fiyat</label>
                    <input type="number" id="fiyat" name="fiyat" class="form-control" min="0" step="0.01" required />
                </div>
                <div class="mb-3">
                    <label for="satis_durumu" class="form-label">Satış durumu</label>
                    <select class="form-select" name="satis_durumu" id="satis_durumu" required>
                        <option value="1">Satışta</option>
                        <option value="0">Satışta değil</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Ürün fotoğrafı</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                </div>
                <div class="text-end my-4 my-2">
                    <button type="submit" class="btn btn-primary">Ürün Ekle</button>
                </div>
            </form>
        </div>
    </div>

</x-app>
