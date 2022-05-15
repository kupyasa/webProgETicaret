<x-app title="Kullanıcılar">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Kullanıcılar') }}
        </h2>
    </x-slot>


    @if ($customers->count())
        <div class="accordion" id="accordionExample">

            @foreach ($customers as $customer)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $customer->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $customer->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $customer->id }}">
                            {{ $customer->name }} {{ $customer->surname }}
                        </button>
                    </h2>
                    <div id="collapse{{ $customer->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $customer->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Üyelik oluşturulma tarihi :
                                {{ $customer->created_at->timezone('Europe/Istanbul')->format('d-m-Y H:i:s') }}</p>
                            <p>Üyelik aktiflik durumu : {{ $customer->is_active ? 'Aktif' : 'Aktif değil' }}</p>
                            <form action="{{ route('customer.editpage', $customer->id) }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <div class="text-end my-2">
                                    <button type="submit" class="btn btn-primary">Kullanıcıyı Düzenle</button>
                                </div>
                            </form>
                            <form action="{{ route('customer.delete', $customer->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="text-end my-2">
                                    <button type="submit" class="btn btn-danger">Kullanıcıyı Sil</button>
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
                <p class="text-center">Kullanıcı bulunmamaktadır.</p>
            </div>
        </div>

    @endif
</x-app>
