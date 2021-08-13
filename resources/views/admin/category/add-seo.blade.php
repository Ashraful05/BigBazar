@extends('admin.master')

@section('title','Add SEO Page')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Admin</a>
            <span class="breadcrumb-item active">SEO Setting</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">SEO Setting</h6>
                <p class="mg-b-20 mg-sm-b-30">Add New SEO Info</p>

                <form action="{{route('update-seo',['id'=>$seo->id])}}" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $seo->id }}">
                                    <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_title" value="{{ $seo->meta_title }}" placeholder="Enter meta title">
                                    <span class="text-danger">{{ $errors->has('meta_title')?$errors->first('meta_title'):'' }}</span>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_author" value="{{ $seo->meta_author }}" placeholder="Enter Meta Author">
                                    <span class="text-danger">{{ $errors->has('meta_author')?$errors->first('meta_author'):'' }}</span>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_tag" value="{{$seo->meta_tag}}" placeholder="Enter Meta Author">
                                    <span class="text-danger">{{ $errors->has('meta_tag')?$errors->first('meta_tag'):'' }}</span>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control"  name="meta_description" cols="30" rows="10">
                                        {{ $seo->meta_description }}
                                    </textarea>
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="google_analytic"  cols="30" rows="10">
                                        {{ $seo->google_analytic }}
                                    </textarea>
                                </div>
                            </div><!-- col-8 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force" >
                                    <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="bing_analytic"  cols="30" rows="10">
                                        {{ $seo->bing_analytic }}
                                    </textarea>
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
@endsection
