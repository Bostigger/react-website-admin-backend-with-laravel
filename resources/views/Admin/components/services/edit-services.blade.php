@extends('Admin.Layouts.admin-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Service</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{url('/services/update/'.$selected_service->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_service_image" value="{{$selected_service->image}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Service Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="service_name" required placeholder="Service Name" value=" {{$selected_service->service_name}}" >
                                        </div>
                                    </div>
                                    @error('service_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Service Description</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <Textarea class="form-control" name="service_description" placeholder="Type your message..." rows="4">
                                                    {{$selected_service->service_description}}
                                                </Textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @error('service_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload Service Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" id="image" name="photo" required class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{$selected_service->image==null?asset('assets/images/no_image.jpg'):asset($selected_service->image)}}" id="new_image" style="height: 90px; width: 90px" alt="">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10 mt-4">
                                            <input type="submit" value="Update Service" class="btn btn-primary"/>
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
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#new_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

@endsection
