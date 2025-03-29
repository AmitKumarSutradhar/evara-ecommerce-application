@extends('admin.master')
@section('title' , 'Manage Product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product info</h3>
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
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Code</th>
                                            <th class="border-bottom-0">Category</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Stock Amount</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $products)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $products->name }}</td>
                                                <td>{{ $products->code }}</td>
                                                <td>{{ $products->category->name  }}</td>
                                                <td>
                                                    <img src="{{ $products->image }}" style="width: 60px; height: 40px;" alt="">
                                                </td>
                                                <td>{{ $products->stock_amount  }}</td>
                                                <td>{{ $products->status === 1 ? 'Published' :  'Unpublished' }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('product.show', $products->id) }}" class="btn btn-info btn-sm mx-2">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('product.edit', $products->id) }}" class="btn btn-success btn-sm mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('product.destroy', $products->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-sm">
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
