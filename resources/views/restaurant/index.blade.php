
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

       

                    @foreach ($restaurants as $restaurant)

                    <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                    <a href="{{route('restaurant.edit',[$restaurant])}}">{{$restaurant->name}} {{$restaurant->customers}} {{$restaurant->employees}}</a>
                    @csrf
                    <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach





                    </div>
                    @include('layouts.menu')
        </div>
    </div>
</div>
@endsection