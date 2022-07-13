@extends('Admin.Layouts.admin-master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Course</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="" action="{{url('/course/update/'. $sel_course->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_course_img" value="{{$sel_course->course_image}}">
                                    <input type="hidden" name="old_course_thumbnail" value="{{$sel_course->course_thumbnail}}">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Course Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-username" value="{{ $sel_course->course_title}}" required name="course_title" placeholder="Enter course title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-suggestions">Short Description <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-suggestions" required name="short_description" rows="5" placeholder="Short description here">
                                                         {{ $sel_course->short_description}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-suggestions">Long Description <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" required name="long_description" rows="8" placeholder="Long description here">
                                                         {{ $sel_course->long_description}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Number of Students <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="{{$sel_course->students_number}}" id="val-email" required name="number_of_students" placeholder="Number of Students">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Number of Lectures <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email" value="{{$sel_course->lectures_number}}" name="lectures_number" placeholder="Number of Courses">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Instructor<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="{{$sel_course->instructor}}" id="val-email" name="instructor" placeholder="Instructor">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Long Title<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email" value="{{$sel_course->long_title}}" name="long_title" placeholder="Long title">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Category
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control default-select" id="val-skill" name="category">
                                                        <option value="">Please select</option>
                                                        <option value="html" {{ $sel_course->categories=='html'?"selected":''  }}>FrontEnd</option>
                                                        <option value="css" {{ $sel_course->categories=='css'?"selected":''  }}>Backend</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Tags<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="{{ $sel_course->tags  }}" id="val-email" name="tags" placeholder="separate with comma ,">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Duration<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email"  value="{{ $sel_course->duration  }}" name="duration" placeholder="Duration">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Course Price<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email" name="course_price"  value="{{ $sel_course->course_price}}"  placeholder="course price">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-group col-lg-6 mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload Service Image</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" id="image" name="course_image" required class="custom-file-input">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>

                                                </div>
                                                <div class="input-group col-lg-6  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload Thumbnail</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" id="image" name="course_thumb" required class="custom-file-input">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <input type="submit" value="Update Course" class="btn btn-primary"/>
                                                </div>
                                            </div>

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
