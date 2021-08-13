{{--@extends('admin.auth')--}}
@extends('admin.master')
@section('title','Add Blog Post page')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Admin</a>
            <span class="breadcrumb-item active">Blog Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Blog
                    <a href="{{ route('manage-blog-post') }}" class="btn btn-success btn-sm pull-right">Manage Blog Post</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Add New Blog Form</p>

                <form action="{{route('save-blog-post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title(English): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_en" value="" placeholder="Enter post title in english">
                                    <span class="text-danger">{{ $errors->has('post_title_en')?$errors->first('post_title_en'):'' }}</span>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title(Hindi): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_in" value="" placeholder="Enter post title in hindi">
                                    <span class="text-danger">{{ $errors->has('post_title_in')?$errors->first('post_title_in'):'' }}</span>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($blogCategories as $blogCategory)
                                            <option value="{{$blogCategory->id}}">{{$blogCategory->category_name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Product Details (English): <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="details_en" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Product Details (Hindi): <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="details_in" id="summernote1" cols="30" rows="10"></textarea>
                                </div>
                            </div><!-- col-8 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" name="post_image" class="custom-file-input" onchange="readURL1(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="one" alt="">
                                    </label>
                                </div>
                            </div><!-- col-8 -->
                        </div><!-- row -->

                    </div>
                    <br>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>

                    </div>
                </form><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
    <!-- sl-mainpanel -->
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


