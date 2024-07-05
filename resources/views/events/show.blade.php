<x-layout>
    Názov podujatia {{ $event->nazov }}
    Hľadisko {{ $event->hladisko }}
    Adresa {{ $event->adresa }}
    Začiatok {{ $event->zaciatok }}
    Cena {{ $event->cena }}
    pocet_radov {{ $event->pocet_radov }}
    pocet_sedadiel {{ $event->pocet_sedadiel }}

    <a href="/" class="btn btn-info text-decoration-none">
        Späť
    </a>
</x-layout>