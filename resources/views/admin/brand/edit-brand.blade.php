@extends('admin.master')
@section('title','Edit Brand Page')

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
                <div class="table-wrapper">
                    <div class="modal-body pd-20">
                        <form action="{{ route('update-brand',['id'=>$brand->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control" placeholder="Enter Category Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                {{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('category_name')?$errors->first('category_name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Logo</label>
                                <input type="file" name="brand_logo" value="{{$brand->brand_logo}}" class="form-control">
                                {{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('brand_logo')?$errors->first('brand_logo') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Brand Logo</label>
                                <img src="{{ URL::to($brand->brand_logo) }}" style="height: 70px; width: 80px;" alt="">
                                <input type="hidden" name="old_logo" value="{{$brand->brand_logo}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

