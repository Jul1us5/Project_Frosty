
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
                        <p> Patiekalo koregavimas.</p>
                    </div>

                    <form method="POST" action="{{route('menu.update',[$menu])}}">
                        <div class="home_body">
                                <span>Title</span> <input type="text" name="title" value="{{$menu->title}}">
                                <span>Kaina</span> <input type="text" name="price" value="{{$menu->price}}">
                                <span>Porcijos svoris</span> <input type="text" name="weight" value="{{$menu->weight}}">
                                <span>Mėsos kiekis porcijoje</span> <input type="text" name="meat" value="{{$menu->meat}}">
                        </div> 
                        <div class="summer">
                            <textarea type="text" id="summernote" name="about">{{$menu->about}}</textarea>
                        </div>
                    
                        @csrf
                        <button class="button_Menu" type="submit">Baigti</button>
                    </form>
                    
                </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#summernote').summernote({ 
        popover: {
            image: [],
            link: [],
            air: []
            },
    placeholder: 'Komentaras',   
    height: 400,
    minHeight: 115,              
    maxHeight: 115,
    });
 });
</script>
@endsection
