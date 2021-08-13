@extends('admin.master')
@section('title','Manage Category Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('manage-coupon')}}">Coupon</a>
            <span class="breadcrumb-item active">Coupon Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <div class="modal-body pd-20">
                        <form action="{{ route('update-coupon',['id'=>$coupon->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Code</label>
                                <input type="text" name="coupon" value="{{$coupon->coupon}}" class="form-control" placeholder="Enter Coupon Code" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <input type="hidden" name="coupon_id" value="{{$coupon->id}}" class="form-control">
                                <span class="text-center text-danger">{{$errors->has('coupon')?$errors->first('coupon') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Discount (%)</label>
                                <input type="text" name="discount" value="{{ $coupon->discount }}" class="form-control" placeholder="Enter Discount" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-center text-danger">{{$errors->has('discount')?$errors->first('discount') : ''}}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection


