<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate total feed stock from inventory
        $totalFeed = Inventory::where('category', 'feed')->sum('quantity');

        // Calculate total feed used in activities
        $totalFeedUsed = Activity::where('activity', 'Feeding')->sum('quantity');

        // Remaining feed stock
        $remainingFeed = $totalFeed - $totalFeedUsed;

        return view('dashboard.index', compact('remainingFeed'));
    }
}
