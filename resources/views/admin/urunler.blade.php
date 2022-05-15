<x-app title="Ürünler">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Ürünler') }}
        </h2>
    </x-slot>


    @if ($urunler->count())
        <div class="accordion" id="accordionExample">

            @foreach ($urunler as $urun)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $urun->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $urun->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $urun->id }}">
                            {{ $urun->ad }}
                        </button>
                    </h2>
                    <div id="collapse{{ $urun->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $urun->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Ürün Fiyatı : {{ $urun->fiyat }}</p>
                            <p>Ürün Stoku : {{ $urun->stok }}</p>
                            <p>Ürün Satış Durumu : {{ $urun->satis_durumu ? 'Satışta' : 'Satışta değil' }}</p>
                            <form action="{{ route('urun.duzenlesayfa', $urun->id) }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <div class="text-start my-2">
                                    <button type="submit" class="btn btn-primary">Ürünü Düzenle</button>
                                </div>
                            </form>
                            <form action="{{ route('urun.sil', $urun->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="text-start  my-2">
                                    <button type="submit" class="btn btn-danger">Ürünü Sil</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <p class="text-center">Ürün bulunmamaktadır.</p>
            </div>
        </div>

    @endif
</x-app>
