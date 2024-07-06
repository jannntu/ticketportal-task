<x-layout>
    <div class="row pb-5">
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <h2>Úprava podujatia: {!! $event->nazov  !!} </h2>
            <form method="POST" action="/event/update/{{ $event->id }}">
                @csrf
                @method('PATCH')
                <div class="pb-3">
                    <label for="nazov" class="form-label fw-bold">Názov</label>
                    <input name="nazov" type="text" id="nazov" value="{{ $event->nazov }}" required class="form-control">
                    @error('nazov')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="pb-3">
                    <label for="hladisko" class="form-label fw-bold">Hľadisko</label>
                    <input name="hladisko" type="text" id="hladisko" value="{{ $event->hladisko }}" required class="form-control">
                    @error('hladisko')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="pb-3">
                    <label for="adresa" class="form-label fw-bold">Adresa</label>
                    <input name="adresa" type="text" id="adresa" value="{{ $event->adresa }}" class="form-control">
                </div>
                <x-form-datepicker :zaciatok='$event->zaciatok'>
                    Dátum a čas začiatku podujatia
                </x-form-datepicker>
                <div class="pb-3">
                    <label for="pocet_radov" class="form-label fw-bold">Počet radov</label>
                    <input name="pocet_radov" type="number" id="pocet_radov" value="{{ $event->pocet_radov }}" required class="form-control">
                    @error('pocet_radov')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="pb-3">
                    <label for="pocet_sedadiel" class="form-label fw-bold">Počet sedadiel</label>
                    <input name="pocet_sedadiel" type="number" id="pocet_sedadiel" value="{{ $event->pocet_sedadiel }}" required class="form-control">
                    @error('pocet_sedadiel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="pb-3">
                    <label for="cena" class="form-label fw-bold">Cena</label>
                    <input name="cena" type="number" id="cena" value="{{ $event->cena }}" required class="form-control">
                    @error('cena')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <x-form-buttons></x-form-buttons>
            </form>
        </div>
    </div>
</x-layout>