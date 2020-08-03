
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

                    <form method="POST" action="{{route('menu.update',[$menu])}}">
                        Title: <input type="text" name="title" value="{{$menu->title}}">
                        Kaina: <input type="text" name="price" value="{{$menu->price}}">
                        Porcijos svoris: <input type="text" name="weight" value="{{$menu->weight}}">
                        Mėsos kiekis porcijoje: <input type="text" name="meat" value="{{$menu->meat}}">
                        
                        <div class="form-group">
                        <label>About</label>
                        <input type="text" name="about" id="summernote" class="form-control" value="{{$menu->about}}">
                        <!-- <textarea name="about" id="summernote"></textarea> -->
                        <small class="form-text text-muted">.</small>
                        </div>
                        
             
                        <select name="restaurant_id">
                            @foreach ($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}" @if($restaurant->id == $menu->restaurant_id) selected @endif>
                                    {{$restaurant->name}}
                                </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>


   

                    </div>
                    @include('layouts.menu')
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection
