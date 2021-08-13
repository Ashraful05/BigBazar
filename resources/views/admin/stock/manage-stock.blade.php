@extends('admin.master')
@section('title','Manage Stock Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <span class="breadcrumb-item active">Stock Product Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Stock Product List</h6>
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

