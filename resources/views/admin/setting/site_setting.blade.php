{{--@extends('admin.auth')--}}
@extends('admin.master')
@section('title','Site Setting page')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Admin</a>
            <span class="breadcrumb-item active">WebSite Setting</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Site Setting</h6>

                <form action="{{ route('update-site-setting') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $siteSetting->id }}">
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ $siteSetting->email }}" placeholder="Enter Email">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone One: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone_one" value="{{ $siteSetting->phone_one }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone_two" value="{{ $siteSetting->phone_two }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_name" value="{{ $siteSetting->company_name }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_address" value="{{ $siteSetting->company_address }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="facebook" value="{{ $siteSetting->facebook }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="youtube" value="{{ $siteSetting->youtube }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Instagram: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="instagram" value="{{ $siteSetting->instagram }}" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="twitter" value="{{ $siteSetting->twitter }}" >
                                </div>
                            </div><!-- col-4 -->


                        </div>
                        <br>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection



