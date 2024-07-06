<x-layout>
    <div class="row">
        <div class="col-10 col-md-7 offset-1 offset-md-1">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="bg-white mb-4 p-3">
                <p><span class="fw-bold d-md-inline-block w-25">Názov podujatia:</span> {!! $event->nazov !!}</p>
                <p><span class="fw-bold d-md-inline-block w-25">Hľadisko:</span> {{ $event->hladisko }}</p>
                <p><span class="fw-bold d-md-inline-block w-25">Adresa:</span> {{ $event->adresa }}</p>
                <p><span class="fw-bold d-md-inline-block w-25">Začiatok:</span> {{ $event->zaciatok }}</p>
                <p><span class="fw-bold d-md-inline-block w-25">Cena:</span> {{ $event->cena }}</p>
            </div> 
            <div class="bg-white p-3 mb-4 mb-md-0">
                <div class="mb-4">
                    <p class="fw-bold">
                        Kliknutím na sedadlo vložíte lístok do košíka a následne ho môžete kúpiť:
                    </p>
                    @for($i=1; $i<=$event->pocet_radov; $i++)
                        <div class="row">
                            <div class="col-3 col-md-1">
                                Rad {{ $i }}:
                            </div>
                            <div class="col-9 col-md-11 d-flex flex-wrap">
                                @for($j=1; $j<=$event->pocet_sedadiel; $j++)
                                    @php
                                        $s = $i."-".$j;
                                    @endphp
                                    @if($occupiedSeats && in_array($s, $occupiedSeats))
                                        <div class="occupied-seat usrtooltip">
                                            {{ $j }}
                                            <p class="usrtooltiptext">
                                                Obsadené
                                            </p>
                                        </div>
                                    @else
                                        <div class="free-seat usrtooltip" onclick="selectSeat(this,'{{ $i }}','{{ $j }}','{{ $event->cena }}')">
                                            {{ $j }}
                                            <p class="usrtooltiptext">
                                                Rad číslo: {{ $i }}<br />
                                                Sedadlo číslo: {{ $j }}<br />
                                                Cena: {{ $event->cena }}
                                            </p>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="w-100 d-flex">
                    <div class="free-seat"></div> - voľné sedadlo
                </div>
                <div class="w-100 d-flex">
                    <div class="selected-seat"></div> - Vami vybrané sedadlo
                </div>
                <div class="w-100 d-flex">
                    <div class="occupied-seat"></div> - obsadené sedadlo
                </div>
            </div>
        </div>
        <div class="col-10 col-md-3 offset-1 offset-md-0">
            <div class="bg-white h-100 p-3">
                <div class="fw-bold w-100">Košík:</div>
                <div class="d-flex justify-content-between">
                    <span>Rad</span>
                    <span>Sedadlo</span>
                    <span>Cena</span>
                </div>
                <div id="selected-rows-seats">
                </div>
            </div>   
        </div>    
    </div>

    <form method="POST" action="/event/update/seats/{{ $event->id }}">
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

    <script>
        function selectSeat(el, row, seat, price) {
            $(el).removeClass("free-seat");
            $(el).addClass("selected-seat");
            $(el).prop("onclick", null).off("click");

            var selected = $('#selected-rows-seats');
            $('<div class="d-flex justify-content-between"><span>' + row + 
                '</span><span>' + seat + 
                '</span><span>' + price + 
                '</span></div>')
            .appendTo(selected);

            var selectedToSave = $('#selected-to-save');
            $('<input name="seats[]" type="hidden" value="'+ row + '-' + seat +'">')
            .appendTo(selectedToSave);

            $('#buy_seats').removeClass("d-none");
        }
    </script>
</x-layout>