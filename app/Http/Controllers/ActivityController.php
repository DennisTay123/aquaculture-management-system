<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Display the calendar with activities
    public function index()
    {
        return view('activities.index');
    }

    // Fetch events for FullCalendar
    public function getEvents(Request $request)
    {
        $events = Activity::select('id', 'activity as title', 'start_date as start', 'end_date as end')
            ->get();

        return response()->json($events);
    }





    // Show the form to create a new activity
    public function create(Request $request)
    {
        $date = $request->input('date'); // Retrieve the date from the query string
        return view('activities.create', ['date' => $date]);
    }


    // Store a new activity
    public function store(Request $request)
    {
        $request->validate([
            'tank_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'activity' => 'required|string|max:255',
            'feed_type' => 'required|string|max:255',
            'unit_measurement' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Activity::create([
            'tank_id' => $request->tank_id,
            'employee_id' => $request->employee_id,
            'activity' => $request->activity,
            'feed_type' => $request->feed_type,
            'unit_measurement' => $request->unit_measurement,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return view('activities.show', compact('activity'));
    }

}
