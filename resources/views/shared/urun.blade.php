<x-app title="{{ $urun->ad }}">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $urun->ad }}
        </h2>
    </x-slot>
    <div>
        <div class="card flex-row">
            <img class="img-fluid"" src="{{asset('images/products/'.$urun->image)}}"
                style="width: 50%;height:50%" />
            <div class="card-body">
                <h4 class="card-title h5 h4-sm text-start">{{ $urun->ad }} </h4>
                <p class="card-text text-start">{{ $urun->fiyat }} TL</p>
                @customer
                @if ($urun->satis_durumu)
                <form action="{{ url('/sepetekleveyaguncelle') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline">
                        <input type="hidden" name="urun_id" value="{{ $urun->id }}">
                        <input type="hidden" name="fiyat" value="{{ $urun->fiyat }}">
                        <label class="form-label" for="adet">Adet</label>
                        <input type="number" id="adet" name="adet" class="form-control" min="1" value="1" max="{{$urun->stok}}"/>

                        <div class="my-4 my-2 text-end"> <button type="submit" class="btn btn-primary">Sepete
                                Ekle</button>
                        </div>

                </form>
                @endif
                @endcustomer
            </div>
        </div>
    </div>
    <div>
        <div class="card my-3">
            <div class="card-body">
                <h2>Ürün Açıklaması</h2>
                <p>{{ $urun->aciklama }}</p>
            </div>
        </div>
    </div>
    <div>
        <div class="card my-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Özellikler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Menşei : {{ $urun->mensei }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Garanti : {{ $urun->garanti }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Boyutlar YxGxD &#40;mm&#41; : {{ $urun->boyut }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Önbellek : {{ $urun->onbellek }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Ekran Özellikleri : {{ $urun->ekran_ozellikleri }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Wi-Fi : {{ $urun->wifi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Ethernet : {{ $urun->ethernet }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Siyah Baskı Hızı : {{ $urun->siyah_baski_hizi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Renkli Baskı Hızı : {{ $urun->renkli_baski_hizi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">İlk Baskı Süresi : {{ $urun->ilk_baski_suresi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Dubleks Baskı : {{ $urun->dubleks_baski }}</th>
                        </tr>
                        <tr>
                            <th scope="row">A3 Baskı : {{ $urun->a3_baski }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Baskı Kalitesi &#40;Renkli&#41; : {{ $urun->baski_kalitesi_renkli }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Baskı Kalitesi &#40;Siyah&#41; : {{ $urun->baski_kalitesi_siyah }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Faks : {{ $urun->faks }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Renkli Tarama : {{ $urun->renkli_tarama }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Tarayıcı Bit Derinliği : {{ $urun->tarayici_bit_derinligi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Tarayıcı Çözünürlüğü : {{ $urun->tarayici_cozunurlugu }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Kağıt Türleri : {{ $urun->kagit_turleri }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Ağırlık : {{ $urun->agirlik }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Toner/Kartuş Sayısı : {{ $urun->toner_kartus_sayisi }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Toner/Kartuş Kapasitesi : {{ $urun->toner_kartus_kapasitesi }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
