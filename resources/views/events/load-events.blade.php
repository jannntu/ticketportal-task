<!--
view do ktoreho sa poslu podujatia, ktore sa maju zobrazit na hlavnej stranke a tento view ich zobrazi
-->

@foreach($data as $oneEvent)
    <tr>
        <td data-title="Názov">
            <a class="text-decoration-none" href="/event/show/{{ $oneEvent['id'] }}">
                {!! $oneEvent['nazov'] !!}
            </a>
        </td>
        <td data-title="Hľadisko">{{ $oneEvent['hladisko'] }}</td>
        <td data-title="Adresa">{{ $oneEvent['adresa'] }}</td>
        <td data-title="Začiatok">{{ dateToPage($oneEvent['zaciatok']) }}</td>
        <td data-title="Upraviť">
            <a class="text-decoration-none" href="/event/update/{{ $oneEvent['id'] }}">
                Upraviť
            </a>
        </td>
    </tr>
@endforeach