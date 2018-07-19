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
              <span class="text-muted">Add a new Employee</span>
            </h4>
  
            <div class="card">
              <div style="padding-top: 25px"></div>
            <form action="{{ url('/employee/add') }}" method="post">
                @csrf
              <div class="form-group">
              <div class="col-md-12">
                <label>Employee First Name:</label>
              <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name" class="form-control">
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-12">
                      <label>Employee Last Name:</label>
                    <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name" class="form-control">
                    </div>
                  </div>

  
             <div class="form-group">
              <div class="col-md-12">
                <label>Employee Email:</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder= "Email" class="form-control">
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-12">
                      <label>Employee Phone Number:</label>
                    <input type="number" name="phone" value="{{old('phone')}}" placeholder="Phone Number" class="form-control">
                    </div>
                  </div>
 
                  <div class="form-group">
                        <div class="col-md-12">
                        <label>Select Company</label>
                        <select id="inputState" class="form-control" name="company_id">
                          <option selected="">Select Company</option>
                          @foreach($company as $companies)
                        <option value="{{$companies->id}}">{{$companies->name}}</option>
                          @endforeach
                        </select>
                      </div>   
                  </div>  

                        
            <div class="form-group">
              <div class="col-md-12">
               <button class="btn btn-primary">Add Employee</button>
              </div>
            </div>
  
            </div>
  
            </form>
  
           </div>
  
           <div class="col-md-9">
                <div class="col-md-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                          <span class="text-muted">Add a new Employee</span>
                        </h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                    @foreach($employee as $employees)
                <tr>
                  <td>{{ $employees->first_name }}</td>
                  <td>{{ $employees->last_name }}</td>
                  <td>{{ $employees->email }}</td>
                  <td>{{ $employees->phone }}</td>
                  <td>{{ $employees->created_at->diffForHumans() }}</td>
                <td><a href="/employee/edit/{{$employees->id}}" class="btn btn-primary btn-sm margin-left">Edit</a></td>
                <td>
                  <form method="post" action="{{ route('destroy', $employees->id) }}">
                        {{method_field('DELETE')}}
                         {{csrf_field()}}
                        <button class="btn btn-danger btn-sm margin-left">Delete</button>
                  </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $employee->links() }}
           </div>
         </div>
@endsection
