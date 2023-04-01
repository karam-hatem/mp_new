@extends('layouts.app')

@section('content')

    <div class="row mt-3" >
        {{-- <div style="display:flex;flex-wrap: wrap"> --}}
        @foreach ($restaurants as $restaurant)
        <div class="col-3 mb-3">
            <div class="card"  style="border-radius: 10px">
                <img src="{{asset($restaurant->image)}}"  width="100%" height="250px" alt="..." style="border-radius: 10px 10px 0 0">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">{{$restaurant->title}}</h5>
                    {{-- <p class="card-text"></p> --}}
                    
                    <div style="display: flex;justify-content: center;">
                        <a href="/restaurant/{{$restaurant->id}}/menus" class="btn btn-primary" style="text-align: center;width:150px;background-color:rgb(191, 35, 35);border:none">Menus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    {{-- </div> --}}
    </div>

@endsection
