<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\projects;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function GetProjectsLimit()
    {
        $projects = projects::limit(3)->get();
        return response()->json($projects);
    }

    public function GetAllProjects()
    {
        $all_projects = projects::latest()->get();
        return response()->json($all_projects);
    }

    public function InsertProject(Request $request)
    {
        projects::insert([
           'project_name'=>$request->project_name,
           'project_short_description'=>$request->project_short_description,
           'project_full_description'=>$request->project_full_description,
           'project_thumbnail'=>$request->project_thumbnail,
           'project_full_image'=>$request->project_full_image,
           'project_features'=>$request->project_features,
           'project_link'=>$request->project_link,
           'created_at'=>Carbon::now(),
        ]);
        return response('Project Data successfully inserted');
    }

    public function GetSelectedProject($id)
    {
        $project = projects::findOrFail($id);
        return response()->json($project);
    }


}
