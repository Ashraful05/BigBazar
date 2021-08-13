{{--@extends('layouts.auth')--}}
@extends('frontend.master')

@section('content')
    @php
        $order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','desc')->limit(10)->get();
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi there, regular user

                        <br>
                        <div class="row">
                            <div class="col-8">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Payment ID</th>
                                        <th scope="col">Amount </th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Status Code</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $row)
                                    <tr>
                                        <td scope="col">{{ $row->payment_type }}</td>
                                        <td scope="col">{{ $row->payment_id }}</td>
                                        <td scope="col">Tk. {{ $row->total }}</td>
                                        <td scope="col">{{ $row->date }}</td>
                                        <td scope="col">
                                            @if($row->status==0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($row->status==1)
                                                <span class="badge badge-info">Payment Accepted</span>
                                            @elseif($row->status==2)
                                                <span class="badge ">Progress</span>
                                            @elseif($row->status==3)
                                                <span class="badge badge-success">Delivered</span>
                                            @else
                                                <span class="badge badge-danger">Cancel</span>
                                            @endif
                                        </td>
                                        <td scope="col">{{ $row->status_code }}</td>
                                        <td scope="col">
                                            <a href="" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <img src="{{asset('public')}}/frontend/images/kaziariyan.png" class="card-img-top" style="height: 100px; width: 100px;" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="{{ route('password.change') }}">Change Password</a></li>
                                        <li class="list-group-item">Edit Profile</li>
                                        <li class="list-group-item"><a href="{{ route('success-list') }}">Return Order</a></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">LogOut</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
