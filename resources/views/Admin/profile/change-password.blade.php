@extends('Admin.Layouts.admin-master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{route('update.password')}}">
                                    @csrf
                                    <input type="hidden" name="oldpass" value="{{$admin_user->password}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Old Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="old_password" required placeholder="Old Password" >
                                        </div>
                                    </div>
                                    @error('old_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password" required placeholder="New Password">
                                        </div>
                                    </div>
                                    @error('new_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Comfirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm_password" required placeholder="Old Password">
                                        </div>
                                    </div>
                                    @error('confirm_password')
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
