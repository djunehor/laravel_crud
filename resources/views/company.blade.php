@extends('layouts.app')

@section('content')
<div class="container">

        <br>
        @include('partials.message')
        <br>
        <div class="py-5 text-center">
        
          <h2>Welcome to Nelson Group</h2>
          <p class="lead">Your number one trusted Insurance Company.</p>
        </div>
  
        <div class="row">
          <div class="col-md-3">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Add a new Company</span>
            </h4>
  
            <div class="card">
              <div style="padding-top: 25px"></div>
            <form action="{{ url('/company/add') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
              <div class="col-md-12">
                <label>Employee Name:</label>
                <input type="text" name="name" placeholder="Company Name" class="form-control">
              </div>
            </div>

  
             <div class="form-group">
              <div class="col-md-12">
                <label>Company Email:</label>
                <input type="email" name="email" placeholder="Company Email" class="form-control">
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-12">
                      <label>Company Phone Number:</label>
                      <input type="number" name="phone" placeholder="Company Phone Number" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                        <div class="col-md-12">
                          <label>Company Website:</label>
                          <input type="text" name="website" placeholder="Company Website" class="form-control">
                        </div>
                      </div>      

                      <div class="form-group">
                            <div class="col-md-12">
                              <label>Company Address:</label>
                              <input type="text" name="address" placeholder="Company Address" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                                <div class="col-md-12">
                                  <label>Upload Company Logo:</label>
                                  <input type="file" name="logo" placeholder="Upload logo" class="form-control">
                                </div>
                              </div>
  
            <div class="form-group">
              <div class="col-md-12">
               <button class="btn btn-primary">Add A New Company</button>
              </div>
            </div>
  
            </div>
  
            </form>
  
           </div>
  
           <div class="col-md-9">
                <div class="col-md-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                          <span class="text-muted">Add a new Company</span>
                        </h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Website</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                    @foreach($company as $companies)
                <tr>
                <td><img src="/images/{{ $companies->logo }}" width="50"  alt=""/></td>
                  <td>{{ $companies->name }}</td>
                  <td>{{ $companies->email }}</td>
                  <td>{{ $companies->office_number }}</td>
                  <td>{{ $companies->website }}</td>
                  <td>{{ $companies->created_at->diffForHumans() }}</td>
                <td><a href="/company/edit/{{$companies->id}}" class="btn btn-primary btn-sm margin-left">Edit</a></td>
                <td>  
                <form method="post" action="{{ route('delete', $companies->id) }}">
                        {{method_field('DELETE')}}
                         {{csrf_field()}}
                        <button class="btn btn-danger btn-sm margin-left">Delete</button>
                  </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $company->links() }}
           </div>
         </div>
@endsection
