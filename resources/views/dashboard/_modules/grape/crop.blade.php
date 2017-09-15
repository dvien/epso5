<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_name">{{ sections('crops.title') }}</label>
        <input type="text" name="plot_crop_name" class="form-control" value="{{ $cropName ?? null }}" readonly="readonly">
    </div>

    {{-- Field: Crop Variety --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_variety_id">{{ sections('crop_varieties.title') }}</label>
        <select name="crop_variety_id" id="crop_variety_id" class="form-control" required="required">
            <option></option>
            @foreach($cropVarieties as $key => $value)
                {!! Form::optionSelected($data->crop_variety_id ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>

    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_training">{{ sections('trainings.title') }}</label>
        <select name="crop_training" id="crop_training" class="form-control">
            <option></option>
            @foreach($cropTrainig as $key => $value)
                {!! Form::optionSelected($data->crop_training ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>
</div>