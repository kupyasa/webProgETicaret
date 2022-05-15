<x-app title="Ana Sayfa">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Ana Sayfa') }}
        </h2>
    </x-slot>


    @if ($uruns->count())
        <div class="row my-5">
            @foreach ($uruns as $urun)
                <div class="col-4 my-2">
                    <div class="card h-100 shadow-sm"> <img src="{{ asset('images/products/' . $urun->image) }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">

                            <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary">
                                    {{ $urun->fiyat }} TL</span>
                            </div>
                            <h5 class="card-title"><a href="/urunler/{{ $urun->slug }}">{{ $urun->ad }}</a>
                            </h5>
                            @customer
                            @if ($urun->satis_durumu)
                                <form action="{{ url('/sepetekleveyaguncelle') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="adet" value="1">
                                    <input type="hidden" name="urun_id" value="{{ $urun->id }}">
                                    <input type="hidden" name="fiyat" value="{{ $urun->fiyat }}">
                                    <div class="text-center my-4 my-2"> <button type="submit"
                                            class="btn btn-primary">Sepete
                                            Ekle</button>
                                    </div>
                                </form>
                            @endif
                            @endcustomer
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $uruns->withQueryString()->links() }}
    @else
        <div class="card">

            <div class="card-body">

                <p class="text-center">Ürün bulunmamaktadır. Lütfen daha sonra gelin.</p>

            </div>
        </div>

    @endif
</x-app>
