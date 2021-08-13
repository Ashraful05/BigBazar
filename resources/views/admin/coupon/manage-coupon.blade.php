@extends('admin.master')
@section('title','Manage Coupon Page')

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
                <h6 class="card-body-title">Coupon List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New Coupon</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Category ID</th>
                            <th class="wd-15p">Category Code</th>
                            <th class="wd-15p">Category Percentage</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $key => $coupon)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td>{{$coupon->coupon}}</td>
                                <td>{{$coupon->discount}} %</td>
                                <td>
                                    <a href="{{ route('edit-coupon',['id'=>$coupon->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-coupon',['id'=>$coupon->id]) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- Add Category -->
    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="{{ route('save-coupon') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" name="coupon" class="form-control" placeholder="Enter Coupon Code" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-center text-danger">{{$errors->has('coupon')?$errors->first('coupon') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount (%)</label>
                            <input type="text" name="discount" class="form-control" placeholder="Enter Discount" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-center text-danger">{{$errors->has('discount')?$errors->first('discount') : ''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection

