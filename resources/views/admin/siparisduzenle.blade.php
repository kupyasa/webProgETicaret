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
            <form action="{{route('admin.siparisduzenle',$siparis_kod)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="durum" class="form-label">Sipariş durumu</label>
                    <select class="form-select" name="durum" id="durum" required>
                        <option value="İşleme Alındı" @if ($durum == 'İşleme Alındı') selected @endif>İşleme Alındı</option>
                        <option value="Kargoda" @if ($durum == 'Kargoda') selected @endif>Kargoda</option>
                        <option value="Tamamlandı" @if ($durum == 'Tamamlandı') selected @endif>Tamamlandı</option>
                    </select>
                </div>
                <div class="text-end my-4 my-2">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>    
        </div>
    </div>
    
</x-app> 
