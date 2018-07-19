@extends('layouts.app')

@section('content')
<div class="container">

        <br>
        @include('partials.message')
        <br>
  
        <div class="row">
          <div class="col-md-12">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Edit Employee</span>
            </h4>
  
            <div class="card">
              <div style="padding-top: 25px"></div>
              <form action="{{route('update', $employee->id)}}" method="post">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
              <div class="form-group">
              <div class="col-md-12">
                <label> Employee First Name:</label>
              <input type="text" name="first_name" value="{{ $employee->first_name }}" placeholder="Employee First Name" class="form-control">
              </div>
            </div>

            <div class="form-group">
            <div class="col-md-12">
                    <label> Employee Last Name:</label>
                  <input type="text" name="last_name" value="{{ $employee->last_name }}" placeholder="Employee Last Name" class="form-control">
                  </div>
                </div>

  
             <div class="form-group">
              <div class="col-md-12">
                <label>Employee Email:</label>
                <input type="email" name="email" value="{{ $employee->email }}" placeholder="Employee Email" class="form-control">
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-12">
                      <label>Employee Phone Number:</label>
                      <input type="number" value="{{ $employee->phone }}" name="phone" placeholder="Company Phone Number" class="form-control">
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
               <button class="btn btn-primary">Update Employee</button>
              </div>
            </div>
  
            </div>
  
            </form>
  
           </div>

         </div>
@endsection
