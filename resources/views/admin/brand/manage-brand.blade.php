@extends('admin.master')
@section('title','Manage Brand Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('manage-brand')}}">Brand</a>
            <span class="breadcrumb-item active">Brand Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New Brand</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Brand Logo</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $key => $brand)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>
                                    <img src="{{ URL::to($brand->brand_logo) }}" style="height: 70px; width: 80px;" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('edit-brand',['id'=>$brand->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-brand',['id'=>$brand->id]) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                    <form action="{{ route('save-brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" placeholder="Enter Brand Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-center text-danger">{{$errors->has('brand_name')?$errors->first('brand_name') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Logo</label>
                            <input type="file" name="brand_logo" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection
