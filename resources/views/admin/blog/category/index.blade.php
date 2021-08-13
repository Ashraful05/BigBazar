@extends('admin.master')
@section('title','Manage Blog Category Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('add-blog-category')}}">Blog Category</a>
            <span class="breadcrumb-item active">Blog Category Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog Category List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New Blog Category</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"> ID</th>
                            <th class="wd-15p">Category English</th>
                            <th class="wd-15p">Category Hindi</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogCategories as $key => $blogCategory)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td>{{$blogCategory->category_name_en}}</td>
                                <td>{{$blogCategory->category_name_in}}</td>
                                <td>
                                    <a href="{{ route('edit-blog-category',['id'=>$blogCategory->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-blog-category',['id'=>$blogCategory->id]) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                    <form action="{{ route('save-blog-category') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name English</label>
                            <input type="text" name="category_name_en" class="form-control" placeholder="Enter Category Name English" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-center text-danger">{{$errors->has('category_name_en')?$errors->first('category_name_en') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name Hindi</label>
                            <input type="text" name="category_name_in" class="form-control" placeholder="Enter Category Name Hindi" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-center text-danger">{{$errors->has('category_name_in')?$errors->first('category_name_in') : ''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection
