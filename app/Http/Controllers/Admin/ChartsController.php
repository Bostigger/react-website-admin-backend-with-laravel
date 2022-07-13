<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Charts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function GetChartsData()
    {
        $all_charts_data = Charts::latest()->get();
        return response()->json($all_charts_data);
    }

    public function InsertChartData(Request $request)
    {
        $request->validate([
           'stack_name'=>'required|unique:charts',
           'value'=>'required|unique:charts',
        ]);

        Charts::Insert([
           'stack_name'=>$request->stack_name,
           'value'=>$request->value,
           'created_at'=>Carbon::now(),
        ]);
        return response('Data inserted successfully');
    }
}
