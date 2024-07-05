@props(['create' => 0])

<div class="row pt-4">
    <div class="{{ $create ? 'col-6' : 'col-3'  }} d-flex justify-content-center">
        <button type="submit" class="btn btn-info">
            Uložiť
        </button>
    </div>
    @if(!$create)
        <div class="col-6 d-flex justify-content-center">
            <a href="/event/create/" class="btn btn-info text-decoration-none">
                Vytvoriť nové podujatie
            </a>
        </div>
    @endif
    <div class="{{ $create ? 'col-6' : 'col-3'  }} d-flex justify-content-center">
        <a href="/" class="btn btn-info text-decoration-none d-flex align-items-center">
            Späť
        </a>
    </div>
</div>