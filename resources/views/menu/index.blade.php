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
                åß

                @if (!count($menus) == 0)

                <form action="{{route('menu.index')}}" method="get">
                    <div class="filter">
                        <select name="id">
                            <option value="0">Show all</option>
                            @foreach ($restaurants as $restaurant)
                            <option class="options" value="{{$restaurant->menu_id}}" @if($select==$restaurant->menu_id) selected @endif>{{$restaurant->name}}</option>
                            @endforeach
                        </select>

                        Price : <input type="radio" name="sort" value="price" @if('price'==$sort) checked @endif>
                        Title : <input type="radio" name="sort" value="title" @if('title'==$sort) checked @endif>
                        <button type="submit">FILTER</button>
                        <a href="{{route('menu.index')}}">X</a>
                    </div>
                </form>

                <span>Pavadinimas</span><span>Kaina</span><span>Svoris</span> <span>Įdaras</span><span></span>
                @foreach($menus as $menu)
                <div class="menu_box">
                    <a href="{{route('menu.show', [$menu])}}">
                        <span>{{$menu->title}}</span><span>{{$menu->price}} €</span><span>{{$menu->weight}} g.</span> <span>{{$menu->meat}} g.</span>
                        <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                            <button type="submit"><i class="fa fa-ban"></i></button>
                    </a>
                    @csrf
                    </form>
                </div>
                @endforeach

                @else
                <div class="homes">
                    <h3>Pirmiausiai reikia pridėti patiekalą</h3>
                </div>
                @endif
                <div class="menu_box up"><a href="{{route('menu.create')}}"><b>Pridėti naują</b></a></div>
            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection