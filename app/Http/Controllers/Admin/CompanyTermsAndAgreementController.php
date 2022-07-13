<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyTerms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyTermsAndAgreementController extends Controller
{
    public function GetCompanyTermsandInformation()
    {
        $company_terms = CompanyTerms::all();
        return response()->json($company_terms);
    }

    public function InsertCompanyProfile(Request $request)
    {
        CompanyTerms::insert([
           'refund'=>$request->refund,
           'privacy_policy'=>$request->privacy_policy,
           'terms_and_agreements'=>$request->terms_and_agreements,
           'about_company'=>$request->about_company,
            'created_at'=>Carbon::now()
        ]);
        return response('Company data successfully inserted');
    }
}
