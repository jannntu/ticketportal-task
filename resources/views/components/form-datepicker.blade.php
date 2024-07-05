@props(['zaciatok'])

<div class="pb-3">
    <label for="zaciatok" class="form-label fw-bold">{{ $slot }}</label>
    <input name="zaciatok" type="text" id="datepicker" value="{{ dateToPage($zaciatok) }}" class="form-control" required>
    @error('zaciatok')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<script>
        $('#datepicker').datepicker(
            {format: 'dd.mm.yyyy'}
        );
</script>