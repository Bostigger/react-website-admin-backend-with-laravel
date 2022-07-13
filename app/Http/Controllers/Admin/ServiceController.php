<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{
    public function GetServices()
    {
        $all_services = Services::latest()->get();
        return response()->json($all_services);
    }

    public function InsertServices(Request $request)
    {

        $request->validate([
          'service_name'=>'required',
          'service_description'=>'required',
          'image'=>'required',
        ]);

        Services::insert([
            'service_name'=>$request->service_name,
            'service_description'=>$request->service_description,
            'image'=>$request->image,
            'created_at'=>Carbon::now()
        ]);

        return response('Data inserted successfully');
    }

    public function ViewServicesPage()
    {
        $all_services = Services::all();
        return view('Admin.components.services.view-services',compact('all_services'));
    }

    public function EditServicesPage($id)
    {
        $selected_service = Services::find($id);
        return view('Admin.components.services.edit-services',compact('selected_service'));
    }

    public function UpdateService(Request $request,$id)
    {
        $service_image = $request->file('photo');
        $new_name = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        $img_loc = 'assets/images/services/';
        Image::make($service_image)->resize(300,300)->save($img_loc.$new_name);
        $save_img = 'http://127.0.0.1:8000/'.$img_loc.$new_name;

        $oldImage = $request ->old_service_image;

        $img_host_path = strlen('http://127.0.0.1:8000/');

        $delete_img_path = (substr($oldImage,$img_host_path,strlen($oldImage)-$img_host_path));

        if (!empty($oldImage)){
            unlink($delete_img_path);
        }

        $request->validate([
           'service_name'=>'required',
           'service_description'=>'required',
        ]);

        Services::find($id)->update([
           'service_name'=>$request->service_name,
           'service_description'=>$request->service_description,
           'image'=>$save_img,
        ]);

        $message = [
          'message'=>'Service Successfully Updated',
          'alert-type'=>'success',
        ];

        return redirect()->back()->with($message);
    }

    public function AddServicesPage()
    {
        return view('Admin.components.services.add-services');
    }

    public function InsertNewService(Request $request)
    {

        $service_image = $request->file('photo');
        $new_image = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        $img_loc = 'assets/images/services';
        Image::make($service_image)->resize(300,300)->save($img_loc.$new_image);
        $save_img = 'http://127.0.0.1:8000/'.$img_loc.$new_image;


        Services::insert([
            'service_name'=>$request->service_name,
            'service_description'=>$request->service_description,
            'image'=>$save_img,
            'created_at'=>Carbon::now()
        ]);

        $msg = [
            'message'=>'Successfully inserted Service',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($msg);
    }

    public function DeleteService($id)
    {
        $sel_service = Services::find($id);
        $image = $sel_service->image;
        $host_path = strlen('http://127.0.0.1:8000/');
        $delete_img_path = substr($image,$host_path,strlen($image)-$host_path);
        unlink($delete_img_path);
        $sel_service->delete();
        $msg = [
            'message'=>'Successfully Deleted Service',
            'alert-type'=>'error',
        ];
        return redirect()->back()->with($msg);

    }
}
