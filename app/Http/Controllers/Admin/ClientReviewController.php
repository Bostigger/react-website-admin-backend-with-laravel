<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientReviewController extends Controller
{
    public function GetClientReviews()
    {
        $all_client_reviews = ClientReview::latest()->get();
        return response()->json($all_client_reviews);

    }

    public function InsertClientReviews(Request $request)
    {
        $request->validate([
          'client_image'=>'required',
          'client_name'=>'required',
          'client_review'=>'required',

        ]);

        ClientReview::insert([
            'client_image'=>$request->client_image,
            'client_name'=>$request->client_name,
            'client_review'=>$request->client_review,
            'created_at'=>Carbon::now(),
        ]);
        return response('Data Inserted Successfully');
    }
}
