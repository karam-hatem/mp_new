@extends('layouts.dash')

@section('content')
@if (session('msg'))

<div class="alert alert-success container" role="alert" class="container">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('section.store')}}" class="container">

    @csrf
    <div class="mb-3">
        <label for="title" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">Title</label>
        <input type="text" name="title" class="form-control" id="title">
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">Menus</label>
        <select class="form-select" name="menu_id">

        <option selected>Select</option>
            @foreach ($menus as $menu)
               <option value="{{$menu->id}}">{{$menu->title}}</option>
            @endforeach

          </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    
    
</form>
@endsection


