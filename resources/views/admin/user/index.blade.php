@extends('admin.master')
@section('title' , 'Manage Sub Category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All User info</h3>
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
                                            <th class="border-bottom-0">User Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Role</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ isset($user->name) ? $user->name  : "" }}</td>
                                                <td>{{ $user->email  }}</td>
                                                <td>
                                                    <img src="{{ asset('/').$user->profile_photo_path ? asset('/').$user->profile_photo_path : asset('/uploads/images/no-image.jpg') }}" style="width: 40px; height: 40px;" alt="">
                                                </td>
                                                <td>{{ $user->role == 1 ? 'Admin' : ($user->role == 2 ? 'Manager' : ($user->role == 3 ? 'Executive' : 'Unknown')) }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
