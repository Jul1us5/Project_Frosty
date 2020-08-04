
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


                <span>Nr.</span><span>Pavadinimas</span><span>Žmonių</span><span>Personalas</span> <span>Patiekalas</span>
                @if (!count($restaurants) == 0)
                    @foreach ($restaurants as $key => $restaurant)
                        <a href="{{route('restaurant.edit',[$restaurant])}}">
                            <div class="menu_box">
                                    <span>{{$key+1}}</span>
                                    <span>{{$restaurant->name}}</span>
                                    <span>{{$restaurant->customers}}</span>
                                    <span>{{$restaurant->employees}}</span>
                                    <span>{{$restaurant->menu->title}}</span>
                                
                                    
                                    <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                                    <button type="submit">Pašalinti</button>
                                    @csrf
                                </form>
                            </div>
                        </a>
                    @endforeach
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