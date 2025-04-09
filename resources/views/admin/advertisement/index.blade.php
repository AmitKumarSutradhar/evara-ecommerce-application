@extends('admin.master')
@section('title' , 'Manage Advertisement')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Advertisement Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Advertisement</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Advertisement</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Advertisements</h3>
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
                                            <th class="border-bottom-0">Sl No.</th>
                                            <th class="border-bottom-0">Product Info</th>
                                            <th class="border-bottom-0">Title</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($advertisements as $advertisement)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $advertisement->product->name }}</td>
                                                <td>{{ $advertisement->title  }}</td>
                                                <td>
                                                    <img src="{{ asset('/').$advertisement->image ? asset('/').$advertisement->image : asset('/uploads/images/no-image.jpg') }}" style="width: 50px; height: 50px;" alt="">
                                                </td>
                                                <td>{{ $advertisement->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('advertisement.edit', $advertisement->id) }}" class="btn btn-success btn-sm mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('advertisement.destroy', $advertisement->id) }}" method="POST">
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
