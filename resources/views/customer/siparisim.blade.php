<x-app title="Sipariş">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Sipariş') }}
        </h2>
    </x-slot>

    @foreach ($siparisler as $siparis)
        <div class="card flex-row my-3">
            <img class="img-fluid"" src="{{asset('images/products/'.$siparis->urun->image)}}"
                style="width: 25%;height:25%" />
            <div class="card-body">
                <h4 class="card-title h5 h4-sm text-start">{{ $siparis->urun->ad }} </h4>
                <p class="card-text text-start">{{ $siparis->adet }} Adet</p>
                <p class="card-text text-start">Fiyat: {{ $siparis->fiyat }} TL</p>

            </div>
        </div>
    @endforeach
    <div class="card my-3">
        <div class="card-body">
            <h2 class="text-end">Toplam : {{ $toplam }} TL</h2>
            <h2 class="text-end">Sipariş Durumu : {{ $durum }}</h2>
        </div>
    </div>

</x-app>
