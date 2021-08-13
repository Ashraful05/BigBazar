{{--@extends('admin.auth')--}}
@extends('admin.master')
@section('title','Edit Product page')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Admin</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Product
                    <a href="{{ route('manage-product') }}" class="btn btn-success btn-sm pull-right">All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Edit Product Form</p>

                <form action="{{route('update-product-without-images',['id'=>$editProduct->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{$editProduct->product_name}}" placeholder="Enter firstname">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code"  value="{{$editProduct->product_code}}" placeholder="Enter lastname">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group" >
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity" value="{{$editProduct->product_quantity}}" placeholder="Enter email address">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group" >
                                    <label class="form-control-label">Product Discount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price" value="{{$editProduct->discount_price}}" placeholder="Enter Product Discount">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                            <?php if($category->id == $editProduct->category_id){echo "selected"; } ?>
                                            >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">SubCategory: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="subcategory_id">
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{$subCategory->id}}"
                                            <?php if($subCategory->id == $editProduct->subcategory_id){echo "selected"; } ?>
                                            >{{$subCategory->subcategory_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                        <option label="----Choose Brand----"></option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" <?php if($brand->id == $editProduct->brand_id){echo "selected"; } ?>
                                            >{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_size" value="{{ $editProduct->product_size }}" id="size" data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_color" value="{{$editProduct->product_color}}" id="color" data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_price" value="{{ $editProduct->product_price }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="product_details" id="summernote" cols="30" rows="10">{{ $editProduct->product_details }}</textarea>
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input type="text" name="video_link" value="{{$editProduct->video_link}}" placeholder="Enter Video Link" class="form-control">
                                </div>
                            </div><!-- col-8 -->

                        </div><!-- row -->
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1"
                                    <?php if($editProduct->main_slider == 1){echo "checked";} ?> >
                                    <span>Main Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1"
                                    <?php if($editProduct->hot_deal == 1){echo "checked";} ?> >
                                    <span>Hot Deal</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1"
                                    <?php if($editProduct->best_rated ==1){echo 'checked'; } ?> >
                                    <span>Best Rated</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1"
                                    <?php if($editProduct->trend==1){echo 'checked'; } ?> >
                                    <span>Trend Product</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1"
                                    <?php if($editProduct->mid_slider==1){echo 'checked'; } ?>  >
                                    <span>Mid Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1"
                                    <?php if($editProduct->buyone_getone==1){echo 'checked'; } ?>  >
                                    <span>BuyOne GetOne</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1"
                                    <?php if($editProduct->hot_new==1){echo 'checked'; } ?>>
                                    <span>Hot New</span>
                                </label>
                            </div>

                        </div>
                        <br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Update Product</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div>
        <!-- sl-pagebody -->
        <!-- sl-mainpanel -->
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Images</h6>
                <form action="{{ route('update-product-with-images',['id'=>$editProduct->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image One(Main Thumbnail): <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">
                                    <input type="file" id="file" name="image_one" class="custom-file-input" onchange="readURL1(this);" >
                                    <span class="custom-file-control"></span>
                                    <input type="hidden" name="old_one" value="{{$editProduct->image_one}}">
                                    <img src="#" id="one" alt="">
                                </label>
                            </div>
                        </div>
                        <!-- col-8 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ url($editProduct->image_one) }}" style="height: 90px; width: 90px;" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">
                                    <input type="file" id="file" name="image_two" class="custom-file-input" onchange="readURL2(this);" >
                                    <span class="custom-file-control"></span>
                                    <input type="hidden" name="old_two" value="{{ $editProduct->image_two }}">
                                    <img src="#" id="two" alt="">
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ URL::to($editProduct->image_two) }}" style="height: 90px; width: 90px;" alt="">
                        </div><!-- col-8 -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group mg-b-10-force" >
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">
                                    <input type="file" id="file" name="image_three" class="custom-file-input" onchange="readURL3(this);" >
                                    <span class="custom-file-control"></span>
                                    <input type="hidden" name="old_three" value="{{ $editProduct->image_three }}">
                                    <img src="#" id="three" alt="">
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ url($editProduct->image_three) }}" style="height: 90px; width: 90px;" alt="">
                        </div><!-- col-8 -->
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning">Update Image</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->
    <script type="text/javascript">
        {{--        $(document).ready(function(){--}}
        {{--            $('select[name="category_id"]').on('change',function(){--}}
        {{--                alert(category_id);--}}
        {{--                var category_id = $(this).val();--}}
        {{--                if (category_id) {--}}
        {{--                    $.ajax({--}}
        {{--                        url: "{{ url('http://localhost/BigBazar/get/subcategory/') }}/"+category_id,--}}
        {{--//                         url:'http://localhost/BigBazar/admin/add-product/get/subcategory/'+category_id,--}}
        {{--                        type:"GET",--}}
        {{--                        dataType:"json",--}}
        {{--                        success:function(data) {--}}
        {{--                            var d =$('select[name="subcategory_id"]').empty();--}}
        {{--                            $.each(data, function(key, value){--}}
        {{--                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');--}}
        {{--                            });--}}
        {{--                        },--}}
        {{--                    });--}}

        {{--                }else{--}}
        {{--                    alert('danger');--}}
        {{--                }--}}

        {{--            });--}}
        {{--        });--}}
        $(document).ready(function() {
            let selectBox = document.querySelector('select[name="category_id"]');
            selectBox.onchange= function(e) {
                var category_id = e.target.value;
                if (category_id) {
                    $.ajax({
                        url:"http://localhost/BigBazar/get/subcategory/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(`<option value="${value.id}">${value.subcategory_name}</option>`);
                            });
                        },
                    });

                } else {
                    alert('danger');
                }
            }
        });
    </script>


    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection


