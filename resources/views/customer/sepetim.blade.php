<x-app title="Sepetim">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Sepetim') }}
        </h2>
    </x-slot>


    @if ($sepets->count())

        @foreach ($sepets as $sepet)
            <div class="card flex-row my-3">
                <img class="img-fluid"" src=" {{ asset('images/products/' . $sepet->urun->image) }}"
                    style="width: 25%;height:25%" />
                <div class="card-body">
                    <h4 class="card-title h5 h4-sm text-start">{{ $sepet->urun->ad }} </h4>
                    <p class="card-text text-start">{{ $sepet->adet }} Adet</p>
                    <p class="card-text text-start">Fiyat: {{ $sepet->fiyat }} TL</p>
                    <form action="{{route('sepet.sil',['sepet'=>$sepet->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="text-end  my-2">
                            <button type="submit" class="btn btn-danger">Ürünü Sil</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        <h2 class="text-end">Toplam : {{ $toplam }} TL</h2>
        <form action="{{ url('/siparisver') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="text-end my-4 my-2">
                <button type="submit" class="btn btn-primary">Sipariş Ver</button>
            </div>
        </form>
    @else
        <div class="card">
            <div class="card-body">
                <p class="text-center">Sepetinizde ürün bulunmamaktadır.</p>
            </div>
        </div>

    @endif
</x-app>
