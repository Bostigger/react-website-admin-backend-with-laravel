<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CoursesController extends Controller
{
    public function GetCoursesLimit()
    {
        $courses_data = Course::limit(4)->get();
        return response()->json($courses_data);
    }

    public function GetAllCoursesData()
    {
        $all_courses = Course::latest()->get();
        return response()->json($all_courses);
    }

    public function InsertCourse(Request $request)
    {
        Course::insert([
            'course_title'=>$request->course_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'course_thumbnail'=>$request->course_thumbnail,
            'course_image'=>$request->course_image,
            'long_title'=>$request->long_title,
            'students_number'=>$request->students_number,
            'duration'=>$request->duration,
            'lectures_number'=>$request->lectures_number,
            'categories'=>$request->categories,
            'tags'=>$request->tags,
            'instructor'=>$request->course_price,
            'course_price'=>$request->course_price,
            'created_at'=>Carbon::now(),
        ]);
        return response('Data inserted successfully');
    }

    public function GetSingleCourse($id)
    {

        $single_course = Course::findOrFail($id);
        return response()->json($single_course);
    }

    public function ViewCoursesPage()
    {
        $all_courses = Course::all();
        return view('Admin.components.courses.view-courses',compact('all_courses'));
    }

    public function AddCoursesPage()
    {
        return view('Admin.components.courses.add-courses');
    }

    public function AddCourses(Request $request)
    {
        $request->validate([
           'course_title'=>'required|unique:courses'
        ]);

        $course_image = $request ->file('course_image');
        $course_thumb = $request ->file('course_thumb');

        $new_course_img_name = hexdec(uniqid()).'.'.$course_image->getClientOriginalExtension();
        $img_loc = 'assets/images/courses/images/';
        Image::make($course_image)->resize(540,607)->save($img_loc.$new_course_img_name);
        $save_course_img = 'http://127.0.0.1:8000/'.$img_loc.$new_course_img_name;


        $new_course_thumb_name = hexdec(uniqid()).'.'.$course_image->getClientOriginalExtension();
        $img_thumb_loc = 'assets/images/courses/thumbnails/';
        Image::make( $course_thumb)->resize(200,200)->save($img_thumb_loc.$new_course_thumb_name);
        $save_course_thumb = 'http://127.0.0.1:8000/'.$img_thumb_loc.$new_course_thumb_name;


        $new_course = new Course;
        $new_course-> course_title = $request->course_title;
        $new_course-> short_description = $request->short_description;
        $new_course-> long_description = $request->long_description;
        $new_course-> students_number = $request->number_of_students;
        $new_course-> lectures_number = $request->lectures_number;
        $new_course-> instructor = $request->instructor;
        $new_course-> long_title = $request->long_title;
        $new_course-> categories = $request->category;
        $new_course-> tags = $request->tags;
        $new_course-> duration = $request->duration;
        $new_course-> course_price = $request->course_price;
        $new_course-> course_image = $save_course_img;
        $new_course-> course_thumbnail = $save_course_thumb;
        $new_course-> save();

        $msg = [
            'message'=>'Course Successfully Added',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($msg);
    }

    public function EditCoursePage($id)
    {
        $sel_course = Course::find($id);
        return view('Admin.components.courses.edit-course-page',compact('sel_course'));
    }

    public function UpdateCourse(Request $request,$id)
    {
        $old_course_img = $request->old_course_img;
        $old_course_thumbnail =$request->old_course_thumbnail;

        $img_host_path = strlen('http://127.0.0.1:8000/');
        $delete_img_path = (substr($old_course_img,$img_host_path,strlen($old_course_img)-$img_host_path));
        $delete_thumb_path = (substr($old_course_thumbnail,$img_host_path,strlen($old_course_thumbnail)-$img_host_path));

       #dd($delete_path)->toArray();

        if(!empty($old_course_img)){
            unlink($delete_img_path);
        }

        if (!empty($old_course_thumbnail)){
            unlink($delete_thumb_path);
        }

        $course_image = $request ->file('course_image');
        $course_thumb = $request ->file('course_thumb');


        $new_course_img_name = hexdec(uniqid()).'.'.$course_image->getClientOriginalExtension();
        $img_loc = 'assets/images/courses/images/';
        Image::make($course_image)->resize(540,607)->save($img_loc.$new_course_img_name);
        $save_course_img = 'http://127.0.0.1:8000/'.$img_loc.$new_course_img_name;


        $new_course_thumb_name = hexdec(uniqid()).'.'.$course_image->getClientOriginalExtension();
        $img_thumb_loc = 'assets/images/courses/thumbnails/';
        Image::make( $course_thumb)->resize(200,200)->save($img_thumb_loc.$new_course_thumb_name);
        $save_course_thumb = 'http://127.0.0.1:8000/'.$img_thumb_loc.$new_course_thumb_name;




        Course::find($id)->update([
            'course_title'=>$request->course_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'course_thumbnail'=>$save_course_thumb,
            'course_image'=>$save_course_img,
            'long_title'=>$request->long_title,
            'students_number'=>$request->number_of_students,
            'duration'=>$request->duration,
            'lectures_number'=>$request->lectures_number,
            'categories'=>$request->category,
            'tags'=>$request->tags,
            'instructor'=>$request->course_price,
            'course_price'=>$request->course_price,
        ]);

        $msg = [
            'message'=>'Course Successfully Updated',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($msg);
    }

    public function DeleteCourse($id)
    {

        $sel_course = Course::find($id);

        $course_img = $sel_course->course_image;
        $course_thumb= $sel_course->course_thumbnail;

        $host_path = strlen('http://127.0.0.1:8000/');
        $delete_img_path = substr($course_img,$host_path,strlen($course_img)-$host_path);
        $delete_thumb_path = substr($course_thumb,$host_path,strlen($course_thumb)-$host_path);

        unlink($delete_img_path);
        unlink($delete_thumb_path);

        $sel_course->delete();
        $msg = [
            'message'=>'Course Successfully Deleted',
            'alert-type'=>'warning',
        ];

        return redirect()->back()->with($msg);
    }
}
