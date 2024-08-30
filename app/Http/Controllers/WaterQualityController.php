<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;
use Illuminate\Http\Request;

class WaterQualityController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query
        $query = WaterQuality::query();

        // Apply DO filter
        if ($request->filled('do_value')) {
            $doOperator = $request->input('do_operator', '>');
            $doValue = $request->input('do_value');
            $query->where('field1', $doOperator, $doValue);
        }

        // Apply Temperature filter
        if ($request->filled('temperature_value')) {
            $temperatureOperator = $request->input('temperature_operator', '>');
            $temperatureValue = $request->input('temperature_value');
            $query->where('field2', $temperatureOperator, $temperatureValue);
        }

        // Apply pH filter
        if ($request->filled('ph_value')) {
            $phOperator = $request->input('ph_operator', '>');
            $phValue = $request->input('ph_value');
            $query->where('field3', $phOperator, $phValue);
        }

        // Apply Ammonia filter
        if ($request->filled('ammonia_value')) {
            $ammoniaOperator = $request->input('ammonia_operator', '>');
            $ammoniaValue = $request->input('ammonia_value');
            $query->where('field4', $ammoniaOperator, $ammoniaValue);
        }

        // Apply date range filter
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        // Paginate the results
        $waterQualityData = $query->paginate(15);

        return view('water-quality.index', compact('waterQualityData'));
    }
}
