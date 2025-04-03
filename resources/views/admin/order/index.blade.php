@extends('admin.master')
@section('title' , 'Manage Order')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Order info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ session('message') }}</p>

                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">SL No.</th>
                                            <th class="border-bottom-0">Order Id</th>
                                            <th class="border-bottom-0">Ordre Total</th>
                                            <th class="border-bottom-0">Order Date</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Customer Info</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->order_total }}</td>
                                                <td>{{ $order->order_date  }}</td>
                                                <td>{{ $order->order_status  }}</td>
                                                <td>{{ isset($order->customer->name) || isset($order->customer->mobile) ? ($order->customer->name.'('. $order->customer->email .')') : '' }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm mx-2" title="View Order Details">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-success btn-sm mx-2 {{ $order->order_status === 'completed' ? ' disabled' : '' }}" title="Order Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-primary btn-sm mx-2" title="View Order Invoice">
                                                        <i class="fa fa-info"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-warning btn-sm mx-2" title="Download Order Invoice">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-success btn-sm mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-sm {{ $order->order_status === 'completed' ? ' disabled' : '' }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
        </div>
    </div>
@endsection
