@extends('admin.master')
@section('title','All Message Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin-home')}}">Home</a>
            <span class="breadcrumb-item active">All Message Page</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-5 pd-sm-5">
                <h6 class="card-body-title">All Message
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table table-responsive">
                        <thead>
                        <tr>
                            <th class="wd-10p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-20p">Message</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($message as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email}}</td>
                                <td>{{ $row->phone }} </td>
                                <td>{{ $row->message }} </td>
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



