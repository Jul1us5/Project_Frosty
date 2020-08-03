
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

                    <form method="POST" action="{{route('restaurant.update',[$restaurant->id])}}">
                        Pavadinimas: <input type="text" name="name" value="{{$restaurant->name}}">
                        Talpina žmonių: <input type="text" name="customers" value="{{$restaurant->customers}}">
                        Darbuotojų: <input type="text" name="employees" value="{{$restaurant->employees}}">

                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
        

                    </div>
                    @include('layouts.menu')
        </div>
    </div>
</div>
@endsection