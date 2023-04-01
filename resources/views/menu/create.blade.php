@extends('layouts.dash')

@section('content')

    @if (session('msg'))
        <div class="alert alert-success container" role="alert" class="container">
            {{session('msg')}}
        </div>
    @endif
 
<form method="post" action="{{route('menu.store')}}" class="container">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">Category</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="mb-3" >
        <label for="description" class="form-label"  style="font-size: 18px;margin:10px;color:aliceblue">Restaurants</label>
        <select class="form-select" name="restaurant_id" required>
            <option selected >Select</option>
            
            @foreach ($restaurants as $restaurant)
               <option value="{{$restaurant->id}}" >{{$restaurant->title}}</option>
            @endforeach

          </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

