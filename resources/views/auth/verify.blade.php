@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Patvirtinkite savo elektroninį paštą') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Jūsų el. Pašto adresu išsiųsta nauja patvirtinimo nuoroda.') }}
                            </div>
                        @endif

                        {{ __('Prieš tęsdami, patikrinkite savo el. Pašto adresą, ar nėra patvirtinimo nuorodos.') }}
                        {{ __('Jei negavote el. Pašto') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Spustelėkite čia norėdami gauti kitą') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
