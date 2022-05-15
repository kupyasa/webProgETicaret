<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <x-application-logo width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link" href="{{ url('/misyonvizyon') }}"
                        class="text-muted">Misyon-Vizyon</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/hakkimizda') }}"
                        class="text-muted">Hakkımızda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('iletisim') }}"
                        class="text-muted">İletişim</a></li>

            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-around flex">
                <form class="d-flex" method="GET" action="/">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Ara" name="search" value="{{ request()->get('title') }}">
                    <button class="btn btn-outline-success" type="submit">Ara</button>
                </form>
            </ul> 

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex">
                @auth
                    @customer
                    <li>
                        <a href="{{ url('/sepetim') }}" class="btn btn-secondary">Sepetim</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hoşgeldin {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/">{{ __('Ana Sayfa') }}</a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </x-dropdown-link>
                            </form>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/siparislerim') }}">Siparişlerim</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/bilgilerim') }}">Bilgilerim</a>
                            </li>
                        </ul>
                    </li>

                    @endcustomer

                    @admin

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hoşgeldin {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/">{{ __('Ana Sayfa') }}</a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </x-dropdown-link>
                            </form>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.urunler') }}">Ürünler</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('urun.eklesayfa') }}">Ürün Ekle</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.customers') }}">Müşteriler</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.siparisler') }}">Siparişler</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.bilgilerim') }}">Bilgilerim</a>
                            </li>
                        </ul>
                    </li>
                    @endadmin
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"
                            class="text-muted">Giriş Yap</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"
                            class="text-muted">Kayıt Ol</a></li>
                @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Second nav -->
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <x-application-logo width="36" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">


                    @if (Route::has('login'))
                        <div class="hidden">
                            @auth
                                <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-muted">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-muted">Register</a>
                                @endif
                        @endif
                </div>
                @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">

                    <!-- Settings Dropdown -->
                    @auth
                        <x-dropdown id="settingsDropdown">
                            <x-slot name="trigger">
                                {{ Auth::user()->name }}
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="/">
                                    {{ __('Home') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </ul>
            </div>
            </div>
        </nav> --}}
