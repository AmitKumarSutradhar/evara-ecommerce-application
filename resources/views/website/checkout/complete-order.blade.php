@extends('website.master')
@section('title', 'Complete Order')

@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index-2.html" rel="nofollow">Home</a>
                <span></span> Checkout
                <span></span> Complete Order
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-25 text-center">
                        <h4 class="text-success">{{ session('message') ? session('message') : "No order found :)" }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection