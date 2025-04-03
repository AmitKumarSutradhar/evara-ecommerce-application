@extends('admin.master')
@section('title' , 'Add User')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add User Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{ session('message') }}</p>
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">User Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" placeholder="User Name" type="text">
                                <span class="text-danger">{{ $errors->has('name') ?  $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">User Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" name="email" placeholder="User Email" type="email">
                                <span class="text-danger">{{ $errors->has('email') ?  $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Mobile</label>
                            <div class="col-md-9">
                                <input class="form-control" id="mobile" name="mobile" placeholder="Mobile" type="number">
                                <span class="text-danger">{{ $errors->has('mobile') ?  $errors->first('mobile') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" name="password" placeholder="Enter a password" type="password">
                                <span class="text-danger">{{ $errors->has('password') ?  $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Role</label>
                            <div class="col-md-9">
                                <select name="role" id="" class="form-control">
                                    <option value="" selected disabled>-- Select Role --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Executive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input id="imgInp" class="form-control" name="image" type="file">
                                <img id="categoryImage"  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio" value="1" name="status" checked><span class="text-13">Published</span></label>
                                <label><input type="radio" value="0" name="status"><span class="text-13">Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
