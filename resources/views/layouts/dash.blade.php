<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @yield('css')
</head>


{{-- عرض الصفحة الرئيسيه تبعت المطعم والقائمة كامله--}}
<body style="background-image: url({{url('image/s.jpg')}});background-size: cover;background-position: center;" >
    
    @include('layouts.nav')

    <div class="container flex-column align-items-center text-center " >

        <div class="main-body m-5" >
        {{-- <h3>User profile</h3> --}}
              <div class="row gutters-sm" ">
                {{-- البيانات تبعت المستخدم من ناحية الاسم الايميل و الهاتف --}}

                <form action="/user/edit" method="post"  enctype="multipart/form-data">
                  <div class="col-md-4 mb-3" >
                   
                    <div class="card" >
                      <div class="card-body" style="height: 240.6px;">
                        <div class="d-flex flex-column align-items-center text-center">
                          {{-- <img src="" alt="Admin" class="rounded-circle" width="150"> --}}
                          <img src="{{ asset(auth()->user()->image) }}" width="50%" alt="" class="rounded-circle" height="100%"> 
                          <div class="mt-3">
                            <h4>{{auth()->user()->name}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  {{-- <div class="col-md-8"> --}}
                    <div class="card mb-3">
                      <div class="card-body">
  
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" name="name" value="{{auth()->user()->name}}" style="border: none">
                            
                          </div>
                        </div>
                        
                        <hr>
  
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{auth()->user()->email}}
                          </div>
                        </div>
                        
                        <hr>
  
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary" >
                            <input type="text"  name="phone" value="{{auth()->user()->phone}}" style="border: none" required>
                          </div>
                        </div>
                        <hr>
  
                        <div class="row">
                          <div class="col-sm-12">
                            
                              @csrf
                              @method('PUT')
                              <input type="file" name="image" id="" >
                              <input type="submit" class="btn btn-success " value="Submit" style="border:rgb(191, 35, 35) ;border-radius:10px;background-color:rgb(191, 35, 35);"  style="border-radius: 10px">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
              </div>
    
            </div>
        </div>
        
    <ul class="nav nav-tabs container">
        <li class="nav-item">
            <a class="nav-link" id="restaurant" href="/restaurant" style="color: rgb(255, 255, 255)" >My Restaurants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="menu" href="/menu" style="color: rgb(255, 255, 255)">My Menus</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="item" href="/item" style="color: rgb(255, 255, 255)">My Items</a>
        </li>
    </ul>
    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">

    </script>

    @yield('js')
</body>

</html>
