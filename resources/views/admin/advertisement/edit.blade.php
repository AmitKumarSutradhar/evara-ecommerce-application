@extends('admin.master')
@section('title', 'Add Advertisement')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Advertisement Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Advertisement</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Advertisement</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Advertisement Edit Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{ session('message') }}</p>
                    <form action="{{ route('advertisement.update',$advertisement->id) }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @method("PUT")
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="product_id" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" @selected($product->id == $advertisement->product_id)>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Advertisement Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="title" value="{{ $advertisement->title }}"
                                    type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sub_title" class="col-md-3 form-label">Sub Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="sub_title" name="sub_title" value="{{ $advertisement->sub_title }}"
                                    type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="position" class="col-md-3 form-label">Position</label>
                            <div class="col-md-9">
                                <input class="form-control" id="position" name="position" value="{{ $advertisement->position }}"
                                    type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="offer_price" class="col-md-3 form-label">Offer Price</label>
                            <div class="col-md-9">
                                <input class="form-control" id="offer_price" name="offer_price"  value="{{ $advertisement->offer_price }}"
                                    type="number">
                                <span
                                    class="text-danger">{{ $errors->has('offer_price') ? $errors->first('offer_price') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="discount" name="discount" value="{{ $advertisement->discount }}"
                                    type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input id="imgInp" class="form-control" name="image" type="file">
                                <img src="{{ asset($advertisement->image) }}" id="categoryImage" class="mt-5"  height="250px"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label>
                                    <input type="radio" value="1" name="status" @checked( $advertisement->status == 1 )>
                                    <span class="text-13">Published</span>
                                </label>
                                <label>
                                    <input type="radio" value="0" name="status"  @checked( $advertisement->status == 0 )>
                                    <span class="text-13">Unpublished</span>
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Advertisement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
