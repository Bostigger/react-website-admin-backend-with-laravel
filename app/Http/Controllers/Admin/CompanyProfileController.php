<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{

    public function GetCompanyProfile()
    {
        $company_profile_data = CompanyProfile::latest()->get();
        return response()->json($company_profile_data);
    }
}
