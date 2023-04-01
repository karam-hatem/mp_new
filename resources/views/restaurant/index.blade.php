
@extends('layouts.dash')
@section('content')
<br>
<div style="text-align: right" class="container">
    <a name="" id="" class="btn btn-primary" href="/restaurant/create"  style="text-align: center;width:150px;background-color:rgb(0, 129, 15);border:none ;font-size:16px;margin-bottom:10px;margin-right:3rem" role="button" >+Add Restaurant</a>
   
</div>
<table class="table container" > 
    <thead>
   {{--  My Restaurant  عرض قائمة  --}}
      <tr style="text-align: center ;color:aliceblue">
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">phone</th>
        <th scope="col">Edit</th>
        <th scope="col">Menus</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
        <tr style="text-align: center ;color:aliceblue" >
            <td><img src="{{ asset($restaurant->image) }}" width="100px"  alt=""></td>
            <td>{{$restaurant->title}}</td>
            <td>{{$restaurant->phone}}</td>
        <td>
                {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                    <a href="/restaurant/{{$restaurant->id}}/edit" class="btn btn-outline-info" style="text-align: center;width:75px;">Edit</a>
                    
                    {{-- <form action="/restaurant/{{$restaurant->id}}" method="post">
                      @method('delete')
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </form> --}}
                    
                  {{-- </div> --}}
                </td>
                <td>
              <a href="/restaurant/{{$restaurant->id}}/menus" class="btn btn-outline-success">Menus</a>
              <a href="/restaurant/{{$restaurant->id}}/public" class="btn btn-outline-success">Public Menu</a>
            </td>
          </tr>

        @endforeach

    </tbody>
  </table>
@endsection


