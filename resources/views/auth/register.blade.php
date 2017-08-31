@extends('dashboard')

@section('content')

    <div id="auth" class="mx-auto my-4">
        <div class="card">

        <div class="card-header text-center bg-gray">
            <h2>{!! icon('password', trans('auth.user:register')) !!}</h2>
        </div>
            
        <div class="card-block bg-white">
            {!! BootForm::open()->action(url('register'))->id('login') !!}

                {!! BootForm::inputGroup(null, 'name')
                    ->addGroupClass('my-4')
                    ->addClass('form-control-lg')
                    ->afterAddon(icon('user'))
                    ->placeholder(__('Name'))
                    ->required()
                !!}

                {!! BootForm::inputGroup(null, 'email')
                    ->addGroupClass('my-4')
                    ->addClass('form-control-lg')
                    ->afterAddon(icon('email'))
                    ->placeholder(__('Email'))
                    ->required()
                !!}

                {!! BootForm::inputGroup(null, 'password')
                    ->type('password')
                    ->addGroupClass('my-4')
                    ->addClass('form-control-lg')
                    ->afterAddon(icon('password'))
                    ->placeholder(__('Password'))
                    ->required()
                !!}

                {!! BootForm::inputGroup(null, 'password_confirmation')
                    ->type('password')
                    ->addGroupClass('my-4')
                    ->addClass('form-control-lg')
                    ->afterAddon(icon('password'))
                    ->placeholder(__('Password confirmation'))
                    ->required()
                !!}

                <br>

                <div class="d-flex justify-content-center">
                    {!! BootForm::button(icon('submit', trans('buttons.register')))
                        ->addClass('btn-primary btn-lg')
                        ->type('submit')
                     !!}
                </div>

                <br>

                <div class="text-center">
                    <a class="btn btn-link" href="{{ url('/login') }}">{{ trans('auth.user:access') }}</a>
                </div>

                {!! BootForm::close() !!}     
            </div>
        </div>
    </div>
@endsection
