
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
                    <a href="{{route('home')}}"> < ATGAL </a>
                        <p> Pridėti patiekalą.</p>
                    </div>


                <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                    <div class="home_body">
                        <span>Title</span> <input type="text" name="title" value="{{old('title')}}">
                        <span>Kaina</span> <input type="text" name="price" value="{{old('price')}}">
                        <span>Porcijos svoris</span> <input type="text" name="weight" value="{{old('weight')}}">
                        <span>Mėsos kiekis porcijoje</span> <input type="text" name="meat" value="{{old('meat')}}">
                        <span>Paveiksliukas</span> <input type="file" name="img">
                    </div>
                    <div class="summer">
                        <textarea type="text" id="summernote" name="about" value="{{old('about')}}"></textarea>
                    </div>
                    
                    @csrf
                    <button class="button_Menu" type="submit">Pridėti</button>
                </form>



            </div>
            @include('layouts.menu')
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote({ 
  placeholder: 'Komentaras',   
  height: 400,
  minHeight: 115,              
  maxHeight: 115,
});
 });
</script>
@endsection