<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Inventory $model)
    {
        $inventories = $model->paginate(15);
        return view('inventory.index', compact('inventories'));
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
        return view('inventory.show', compact('inventory'));
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

        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }
}
