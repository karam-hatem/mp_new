@extends('layouts.dash')

@section('content')
@if (session('msg'))
<div class="alert alert-success container" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('item.store')}}" enctype="multipart/form-data" class="container">

    @csrf   
    <div class="mb-3">
        <label for="title" class="form-label container" style="font-size: 18px;margin:10px;color:aliceblue">Category-Item</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">description</label>
        <textarea class="form-control" name="description" id="description"  rows="" required></textarea>
    </div>
    <div class="mb-3 ">
        <label for="price" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">price</label>
        <input type="number" name="price" class="form-control" id="price" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">Section</label>
        <select class="form-select" name="section_id" required>
            <option selected>Select</option>

            @foreach ($sections as $section)
               <option value="{{$section->id}}">{{$section->title}}</option>
            @endforeach

          </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label" style="font-size: 18px;margin:10px;color:aliceblue">Image</label>
        <input class="form-control" name="image" type="file" id="image" required>
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

