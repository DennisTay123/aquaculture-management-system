<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('item_code', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('vendor_id')) {
            $query->where('vendor_id', $request->vendor_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $inventories = $query->paginate(10);

        $brands = Inventory::select('brand')->distinct()->pluck('brand');
        $categories = Inventory::select('category')->distinct()->pluck('category');
        $vendors = Vendor::all();

        return view('inventory.index', compact('inventories', 'brands', 'categories', 'vendors'));
    }


    public function create()
    {
        $vendors = Vendor::all();
        return view('inventory.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'um' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'brand' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully.');
    }

    public function show(Inventory $inventory)
    {
        $vendors = Vendor::all();
        return view('inventory.show', compact('inventory', 'vendors'));
    }

    public function edit(Inventory $inventory)
    {
        $vendors = Vendor::all();
        return view('inventory.edit', compact('inventory', 'vendors'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'item_code' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'um' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'brand' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventories.show', $inventory->id)
            ->with('success', 'Inventory updated successfully');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }
}
