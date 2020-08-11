
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
                    <p> Restorano koregavimas.</p>
                </div>

                <form method="POST" action="{{route('restaurant.update', [$restaurant])}}">
                    <div class="home_body">
                        <span>Pavadinimas</span> <input type="text" name="name" value="{{$restaurant->name}}">
                        <span>Talpina žmonių</span> <input type="text" name="customers" value="{{$restaurant->customers}}">
                        <span>Darbuotojų</span> <input type="text" name="employees" value="{{$restaurant->employees}}">
                        <span>Patiekalas: </span> 
                   
                    
                    <select name="menu_id">
                        
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                                {{$menu->title}} | Kaina {{$menu->price}} €
                            </option>
                        @endforeach
                    </select>
                </div> 
                    @csrf
                    <button class="button_Menu" type="submit">Baigti</button>
                </form>

            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection