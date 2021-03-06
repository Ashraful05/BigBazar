@extends('frontend.master')
@section('content')
    @include('frontend.includes.menubar')
    @php
        $setting = DB::table('=settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;

    @endphp




    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/cart_responsive.css">
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">CheckOut Page</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image text-center"><br><img src="{{asset($row->options->image)}}" style="width: 70px;height: 70px;" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            @if($row->options->color)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">{{$row->options->color}}</div>
                                                </div>
                                            @endif

                                            @if($row->options->size == Null)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{$row->options->size}}</div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <br>
                                                <form action="{{ route('update-cart-item') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$row->rowId}}">
                                                    <input type="number" name="qty" value="{{$row->qty}}" style="width: 60px;">
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i></button>
                                                </form>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{$row->qty * $row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Actions </div>
                                                <br>
                                                <a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total_content" style="padding: 15px;">
                            @if (Session::has('coupon'))

                            @else
                                <h5 style="margin-left: 20px;">Apply Coupon</h5>
                                <form action="{{ route('apply-coupon') }}" method="post">
                                    @csrf
                                    <div class="form-group col-lg-4">
                                        <input type="text" name="coupon" class="form-control" required placeholder="Enter your coupon">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-danger ml-2">Submit</button>
                                </form>

                            @endif
                        </div>
                        <ul class="list-group col-lg-4" style="float:right;">
                            @if(Session::has('coupon'))
                                <li class="list-group-item">SubTotal: <span style="float: right;">Tk. {{Session::get('coupon')['balance']}}</span></li>
                                <li class="list-group-item">Coupons: ({{ Session::get('coupon')['name'] }})
                                    <a href="{{ route('coupon-remove') }}" class="bt btn-danger btn-sm">X</a>
                                    <span style="float: right;">Tk. {{Session::get('coupon')['discount']}}</span>
                                </li>
                            @else
                                <li class="list-group-item">SubTotal: <span style="float: right;">Tk.{{ Cart::Subtotal() }}</span></li>
                            @endif

                            <li class="list-group-item">Shipping Charge: <span style="float: right;">Tk. {{ $charge }}</span></li>
                            <li class="list-group-item">Vat: <span style="float: right;">Tk. {{ $vat }}</span></li>
                            @if (Session::has('coupon'))
                                <li class="list-group-item">Total: <span style="float: right;">Tk.{{ Session::get('coupon')['balance'] + $charge + $vat}}</span></li>
                            @else
                                <li class="list-group-item">Total: <span style="float: right;">{{ Cart::Subtotal() + $charge + $vat }}</span></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>

            <div class="cart_buttons">
                <button type="button" class="button cart_button_clear">All Cancel</button>
                <a href="{{route('payment-step')}}" class="button cart_button_checkout">Final Step</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public')}}/frontend/js/cart_custom.js"></script>
@endsection
