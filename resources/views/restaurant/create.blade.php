
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

                    <form method="POST" action="{{route('restaurant.store')}}">
                        Pavadinimas: <input type="text" name="name"><br>
                        Talpina žmonių: <input type="text" name="customers"><br>
                        Darbuotojų: <input type="text" name="employees"><br>
               
                        @csrf
                        <button type="submit">Pridėti</button>
                    </form>

                    
                    </div>
                    @include('layouts.menu')
        </div>
    </div>
</div>
@endsection