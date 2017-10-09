{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true])

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate(trans('dates.date:detection')) !!}

    {{-- Field: Pest --}}
    {!! Form::agronomicPests($pests ?? null) !!}

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}

</div>