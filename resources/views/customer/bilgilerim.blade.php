<x-app title="Bilgilerim">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Bilgilerim') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Bilgilerimi düzenle</h5>
            <form action="{{url('/bilgilerim')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($user->image)
                    <img src="{{ asset('images/profiles/' . $user->image) }}" class="rounded mx-auto d-block"
                        style="width: 30%;height:30%">
                @else
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Ad</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Soyad</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Eposta adresi</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="adres" class="form-label">Adres</label>
                    <input type="text" class="form-control" id="adres" name="adres" value="{{ $user->adres }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" name="password" class="form-control" id="password" minlength="8" required>
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Üye aktiflik durumu</label>
                    <select class="form-select" name="is_active" id="is_active" required>
                        <option value="1" @if ($user->is_active == 1) selected @endif>Aktif</option>
                        <option value="0" @if ($user->is_active == 0) selected @endif>Pasif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Profil fotoğrafı</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="text-end my-4 my-2">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</x-app>
