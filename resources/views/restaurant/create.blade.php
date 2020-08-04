
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
                <form method="POST" action="{{route('restaurant.store')}}">
                    Pavadinimas: <input type="text" name="name"><br>
                    Talpina žmonių: <input type="text" name="customers"><br>
                    Darbuotojų: <input type="text" name="employees"><br>

                    <select name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->title}} {{$menu->price}}</option>
                        @endforeach
                    </select>

                    @csrf
                    <button type="submit">Pridėti</button>
                </form>
                @else
                    <div class="note">
                        <p>Kolkas tuščia..</p>
                    </div>
                @endif

            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
@endsection