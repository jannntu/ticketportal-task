<!--
komponent sluzi na zobrazenie inputu na vyhladavanie na hlavnej stranke. Dalej javascript funkciu, ktora ajaxom dotiahne
data podla vyhladavaneho textu
-->

<div class="search mb-3">
    <input type="text" onKeyUp="autocompletesearch()" id="autocompletesearch" 
		class="form-control input-sm" maxlength="64" 
		placeholder="Zadaj aspoň 3 znaky pre vyhľadanie podujatia" />
    <span id="searchresult">
    </span>
</div>

<script>
	function autocompletesearch(){
		var apiurl = "{{ route('search') }}";
		var term = $("#autocompletesearch").val();
		if ( term.length > 3){
			$.ajax({
				url: apiurl,
				data: {
					term : term
				},
				dataType: 'json',
				delay: 250,
				success: function(data) {
					if(data){
						$('#button-load-more').hide();
						$('#button-reset-search').removeClass('d-none');
						$('#main-page-events-data').replaceWith(data.view);
					}
				}
			})
		}
	}
</script>