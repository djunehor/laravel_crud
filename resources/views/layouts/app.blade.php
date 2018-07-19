<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .margin-left {
    margin-left: 10px !important;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        <a href="{{ route('company' )}}" type="button" class="btn btn-primary margin-left">Add Company</a>
                        <a href="{{ route('home' )}}" type="button" class="btn btn-info margin-left">Add Employee</a>
                    
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        {{-- <!-- Add Company Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                            <form action="{{route('update', $companies->id)}}" method="post" enctype="multipart/form-data">
                                    {{method_field('PUT')}}
                                    {{csrf_field()}}
                          <div class="row">
                              <div class="col-md-6">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Company Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$companies ->name}}">
                        </div>
                              </div>
                              <div class="col-md-6">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Company Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$companies ->email}}">
                              </div>
                              </div>

                              <div class="col-md-6">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Company Website:</label>
                                <input type="text" name="website" id="website" class="form-control" value="{{$companies ->website}}">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Company Adress:</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{$companies ->office_address}}">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Company Phone Number:</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{$companies ->office_number}}">
                                      </div>
                            </div>
                            <div class="col-md-6">
                                      <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Logo:</label>
                                            <input type="file" name="logo" class="form-control" id="recipient-name">
                                          </div>
                            </div>
                          
                          <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Company</button>
                              </div>
                          </div>
                </form>
                    </div>    
                            
                  </div>
                </div>
              </div>
    </div>
    <!-- Add Company Modal End -->


    <!-- Add Employee Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                      <div class="row">
                          <div class="col-md-6">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">First Name:</label>
                      <input type="text" name="first_name" class="form-control" id="recipient-name">
                    </div>
                          </div>
                          <div class="col-md-6">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Last Name:</label>
                            <input type="text" name="last_name" class="form-control" id="recipient-name">
                          </div>
                          </div>

                          <div class="col-md-6">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="recipient-name">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                <input type="number" name="phone" class="form-control" id="recipient-name">
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Company Phone Number:</label>
                                    <input type="text" name="website" class="form-control" id="recipient-name">
                                  </div>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="inputState">Select Company</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                      </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add New Company</button>
                          </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
</div>

<!-- Add Employee Modal End --> --}}

<script>
  
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id') 
            var name = button.data('name') 
            var email = button.data('email') 
            var address = button.data('address')
            var website = button.data('website')
            var phone = button.data('phone')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(id);
            modal.find('.modal-body #email').val(id);
            modal.find('.modal-body #address').val(id);
            modal.find('.modal-body #website').val(id);
            modal.find('.modal-body #phone').val(id);
      })
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var cat_id = button.data('id') 
            var modal = $(this)
            modal.find('.modal-body #exampleModal').val(id);
      })
      </script>
</body>
</html>
