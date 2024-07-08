@props(['value'])

<p>
    <span class="fw-bold d-md-inline-block w-25">
        {{ $slot }}
    </span> 
    {!! $value !!}
</p>