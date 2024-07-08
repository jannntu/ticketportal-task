<!--
view sluzi na zobrazenie detailu podujatia, mapy hladiska a nakup listkov
-->

<x-layout>
    <div class="row">
        <div class="col-10 col-md-7 offset-1 offset-md-1">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="bg-white mb-4 p-3">
                <x-description-line :value='$event->nazov'>Názov podujatia:</x-description-line>
                <x-description-line :value='$event->hladisko'>Hľadisko:</x-description-line>
                <x-description-line :value='$event->adresa'>Adresa:</x-description-line>
                <x-description-line :value='$event->zaciatok'>Začiatok:</x-description-line>
                <x-description-line :value='$event->cena'>Cena:</x-description-line>
            </div> 
            <div class="bg-white p-3 mb-4 mb-md-0">
                <div class="mb-4">
                    <p class="fw-bold">
                        Kliknutím na sedadlo vložíte lístok do košíka a následne ho môžete kúpiť:
                    </p>
                    @for($i=1; $i<=$event->pocet_radov; $i++)
                        <div class="row">
                            <div class="col-3 col-md-1 p-0">
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
                <x-seats-legend></x-seats-legend>
            </div>
        </div>
        <div class="col-10 col-md-3 offset-1 offset-md-0">
            <div class="bg-white h-100 p-3">
                <div class="fw-bold w-100">Košík:</div>
                <div class="d-flex justify-content-between border-bottom">
                    <span>Rad</span>
                    <span>Sedadlo</span>
                    <span>Cena</span>
                </div>
                <div id="selected-rows-seats">
                </div>
                <div class="row border-top">
                    <div class="fw-bold col-8 p-0">
                        Vybraných miest:
                    </div>
                    <div class="col-4 p-0" id="seats-count">0
                    </div>
                </div>
                <div class="row">
                    <div class="fw-bold col-8 p-0">
                        Cena spolu:
                    </div>
                    <div class="col-4 p-0" id="price-total">0
                    </div>
                </div>
            </div>   
        </div>    
    </div>

    <x-form-buy-seat :occupiedSeats='$occupiedSeats' :id='$event->id'></x-form-buy-seat>

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

            var count = 1;
            var total = price;

            if($.isNumeric($('#seats-count').text())){
                count = parseInt($('#seats-count').text());
                count = count + 1;
            }
            if($.isNumeric($('#price-total').text())){
                total = parseInt($('#price-total').text());
                total = total + parseInt(price);
            }

            $('#seats-count').html(count);
            $('#price-total').html(total);

            var selectedToSave = $('#selected-to-save');
            $('<input name="seats[]" type="hidden" value="'+ row + '-' + seat +'">')
            .appendTo(selectedToSave);

            $('#buy_seats').removeClass("d-none");
        }
    </script>
</x-layout>