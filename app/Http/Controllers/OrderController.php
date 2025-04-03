<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.order.index", [
            "orders" => Order::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.order.show', [
            'order' => Order::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.order.edit', [
            'order' => Order::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::updateOrder($request, $id);
        return redirect(route('order.index'))->with('message', 'Order Info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::deleteOrder($id);
        OrderDetail::deleteOrderDetail($id);

        return back()->with('message','Order deleted successfully.');
    }

    public function invoice(string $id)
    {
        $order = Order::find($id);
        return view('admin.order.invoice', [
            'order' => $order,
        ]);
    }

    public function invoiceDownload(string $id)
    {
        // $pdf = Pdf::loadHTML('<h1>Hello</h1>');
        $order = Order::find($id);
        $pdf = Pdf::loadView('admin.order.invoice-download', [
            'order' => $order,
        ]);
        return $pdf->stream();
    }
}
