<!--
    view na zobrazenie podujati a vyhladavanie na hlavnej stranke
-->

<x-layout>
    <div class="content">
        <div class="row">
            <div class="col-10 col-md-6 offset-1 offset-md-3">
                <x-search></x-search>
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-md-6 offset-1 offset-md-3 mb-3 mb-md-1 d-flex justify-content-center">
                <a href="/event/create/" class="btn btn-info text-decoration-none">
                    Vytvoriť nové podujatie
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="my-custom-table">
                <table class="col-10 offset-1 table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th class="my-custom-table-thead-td">Názov</th>
                            <th class="my-custom-table-thead-td">Hľadisko</th>
                            <th class="my-custom-table-thead-td">Adresa</th>
                            <th class="my-custom-table-thead-td">Začiatok</th>
                            <th class="my-custom-table-thead-td">Upraviť</th>
                        </tr>
                    </thead>
                    <tbody id="main-page-events-data">
                        @include('events.load-events')
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-md-6 offset-1 offset-md-3 d-flex justify-content-center">
                <button id="button-load-more" type="button" onclick="loadMoreEvents()" class="btn btn-info">
                    Načítať ďalších {{ $data->count() }} podujatí z {{ $count }}
                </button>
                <a id="button-reset-search" class="d-none btn btn-info text-decoration-none" href="/">
                    Späť na všetky podujatia
                </a>
            </div>
        </div>
    </div>

    <script>
        /**
         * javascritptova funkcia ktora sa vola po kliknuti na nacitanie dalsich podujati
         */
        let nextPageUrl;
        $(document).ready(function () {
            nextPageUrl = '{{ $data->nextPageUrl() }}';
        });

        function loadMoreEvents() {
            $.ajax({
                url: nextPageUrl,
                type: 'get',
                beforeSend: function () {
                    nextPageUrl = '';
                },
                success: function (data) {
                    nextPageUrl = data.nextPageUrl;
                    $('#main-page-events-data').append(data.view);
                },
                error: function (xhr, status, error) {
                    console.error("Error loading more posts:", error);
                }
            });
            }
    </script>
</x-layout>
