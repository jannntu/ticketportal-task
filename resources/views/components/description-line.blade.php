<!--
    komponent zobrazuje jeden riadok informacii o podujati v detaile podujatia
-->

@props(['value'])

<p>
    <span class="fw-bold d-md-inline-block w-25">
        {{ $slot }}
    </span> 
    {!! $value !!}
</p>