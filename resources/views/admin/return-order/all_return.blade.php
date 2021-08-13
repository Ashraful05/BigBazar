@extends('admin.master')
@section('title','Manage Order Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <span class="breadcrumb-item active">Return Order</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-5 pd-sm-5">
                <h6 class="card-body-title">Return Order History List
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table table-responsive">
                        <thead>
                        <tr>
                            <th class="wd-10p">Payment Type</th>
                            <th class="wd-10p">Transaction Id</th>
                            <th class="wd-15p">SubTotal</th>
                            <th class="wd-20p">Shipping</th>
                            <th class="wd-10p">Total Amount</th>
                            <th class="wd-20p">Date</th>
                            <th class="wd-10p">Return</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as  $row)
                            <tr>
                                <td>{{ $row->payment_type }}</td>
                                <td>{{ $row->balance_transaction}}</td>
                                <td>{{ $row->subtotal }} </td>
                                <td>{{ $row->shipping }} </td>
                                <td>{{ $row->total }} </td>
                                <td>{{ $row->date }} </td>
                                <td>
                                    @if($row->return_order==1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($row->return_order==2)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-success">Success</span>
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

@endsection



