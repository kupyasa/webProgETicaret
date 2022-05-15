<x-app title="Siparişler">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Siparişler') }}
        </h2>
    </x-slot>


    @if ($siparisler->count())
        <div class="accordion" id="accordionExample">

            @foreach ($siparisler as $siparis)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $siparis->siparis_kod }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $siparis->siparis_kod }}" aria-expanded="true"
                            aria-controls="collapse{{ $siparis->siparis_kod }}">
                            Sipariş Kodu : {{ $siparis->siparis_kod }}
                        </button>
                    </h2>
                    <div id="collapse{{ $siparis->siparis_kod }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $siparis->siparis_kod }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Sipariş Durumu : {{ $siparis->durum }}</p>
                            <p>Sipariş Tarihi :
                                {{ $siparis->created_at->timezone('Europe/Istanbul')->format('d-m-Y H:i:s') }}</p>
                            <p>Sipariş Adresi : {{ $siparis->user->adres }}</p>
                            <p>Sipariş Veren : {{ $siparis->user->name }} {{$siparis->user->surname}}</p>
                            <form action="{{ route('admin.siparisduzenlesayfa', $siparis->siparis_kod) }}"
                                method="get" enctype="multipart/form-data">
                                @csrf
                                <div class="text-start my-4 my-2"> <button type="submit" class="btn btn-primary">Siparişi
                                        Güncelle</button>
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
                <p class="text-center">Sipariş bulunmamaktadır.</p>
            </div>
        </div>

    @endif
</x-app>
