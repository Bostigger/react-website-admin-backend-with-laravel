<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function GetHomeData()
    {
        $home_data = HomePage::all();
        return response()->json($home_data);
    }

    public function InsertHomeData(Request $request)
    {
        HomePage::insert([
           'home_title'=>$request->home_title,
           'home_subtitle'=>$request->home_subtitle,
           'button_text'=>$request->button_text,
           'project_number'=>$request->project_number,
           'clients_number'=>$request->clients_number,
           'reviews_number'=>$request->reviews_number,
           'video_description'=>$request->video_description,
           'video_url'=>$request->video_url,
           'manager_photo'=>$request->manager_photo,
        ]);

        return response('Home Data successfully inserted');
    }
}
