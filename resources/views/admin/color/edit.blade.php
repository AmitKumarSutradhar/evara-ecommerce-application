@extends('admin.master')
@section('title' , 'Edit Color')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Color Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ session('message') }}</p>
                    <form action="{{ route('color.update',$color->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" value="{{ $color->name }}" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Color Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="code" value="{{ $color->code }}" type="color">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Color Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="" placeholder="Enter your description">{{ $color->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio" value="1" name="status"  {{ $color->status === 1 ? 'checked' : '' }}><span class="text-13">Published</span></label>
                                <label><input type="radio" value="0" name="status" {{ $color->status === 0 ? 'checked' : '' }}><span class="text-13">Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Color Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
