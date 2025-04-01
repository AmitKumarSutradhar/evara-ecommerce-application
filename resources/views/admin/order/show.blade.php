@extends('admin.master')
@section('title', 'Order Details')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Details Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order Id</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{$order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Tax Toal</th>
                            <td>{{ $order->tax_total }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Total</th>
                            <td>{{ $order->shipping_total }}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{ isset($order->customer->name) ? $order->customer->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{ $order->delivery_address }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>{{ $order->delivery_status }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $order->payment_method }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $order->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>Product Amount</th>
                            <td>{{ $order->payment_amount }}</td>
                        </tr>
                        <tr>
                            <th>Product Date</th>
                            <td>{{ $order->payment_date }}</td>
                        </tr>
                        <tr>
                            <th>Currrency</th>
                            <td>{{ $order->currency }}</td>
                        </tr>
                        <tr>
                            <th>Transactio Id</th>
                            <td{{ $order->transaction_id }}</td>
                        </tr>
                    </table>

                    <hr>
                    <h4>Order Item Info</h4>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $item)
                                <tr>
                                    <td>{{  $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_price }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->product_price * $item->product_qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection