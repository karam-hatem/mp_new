
@extends('layouts.app')
@section('content')
{{-- عرض قوائم المنيو تبعت المطاعم --}}
<div style="display: flex ; flex-wrap:wrap ; gap : 10px ; margin-top:20px">
    @foreach ($menus as $menu)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('image/1.jpg') }}" width="100%" height="150px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">{{$menu->title}}</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
        
          <div style="display: flex;justify-content: center;">
            <a href="/menu/{{$menu->id}}/public" class="btn btn-primary" style="text-align: center;width:150px;background-color:#bf2323;border:none">Details</a>
          </div>
        </div>
      </div>
      @endforeach
</div>

@endsection


