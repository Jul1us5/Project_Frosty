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

                    <div class="home_head">
                        @include('layouts.navi')
                        <p> Patiekalo apžvalga.</p>
                    </div>


                    <div class="space_show">

                        <h3>{{ $menu->title }}</h3>
                        <div class="img_space">
                            <img src="{{ asset('images/menu/' . $menu->img) }}">
                        </div>
                        <span>{{ $menu->price }} €</span>
                        <span>{{ $menu->weight }} gr.</span>
                        <span>{{ $menu->meat }} gr.</span>
                        {!! $menu->about !!}

                    </div>

                    <div class="menu_box up"><a href="{{ route('menu.edit', [$menu]) }}">Meniu koregavimas</a></div>
                </div>
                @include('layouts.menu')
            </div>
        </div>
    </div>
@endsection
