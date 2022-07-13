@extends('Admin.Layouts.admin-master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
             <div class="row">
       <div class="col-xl-8 col-lg-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">Update Profile Details</h4>
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form method="POST" action="{{route('update.admin.profile')}}">
                           @csrf
                           <div class="form-group row">
                               <label class="col-sm-3 col-form-label">Email</label>
                               <div class="col-sm-9">
                                   <input type="email" class="form-control" name="email" required placeholder="Email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                               </div>
                           </div>
                           @error('email')
                           <span class="text-danger">{{$message}}</span>
                           @enderror

                           <div class="form-group row">
                               <label class="col-sm-3 col-form-label">Current Name</label>
                               <div class="col-sm-9">
                                   <input type="text" class="form-control" name="username" required placeholder="username" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                               </div>
                           </div>
                           @error('username')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                           <div class="form-group row">
                               <div class="col-sm-10">
                                   <button type="submit" class="btn btn-primary">Update</button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
        </div>
    </div>

@endsection
