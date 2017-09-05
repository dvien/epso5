@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.list')], 
        ])
        @slot('dropdownItems', [
            [Html::class('dropdown-item')->linkCreate($role, $section)], 
        ])
    @endcomponent

    {{-- Search --}}
    @include(component_path('search'))

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- 
        Legends: For a customized legend, 
        pass the $section variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path($section))
    @endcomponent

    {{-- Modals --}}
    @section('modals')
        @include(modal_path('crop_variety_types'), ['setCustomRoute' => null])
    @endsection
@endsection