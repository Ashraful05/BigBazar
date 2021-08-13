@extends('admin.master')
@section('title','Daily Report Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <span class="breadcrumb-item active">This Date Report</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-5 pd-sm-5">
                <h6 class="card-body-title">
                    <span class="badge badge-success"><h4>This Date Total: {{ $total }}</h4></span>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table table-responsive">
                        <thead>
                        <tr>
                            <th class="wd-15p">Payment Type</th>
                            <th class="wd-15p">Transaction Id</th>
                            <th class="wd-15p">SubTotal</th>
                            <th class="wd-15p">Shipping</th>
                            <th class="wd-10p">Total Amount</th>
                            <th class="wd-10p">Date</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $key => $row)
                            <tr>
                                <td>{{ $row->payment_type }}</td>
                                <td>{{ $row->balance_transaction}}</td>
                                <td>{{ $row->subtotal }} </td>
                                <td>{{ $row->shipping }} </td>
                                <td>{{ $row->total }} </td>
                                <td>{{ $row->date }} </td>
                                <td>
                                    @if($row->status==0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($row->status==1)
                                        <span class="badge badge-info">Payment Accepted</span>
                                    @elseif($row->status==2)
                                        <span class="badge badge-light">Progress</span>
                                    @elseif($row->status==3)
                                        <span class="badge badge-success">Delivered</span>
                                    @else
                                        <span class="badge badge-danger">Cancel</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('view-order',['id'=>$row->id]) }}" class="btn btn-sm btn-info">View</a>
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




