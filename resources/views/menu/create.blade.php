
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

                <form method="POST" action="{{route('menu.store')}}">
                    Title: <input type="text" name="title"><br>
                    Kaina: <input type="text" name="price"><br>
                    Porcijos svoris: <input type="text" name="weight"><br>
                    Mėsos kiekis porcijoje: <input type="text" name="meat"><br>
                    Tekstas: <input type="text" name="about"><br>

                    <select name="restaurant_id">
                        @foreach ($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit">Pridėti</button>
                </form>
            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection