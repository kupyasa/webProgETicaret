<x-app title="İletişim">
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('İletişim') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <form method="post" action="{{ url('/iletisim') }}">
                <!-- CROSS Site Request Forgery Protection -->
                @csrf
                <div class="form-group">
                    <label>Ad</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label>Eposta</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label>Telefon Numarası</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label>Konu</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                    <label>Mesaj</label>
                    <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
                </div>
                <div class="my-3 text-end"><input type="submit" name="send" value="Gönder"
                        class="btn btn-dark btn-block"></div>

            </form>
        </div>
    </div>
</x-app>
