<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesOrderRequest;
use App\Models\Item;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales_orders = SalesOrder::latest()->get();
        return view('sales-orders.index', compact('sales_orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::latest()->get();
        return view('sales-orders.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesOrderRequest $request)
    {
        DB::transaction(function () use ($request) {
            $sales_order = SalesOrder::create();
            $selected_items = collect($request->items);

            $sales_order->items()->attach($selected_items->map(
                fn ($item) => ['item_id' => $item['id'], 'quantity' => $item['quantity']]
            ));
        });

        return response()->json(['message' => 'Sales order created successfully.', 'url' => route('sales-orders.index')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesOrder $sales_order)
    {
        $items = Item::latest()->get();
        return view('sales-orders.edit', compact('items', 'sales_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesOrderRequest $request, SalesOrder $sales_order)
    {
        DB::transaction(function () use ($request, $sales_order) {
            $sales_order->items()->detach();
            $selected_items = collect($request->items);

            $sales_order->items()->attach($selected_items->map(
                fn ($item) => ['item_id' => $item['id'], 'quantity' => $item['quantity']]
            ));
        });

        return response()->json(['message' => 'Sales order updated successfully.', 'url' => route('sales-orders.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesOrder $sales_order)
    {
        $sales_order->delete();
        session()->flash('success', 'Sales order deleted successfully.');
        return redirect()->back();
    }
}
