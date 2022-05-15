<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" :value="__('Ad')" />

                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="mb-3">
                    <x-label for="surname" :value="__('Soyad')" />

                    <x-input id="surname" type="text" name="surname" :value="old('surname')" required autofocus />
                </div>

                <div class="mb-3">
                    <x-label for="adres" :value="__('Adres')" />

                    <x-input id="adres" type="text" name="adres" :value="old('adres')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Eposta')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Şifre')" />

                    <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Şifreyi Onayla')" />

                    <x-input id="password_confirmation" type="password" name="password_confirmation" required />
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Profil fotoğrafı</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Kayıtlı mısın?') }}
                        </a>

                        <x-button>
                            {{ __('Kayıt Ol') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
