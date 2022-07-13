@extends('Admin.Layouts.admin-master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Available Courses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course</th>
                                        <th>Description</th>
                                        <th>Instructor</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_courses as $key=> $course)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$course->course_title}}</td>
                                            <td>{{Str::limit($course->short_description,100,'...')}}</td>
                                            <td>{{$course->instructor}}</td>
                                            <td><img src="{{$course->course_image}}" style="width: 50px; height: 50px" alt=""></td>
                                            <td>
                                                <a href="{{url('/course/view/'.$course->id)}}" class="btn btn-primary"> <i class="fa fa-eye"></i> </a> |
                                                <a href="{{url('/course/edit/'.$course->id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a> |
                                                <a href="{{url('/course/delete/ '.$course->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
