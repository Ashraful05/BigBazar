@extends('admin.master')
@section('title','Edit SubCategory Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('sub-category')}}">SubCategory</a>
            <span class="breadcrumb-item active">SubCategory Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <div class="modal-body pd-20">
                        <form action="{{ route('update-subcategory',['id'=>$editSubCategory->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                        <?php if(($category->id == $editSubCategory->category_id)) {echo "selected";} ?>
                                        >{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SubCategory Name</label>
                                <input type="text" name="subcategory_name" value="{{$editSubCategory->subcategory_name}}" class="form-control" placeholder="Enter Category Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                {{--                                <input type="hidden" name="category_id" value="{{$category->id}}" class="form-control">--}}
                                <span class="text-center text-danger">{{$errors->has('subcategory_name')?$errors->first('subcategory_name') : ''}}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update SubCategory</button>
                        </form>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection


