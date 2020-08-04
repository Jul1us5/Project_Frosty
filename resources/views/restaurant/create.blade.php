
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
                <div class="home_head">
                    <a href="{{route('home')}}"> < ATGAL </a>
                    <p> Pridėti Restoraną.</p>
                </div>

                <form method="POST" action="{{route('restaurant.store')}}">
                <div class="home_body">
                    <span>Pavadinimas:</span> <input type="text" name="name" value="{{old('name')}}"><br>
                    <span>Talpina žmonių:</span> <input type="text" name="customers" value="{{old('customers')}}"><br>
                    <span>Darbuotojų:</span> <input type="text" name="employees" value="{{old('employees')}}"><br>
                    
                    <select name="menu_id">
                    <span>Darbuotojų:</span>
                        @foreach ($menus as $menu)
                        <option class="options" value="{{$menu->id}}">{{$menu->title}} {{$menu->price}}</option>
                        @endforeach
                    </select>
                </div>
                    @csrf
                    <button class="button_Menu" type="submit">Pridėti</button>
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