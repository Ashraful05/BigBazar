@extends('admin.master')
@section('title','Manage Admin Role Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <span class="breadcrumb-item active">Admin Table</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Admin List
                    <a href="{{ route('admin-create-user') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive ">
                        <thead>
                        <tr>
                            <th class="wd-10p">Name</th>
                            <th class="wd-12p">Email</th>
                            <th class="wd-12p">Phone</th>
                            <th class="wd-12p">Access</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>
                                    @if($row->category == 1)
                                        <span class="badge badge-danger">Category</span>
                                    @else

                                    @endif
                                    @if($row->coupon == 1)
                                        <span class="badge badge-info">Coupon</span>
                                    @else

                                    @endif
                                    @if($row->product == 1)
                                        <span class="badge badge-warning">Product</span>
                                    @else

                                    @endif
                                    @if($row->blog == 1)
                                        <span class="badge badge-success">Blog</span>
                                    @else

                                    @endif
                                    @if($row->order == 1)
                                        <span class="badge badge-danger">Order</span>
                                    @else

                                    @endif
                                    @if($row->other == 1)
                                        <span class="badge badge-danger">Other</span>
                                    @else

                                    @endif
                                    @if($row->report == 1)
                                        <span class="badge badge-info">Report</span>
                                    @else

                                    @endif
                                    @if($row->role == 1)
                                        <span class="badge badge-info">Role</span>
                                    @else

                                    @endif
                                    @if($row->return == 1)
                                        <span class="badge badge-primary">Return</span>
                                    @else

                                    @endif
                                    @if($row->comment == 1)
                                        <span class="badge badge-warning">Comment</span>
                                    @else

                                    @endif
                                    @if($row->contact == 1)
                                        <span class="badge badge-danger">Contact</span>
                                    @else

                                    @endif
                                    @if($row->setting == 1)
                                        <span class="badge badge-warning">Setting</span>
                                    @else

                                    @endif
                                    @if($row->stock == 1)
                                        <span class="badge badge-warning">Stock</span>
                                    @else

                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('edit-admin',['id'=>$row->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-admin',['id'=>$row->id]) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div>
@endsection
