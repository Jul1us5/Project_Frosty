
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
    
                @foreach ($menus as $menu)
                <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                <a href="{{route('menu.edit',[$menu])}}">{{$menu->title}} {{$menu->price}} {{$menu->weight}} {{$menu->meat}} {{$menu->about}}</a>
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