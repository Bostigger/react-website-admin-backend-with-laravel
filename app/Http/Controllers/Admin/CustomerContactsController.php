<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerContacts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerContactsController extends Controller
{
    public function InsertCustomerDetails(Request $request)
    {
       $contact_array =json_decode($request->getContent(),true);
       $name = $contact_array['customer_name'];
       $email = $contact_array['customer_email'];
       $address = $contact_array['customer_address'];
       $phone = $contact_array['customer_phone'];
       $message = $contact_array['message'];


        $request->validate([
           'customer_name'=>'required',
           'customer_address'=>'required',
           'customer_phone'=>'required',
           'message'=>'required',
        ]);

        CustomerContacts::insert([
           'customer_name'=>$name,
           'customer_address'=>$address,
           'customer_email'=>$email,
           'customer_phone'=>$phone,
           'message'=>$message,
           'created_at'=>Carbon::now(),
        ]);
        return response('Data successfully inserted');
    }

    public function GetMessages()
    {
        $resultData = CustomerContacts::latest()->get();
        return response()->json($resultData);
    }
}
