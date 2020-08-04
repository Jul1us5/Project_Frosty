
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
                    @foreach ($restaurants as $restaurant)
                        <a href="{{route('restaurant.edit',[$restaurant])}}">
                            <div class="menu_box">
                                
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