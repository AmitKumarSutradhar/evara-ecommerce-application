@extends('admin.master')
@section('title' , 'Manage Sub Category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Sub Category info</h3>
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
                                            <th class="border-bottom-0">Category Name</th>
                                            <th class="border-bottom-0">Sub Category Name</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sub_categories as $sub_category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sub_category->category->name }}</td>
                                                <td>{{ $sub_category->name  }}</td>
                                                <td>
                                                    <img src="{{ $sub_category->image }}" style="width: 06px; height: 40px;" alt="">
                                                </td>
                                                <td>{{ $sub_category->status === 1 ? 'Published' :  'Unpublished' }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('sub-category.edit', $sub_category->id) }}" class="btn btn-success btn-sm mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('sub-category.destroy', $sub_category->id) }}" method="POST">
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
