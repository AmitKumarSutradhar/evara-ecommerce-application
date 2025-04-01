@extends('admin.master')
@section('title', 'Edit Order')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Order Form</h3>  
                </div>
                <div class="card-body">
                    <p class="text-success">{{ session('message') }}</p>
                    <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @method("PUT")
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Customer Info</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" value="{{ $order->customer->name }}"
                                    placeholder="Product Name" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Order Total</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="order_total" value="{{ $order->order_total }}"
                                    placeholder="Product Code" type="text">
                                {{-- <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span> --}}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Payment Method</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="payment_method" value="{{ $order->payment_method }}"
                                    placeholder="Product Code" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Select Courier</label>
                            <div class="col-md-9">
                                <select class="form-control" name="courier_id" required>
                                    <option value="" disabled {{ $order->courier_id === 0 ? 'selected' : '' }}>-- Select Courier --</option>
                                    <option value="1" {{ $order->courier_id === 1 ? 'selected' : '' }}>Pathao</option>
                                    <option value="2" {{ $order->courier_id === 2 ? 'selected' : '' }}>SA Poribahan</option>
                                    <option value="3" {{ $order->courier_id === 3 ? 'selected' : '' }}>Sondarban</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Delivery Address</label>
                            <div class="col-md-9 pt-3">
                                <textarea class="form-control" name="delivery_address" id="">{{ $order->delivery_address }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Order Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="order_status" required>
                                    <option value="" disabled selected>-- Select Status --</option>
                                    <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->order_status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancel" {{ $order->order_status === 'cancel' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Order Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
