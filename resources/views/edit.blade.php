@extends('layouts.app')

@section('content')
<div class="container">

        <br>
        @include('partials.message')
        <br>
  
        <div class="row">
          <div class="col-md-12">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Edit Company</span>
            </h4>
  
            <div class="card">
              <div style="padding-top: 25px"></div>
              <form action="{{route('update', $company->id)}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
              <div class="form-group">
              <div class="col-md-12">
                <label>Company Name:</label>
              <input type="text" name="name" value="{{ $company->name }}" placeholder="Company Name" class="form-control">
              </div>
            </div>

  
             <div class="form-group">
              <div class="col-md-12">
                <label>Company Email:</label>
                <input type="email" name="email" value="{{ $company->email }}" placeholder="Company Email" class="form-control">
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-12">
                      <label>Company Phone Number:</label>
                      <input type="number" value="{{ $company->office_number }}" name="phone" placeholder="Company Phone Number" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                        <div class="col-md-12">
                          <label>Company Website:</label>
                          <input type="text" name="website" value="{{ $company->website }}" placeholder="Company Website" class="form-control">
                        </div>
                      </div>      

                      <div class="form-group">
                            <div class="col-md-12">
                              <label>Company Address:</label>
                              <input type="text" name="address" value="{{ $company->office_address }}" placeholder="Company Address" class="form-control">
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
               <button class="btn btn-primary">Update Company</button>
              </div>
            </div>
  
            </div>
  
            </form>
  
           </div>

         </div>
@endsection
