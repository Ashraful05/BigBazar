{{--@extends('admin.auth')--}}
@extends('admin.master')
@section('title','Add Product page')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Admin</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Product</h6>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_code }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group" >
                                <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_quantity }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->category_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">SubCategory: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->subcategory_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->brand_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_size }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_color }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                <strong>{{ $products->product_price }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                {!! $products->product_details !!}
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                <p><strong>{{ $products->video_link }}</strong></p>
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image One(Main Thumbnail): <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <img src="{{ URL::to($products->image_one) }}" style="height: 80px; width: 80px;" alt="">
                                </label>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <img src="{{ URL::to($products->image_two) }}" style="height: 80px; width: 80px;" alt="">
                                </label>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <img src="{{ URL::to($products->image_three) }}" style="height: 80px; width: 80px;" alt="">
                                </label>
                            </div>
                        </div><!-- col-8 -->
                    </div><!-- row -->
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->main_slider == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Main Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->hot_deal == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Hot Deal</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->best_rated == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Best Rated</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->trend == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Trend Product</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->mid_slider == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Mid Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="">
                                @if($products->hot_new == 1)
                                    <span class="badge-success">Active</span>
                                @else
                                    <span class="badge-danger">InActive</span>
                                @endif
                                <span>Hot New</span>
                            </label>
                        </div>

                    </div>
                    <br>
                    <!-- form-layout-footer -->
                </div><!-- form-layout -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection


