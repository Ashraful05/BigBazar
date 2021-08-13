@extends('admin.master')
@section('title','Manage Category Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('add-blog-category')}}">Manage Blog Category</a>
            <span class="breadcrumb-item active">Blog Category Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <div class="modal-body pd-20">
                        <form action="{{ route('update-blog-category',['id'=>$blogCategory->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name English</label>
                                <input type="text" name="category_name_en" value="{{$blogCategory->category_name_en}}" class="form-control" placeholder="Enter Category Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                {{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('category_name_en')?$errors->first('category_name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name Hindi</label>
                                <input type="text" name="category_name_in" value="{{$blogCategory->category_name_in}}" class="form-control" placeholder="Enter Category Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                {{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('category_name_in')?$errors->first('category_name_in') : ''}}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog Category</button>
                        </form>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

