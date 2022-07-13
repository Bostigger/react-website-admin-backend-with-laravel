@extends('Admin.Layouts.admin-master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Availabe Services</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Service</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_services as $key=> $service)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$service->service_name}}</td>
                                        <td>{{Str::limit($service->service_description,100,'...')}}</td>
                                        <td><img src="{{$service->image}}" style="width: 50px; height: 50px" alt=""></td>
                                        <td>
                                            <a href="{{url('/services/edit/'.$service->id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a> |
                                            <a href="{{url('/services/delete/ '.$service->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
@endsection()
