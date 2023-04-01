@extends('layouts.dash')

@section('content')

@if (session('msg'))
<div class="alert alert-success container" role="alert" class="container">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('restaurant.store')}}" enctype="multipart/form-data" class="container">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue" >Name Restaurant</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label" style="font-size: 18px;color:aliceblue">description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="3" required></textarea>
    </div>
    <div class="mb-3 ">
        <label for="phone" class="form-label" style="font-size: 18px;color:aliceblue">phone</label>
        <input type="text" name="phone" class="form-control" id="phone" required>
    </div>
    <div class="mb-3 ">
        <label for="address" class="form-label" style="font-size: 18px;color:aliceblue">address</label>
        <input type="text" name="address"  class="form-control" id="address" required>
    </div>

    @auth
       @if(auth()->user()->role =='admin')   
          <select name="user_id" class="btn btn-warning">
              @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
          </select>
       @endif
    @endauth

    <div class="mb-3">
        <label for="email" class="form-label" style="font-size: 18px;color:aliceblue">Email address</label>
        <input type="email" name="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label" style="font-size: 18px;color:aliceblue">Image</label>
        <input class="form-control" name="image" type="file" id="image" required>
      </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>
@endsection

