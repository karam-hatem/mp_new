@extends('layouts.dash')

@section('content')

@if (session('msg'))
<div class="alert alert-success container" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="POST" action="{{ route('item.update', $item->id) }}" class="container">

    <div class="form-group">
        <label for="image" style="font-size: 18px;margin:10px;color:aliceblue">Image URL</label>
        <img src="{{ asset($item->image) }}" width="100px" alt="" style="margin: 10px">

        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title" style="font-size: 18px;margin:10px;color:aliceblue">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $item->title }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
        <label for="description" style="font-size: 18px;margin:10px;color:aliceblue">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2" required>{{ $item->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
      <label for="price" style="font-size: 18px;margin:10px;color:aliceblue">Price</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $item->price }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
        <label for="status" style="font-size: 18px;margin:10px;color:aliceblue">Status</label>
        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

  <div class="form-group">
    <label for="section_id" style="font-size: 18px;margin:10px;color:aliceblue">Section</label>
        <select class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ $item->section_id == $section->id ? 'selected' : '' }}>{{$section->menu->title}} - {{ $section->title }}</option>
            @endforeach
        </select>

        @error('section_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" style="font-size: 18px;margin:10px">Update item</button>
</form>

@endsection

