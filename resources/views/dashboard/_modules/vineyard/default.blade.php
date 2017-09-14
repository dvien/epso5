<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_name">{{ sections('crops.title') }}</label>
        <input type="text" name="plot_crop_name" class="form-control" value="{{ $cropName ?? null }}" readonly="readonly">
    </div>

    {{-- Field: Crop type --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_type">{{ sections('crop_variety_types.title') }}</label>
        <select name="plot_crop_type" id="plot_crop_type" class="form-control" required="required">
            @foreach($cropTypes as $key => $value)
                {!! selected($data->plot_crop_type ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>

    {{-- Field: Crop Variety --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_variety_id">{{ sections('crop_varieties.title') }}</label>
        <select name="crop_variety_id" id="crop_variety_id" class="form-control" required="required">
            @foreach($cropVarieties as $key => $value)
                {!! selected($data->crop_variety_id ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>
</div>
<script>
    {!! Minify::file('crops_variety')->js() !!}
</script>