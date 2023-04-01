
@extends('layouts.dash')
@section('content')

<br>
@if(session('status'))
<div class="alert alert-warning container" >
    {{session('status')}}
</div>

@endif

<div class="container" style="display: flex;justify-content:end " >
  <a name="" id="" class="btn btn-primary" href="/menu/create" style="text-align: center;width:150px;background-color:rgb(0, 129, 15);border:none ;font-size:18px;margin-bottom:35px" role="button"> +Add Menu </a>
</div>

<table class="table container" >
    <thead>
       {{--  My Menu  عرض قائمة  --}}
      <tr style="text-align: center ;color:aliceblue">
      
        <th scope="col">Title</th>
        <th scope="col">restaurant</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Add Section</th>
        <th scope="col">Add Items</th>
        <th scope="col">All Sections</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
        <tr style="text-align: center ;color:aliceblue">

            <td>{{$menu->title}}</td>
            <td>{{$menu->restaurant->title}}</td>
            <td>  
              <form method="POST" action="/menu/{{ $menu->id }}/update-status">
                @csrf
                @method('PUT')
               
                <select name="status" id="status" class="btn btn-warning">
                    <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit" class="btn btn-outline-light">Save</button>
            </form>
            </td>

            <td>
              <a  href="/menu/{{$menu->id}}/edit" class="btn btn-outline-info">Edit</a>
            </td>

            <td>
              <a name="" id="" class="btn btn-outline-primary" href="/section/create" role="button" >Add Section</a>
            </td>

            <td>
              <a name="" id="" class="btn btn-outline-success" href="/item/create/{{$menu->id}}" role="button">Add Items</a>
            </td>


          <td>
              @foreach ($menu->sections as $section)
                  {{$section->title}}<br>
                    <form action="/section/{{$section->id}}" method="post">
                        @csrf
                        @method('DELETE')
                           {{-- الكبسه تبعت السكشن اذا بدي امسح واحد من السكشن --}}
                        <input type="submit" value="delete" class="btn btn-outline-secondary">
                    </form>
              @endforeach 
          </td>

            <td>
              <form action="/menu/{{$menu->id}}" method="post" >
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-outline-danger" value="Delete">
              </form>
            </td>

                {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}


                  {{-- </div> --}}
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection


