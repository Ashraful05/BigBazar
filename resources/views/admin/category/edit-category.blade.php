@extends('admin.master')
@section('title','Manage Category Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('manage-category')}}">Category</a>
            <span class="breadcrumb-item active">Category Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <div class="modal-body pd-20">
                        <form action="{{ route('update-category',['id'=>$category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Enter Category Name" id="exampleInputEmail1" aria-describedby="emailHelp">
{{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('category_name')?$errors->first('category_name') : ''}}</span>
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

