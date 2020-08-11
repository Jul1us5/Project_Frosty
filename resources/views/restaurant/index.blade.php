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

                @if (!count($restaurants) == 0)
                <form action="{{route('restaurant.index')}}" method="get">
                    <div class="filter">
                        <select name="rest">
                            <option value="0">Restoranai</option>
                            @foreach ($menus as $menu)
                            <option class="options" value="{{$menu->id}}" @if($selectRest==$menu->id) selected @endif>{{$menu->title}}</option>
                            @endforeach
                        </select>
                        <div class="sorts">
                            Žmonių <input type="radio" name="sortRest" value="customers" @if('customers' == $sortRest) checked @endif>
                            Personalas <input type="radio" name="sortRest" value="employees" @if('employees' == $sortRest) checked @endif>
                            <button type="submit">Rodyti</button>
                            <a href="{{route('restaurant.index')}}"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </form>
                <span>Nr.</span><span>Pavadinimas</span><span>Žmonių</span><span>Personalas</span> <span>Patiekalas</span>
                @foreach ($restaurants as $key => $restaurant)
                <a href="{{route('restaurant.edit',[$restaurant])}}">
                    <div class="menu_box">
                        <span>{{$key+1}}</span>
                        <span>{{$restaurant->name}}</span>
                        <span>{{$restaurant->customers}}</span>
                        <span>{{$restaurant->employees}}</span>
                        <a href="{{route('menu.show', [$restaurant->menu->id])}}"><span>{{$restaurant->menu->title}}</span></a>


                        <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                            <button type="submit"><i class="fa fa-ban"></i></button>
                            @csrf
                        </form>
                    </div>
                </a>
                @endforeach

                @else
                <div class="homes">
                    <h3>Kolkas tuščia</h3>
                </div>
                @endif

                @if (!count($menus) == 0)
                <div class="menu_box up"><a href="{{route('restaurant.create')}}"><b>Pridėti naują restoraną</b></a></div>
                @endif

            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection