@extends('admin.master')
@section('title','Manage Product Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('manage-product')}}">Product</a>
            <span class="breadcrumb-item active">Product Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List
                    <a href="{{ route('add-product') }}" class="btn btn-sm btn-warning" style="float: right;" >Add New Product</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table table-responsive-sm
                     table-hover table-active table-bordered">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Product Image</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Product Quantity</th>
                            <th class="wd-15p">Product Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img src="{{ URL::to($product->image_one) }}" style="height: 50px; width: 50px;" alt="">
                                </td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete-product',['id'=>$product->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
                                    <a href="{{ route('view-product',['id'=>$product->id]) }}" class="btn btn-sm btn-warning" title="show"><i class="fa fa-eye"></i></a>
                                    @if($product->status == 1)
                                        <a href="{{ route('inactive-product',['id'=>$product->id]) }}" class="btn btn-sm btn-info" title="Active"><i class="fa fa-thumbs-up"></i></a>
                                    @else
                                        <a href="{{ route('active-product',['id'=>$product->id]) }}" class="btn btn-sm btn-danger" title="InActive"><i class="fa fa-thumbs-down"></i></a>
                                    @endif
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

@endsection

