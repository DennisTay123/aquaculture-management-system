<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Inventory;

class ActivityController extends Controller
{
    // Display the calendar with activities
    public function index()
    {
        return view('activity.index');
    }

    // Fetch events for FullCalendar
    public function getEvents(Request $request)
    {
        $events = Activity::select('id', 'activity as title', 'start_date as start', 'end_date as end')->get();
        return response()->json($events);
    }

    // Show the form to create a new activity
    public function create(Request $request)
    {
        $date = $request->input('date'); // Retrieve the date from the query string

        // Fetch all feed types from the Inventory where category is 'feed'
        $feedTypes = Inventory::where('category', 'feed')->pluck('name', 'id');

        return view('activity.create', [
            'date' => $date,
            'feedTypes' => $feedTypes,
        ]);
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

        Activity::create($request->all());

        return redirect()->route('activity.index')->with('success', 'Activity created successfully.');
    }


    // Show a specific activity
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.show', compact('activity'));
    }

    // Update an existing activity
    public function update(Request $request, $id)
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

        $activity = Activity::findOrFail($id);
        $activity->update($request->all());

        return redirect()->route('activity.show', $activity->id)->with('success', 'Activity updated successfully.');
    }

}
