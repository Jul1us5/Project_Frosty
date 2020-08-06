
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

                
                @if (!count($menus) == 0)
                <span>Pavadinimas</span><span>Kaina</span><span>Svoris</span> <span>Įdaras</span><span></span>
                    @foreach($menus as $menu)
                    <a href="{{route('menu.edit',[$menu])}}">
                    
                        <div class="menu_box">

                            <span>{{$menu->title}}</span><span>{{$menu->price}} €</span><span>{{$menu->weight}} g.</span> <span>{{$menu->meat}} g.</span>
                                
                            <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                                <button type="submit"><i class="fa fa-ban"></i></button>
                                <a href="{{route('menu.show', [$menu])}}">???</a>
                                @csrf
                            </form>
                            
                        </div>
                    </a>


                    @endforeach
                @else
                    <div class="note">
                        <p>Reikia sukurti meniu!</p>
                    </div>
                @endif

                    
            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection