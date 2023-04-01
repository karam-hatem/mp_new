
@extends('layouts.dash')
@section('content')
<form method="POST" action="{{ route('restaurant.update', $restaurant->id) }}" enctype="multipart/form-data" class="container">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title" style="font-size: 18px;margin:10px;color:aliceblue">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $restaurant->title }}" required>
          </div>
          <div class="form-group">
            <label for="description" style="font-size: 18px;margin:10px;color:aliceblue">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $restaurant->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="phone" style="font-size: 18px;margin:10px;color:aliceblue">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $restaurant->phone }}" required>
          </div>
          <div class="form-group">
            <label for="email" style="font-size: 18px;margin:10px;color:aliceblue">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $restaurant->email }}" required>
          </div>
          @auth
            @if(auth()->user()->role =='admin')   
            <select name="user_id">
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
            @endif
          @endauth
          <div class="form-group" >
            <label for="address" style="font-size: 18px;margin:10px;color:aliceblue">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $restaurant->address }}" required>
          </div>
          <div class="form-group">
            <label for="image" style="font-size: 18px;margin:10px;color:aliceblue">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" >
          </div>
          <div class="form-group">
            <label for="status" style="font-size: 18px;margin:10px;color:aliceblue">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $restaurant->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $restaurant->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        </div>
        <div class="col-md-6">
          <div class="card" style="width: 25rem;margin:10px">
            <img src="{{ asset($restaurant->image) }}" class="card-img-top" alt="{{ $restaurant->title }}">
            <div class="card-body">
              <p class="card-text">{{ $restaurant->title }}</p>
            </div>
          </div>
        </div>
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection


