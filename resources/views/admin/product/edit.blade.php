@extends('admin.master')
@section('title', 'Edit Product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{ session('message') }}</p>
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select onchange="selectSubCategory(this.value)" class="form-control" name="category_id"
                                    required>
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sub_category_id" id="sub-category" required>
                                    <option value="" disabled selected>-- Select Category First --</option>
                                    {{-- @foreach ($subCategories as $subCategories)
                                        <option value="{{ $subCategories->id }}">{{ $subCategories->name }}</option>
                                    @endforeach --}}
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('sub_category_id') ? $errors->first('sub_category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="brand_id" required>
                                    <option value="" disabled selected>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="unit_id" required>
                                    <option value="" disabled selected>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9 form-group">
                                <select multiple class="form-control select2-show-search" name="colors[]"
                                    data-placeholder="Choose Color">
                                    <option label="Choose Color"></option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('color_id') ? $errors->first('colors') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Size Name</label>
                            <div class="col-md-9 form-group">
                                <select multiple class="form-control select2-show-search" name="sizes[]"
                                    data-placeholder="Choose Size" required>
                                    <option label="Choose Size"></option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('size_id') ? $errors->first('size_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" value="{{ $product->name }}" placeholder="Product Name"
                                    type="text">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="code" value="{{ $product->code }}" placeholder="Product Code"
                                    type="text">
                                <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="" placeholder="Enter your description">{{ $product->short_description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="longDescription" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" name="long_description" placeholder="Enter your description">{{ $product->long_description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                {{-- <input id="imgInp" class="form-control" name="image" type="file"> --}}
                                <input type="file" name="image" class="dropify"
                                    accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                                    data-height="200" />
                                {{-- <img id="categoryImage" /> --}}
                                <img id="categoryImage" src="{{ asset($product->image) }}" width="100" height="100" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Other Images</label>
                            <div class="col-md-9">
                                <input type="file" name="other_images[]" class="form-control"
                                    accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                                    multiple />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" id="" class="form-control" name="regular_price"
                                    value="{{ $product->regular_price }}" placeholder="Regular Price">
                                    <input type="number" id="" class="form-control" name="selling_price"
                                        value="{{ $product->selling_price }}" placeholder="Selling Price">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input type="number" id="" class="form-control" value="{{ $product->stock_amount }}" name="stock_amount"
                                    placeholder="Stock Amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio" value="1" name="status" {{ $product->status == 1 ? 'checked' : '' }}><span
                                        class="text-13">Published</span></label>
                                <label><input type="radio" value="0" name="status" {{ $product->status == 0 ? 'checked' : '' }}><span
                                        class="text-13">Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
