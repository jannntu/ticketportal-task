<!--
view do ktoreho sa poslu vyhladane podujatia a tie sa potom zobrazia na hlavnej stranke
-->

<tbody id="main-page-events-data">
    @if($data->count() > 0)
        @foreach($data as $oneEvent)
            <tr>
                <td data-title="Názov">
                    <a class="text-decoration-none" href="/event/show/{{ $oneEvent['id'] }}">
                        {!! $oneEvent['nazov'] !!}
                    </a>
                </td>
                <td data-title="Hľadisko">{{ $oneEvent['hladisko'] }}</td>
                <td data-title="Adresa">{{ $oneEvent['adresa'] }}</td>
                <td data-title="Začiatok">{{ $oneEvent['zaciatok'] }}</td>
                <td data-title="Upraviť">
                    <a class="text-decoration-none" href="/event/update/{{ $oneEvent['id'] }}">
                        Upraviť
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td data-title="">Hľadanému výrazu nezodpovedá žiadne podujatie.</td>
        </tr>    
    @endif
</tbody>