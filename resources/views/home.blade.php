@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="home_container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <div class="homes">
                    <h2>{{ __('Jūs esate prisijungę') }}</h2>
                </div>


            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection