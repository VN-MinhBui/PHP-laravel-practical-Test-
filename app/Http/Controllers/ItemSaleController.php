<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'expired_date' => ['required', 'date'],
        ]);

        ItemSale::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemSale $itemSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
    return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
        'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
        'quantity' => ['required', 'numeric', 'min:0'],
        'expired_date' => ['required', 'date'],
    ]);

    $item = ItemSale::findOrFail($id);
    $item->update($request->all());

    return redirect()->route('items.index')->with('success', 'Item updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $item = ItemSale::findOrFail($id);
    $item->delete();

    return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
