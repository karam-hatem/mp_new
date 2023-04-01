@extends('layouts.dash')
@section('content')


    <table class="table container mt-5">
        <thead>
        {{--  Item  عرض قائمة  --}}
            <tr style="text-align: center ;color:aliceblue">
                <th scope="col">image</th>
                <th scope="col">Title</th>
                <th scope="col">price</th>
                <th scope="col">Menu</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                @foreach ($menu->items as $item)
                    <tr style="text-align: center ;color:aliceblue">
                        <td><img src="{{ asset($item->image) }}" width="100px" alt=""></td>

                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $menu->title }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/item/{{$item->id}}/edit" class="btn btn-outline-primary">Edit</a>
                            </div>
                        </td>
                        <td>
                            <form action="/item/{{$item->id}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
