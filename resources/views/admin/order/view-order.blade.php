@extends('admin.master')
@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-5 pd-sm-5">
                <h6 class="card-body-title">Order Details List</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong>Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>{{$order->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <th>{{$order->phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Type</th>
                                        <th>{{$order->payment_type}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Id</th>
                                        <th>{{$order->payment_id}}</th>
                                    </tr>
                                    <tr>
                                        <th>Total Amount</th>
                                        <th>Tk. {{$order->total}}</th>
                                    </tr>
                                    <tr>
                                        <th>Month</th>
                                        <th>{{$order->month}}</th>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <th>{{$order->date}}</th>
                                    </tr>
                                    <tr>
                                        <th>Year</th>
                                        <th>{{$order->year}}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Shipping</strong>Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>{{$shipping->shipping_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <th>{{$shipping->shipping_phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>{{$shipping->shipping_email}}</th>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <th>{{$shipping->shipping_address}}</th>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <th>{{$shipping->shipping_city}}</th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            @if($order->status==0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($order->status==1)
                                                <span class="badge badge-info">Payment Accepted</span>
                                            @elseif($order->status==2)
                                                <span class="badge ">Progress</span>
                                            @elseif($order->status==3)
                                                <span class="badge badge-success">Delivered</span>
                                            @else
                                                <span class="badge badge-danger">Cancel</span>
                                            @endif
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card pd-20 pd-sm-40 col-lg-12">
                        <h6 class="card-body-title">Product Details</h6>
                        <div class="table-wrapper">
                            <table id="" class="table table-responsive-sm
                     table-hover table-active table-bordered">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Product Code</th>
                                    <th class="wd-15p">Product Name</th>
                                    <th class="wd-15p">Image</th>
                                    <th class="wd-15p">Color</th>
                                    <th class="wd-15p">Size</th>
                                    <th class="wd-15p">Quantity</th>
                                    <th class="wd-15p">Unit Price</th>
                                    <th class="wd-20p">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $key => $detail)
                                    <tr>
                                        <td>{{ $detail->product_code }}</td>
                                        <td>{{ $detail->product_name }}</td>
                                        <td>
                                            <img src="{{ URL::to($detail->image_one) }}" style="height: 50px; width: 50px;" alt="">
                                        </td>
                                        <td>{{$detail->color}}</td>
                                        <td>{{$detail->size}}</td>
                                        <td>{{$detail->quantity}}</td>
                                        <td>{{$detail->single_price}}</td>
                                        <td>{{$detail->total_price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                @if($order->status == 0)
                    <a href="{{ url('order/accept',['id'=>$order->id]) }}" class="btn btn-info">Payment Accept</a><br>or
                    <br>
                    <a href="{{ url('order/cancel',['id'=>$order->id]) }}" class="btn btn-danger">Order Cancel</a>

                @elseif($order->status == 1)
                    <a href="{{ url('delivery/process',['id'=>$order->id]) }}" class="btn btn-info">Process Delivery</a><br>
                @elseif($order->status == 2)
                    <a href="{{ url('delivery/done',['id'=>$order->id]) }}" class="btn btn-success">Delivery Done</a><br>
                    @elseif($order->status == 4)
                    <strong class="text-danger text-center">This Product is Cancelled.</strong>
                @else
                    <strong class="text-success text-center">This Product is successfully delivered.</strong>

                @endif

            </div>
        </div>
    </div>
@endsection
