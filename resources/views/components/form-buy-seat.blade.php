<!--
komponent obsahuje formular na nakup listkov, vybrane tlacidla sa poslu do controllera, ktory updatne data v databaze
-->

@props(['occupiedSeats', 'id'])

<form method="POST" action="/event/update/seats/{{ $id }}">
    @csrf
    @method('PATCH')
    <div id="selected-to-save" class="pb-3">
        @if($occupiedSeats)
            @foreach($occupiedSeats as $os)
                <input name="seats[]" type="hidden" value="{{ $os }}">
            @endforeach
        @endif
    </div>

    <div class="row">
        <div class="mt-5 mb-5 col-10 offset-1 d-flex justify-content-center gap-3">
            <button id="buy_seats" type="submit" class="btn btn-info d-none">
                Kúpiť
            </button>
            <a href="/" class="btn btn-info text-decoration-none">
                Späť
            </a>
        </div>
    </div>
</form>