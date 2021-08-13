@extends('frontend.master')
@section('title','User Login Page')
@section('content')
    @php
        $setting = DB::table('=settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
        $cart = Cart::Content();

    @endphp

    <style>
        /**
       * The CSS shown here will not be introduced in the Quickstart guide, but shows
       * how you can use CSS to style your Element's container.
       */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>





    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px;border-radius: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Cart Products</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>Product Image</b></div>
                                                <div class="cart_item_text"><img src="{{asset($row->options->image)}}" style="width: 70px;height: 70px;" alt=""></div>
                                            </div>
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>Product Name</b></div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            @if($row->options->color ==Null )

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Product Color</b></div>
                                                    <div class="cart_item_text">{{$row->options->color}}</div>
                                                </div>
                                            @endif

                                            @if($row->options->size == Null)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Product Size</b></div>
                                                    <div class="cart_item_text">{{$row->options->size}}</div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title"><b>Product Quantity</b></div>
                                                <div class="cart_item_text">{{$row->qty}}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"><b>Product Price</b></div>
                                                <div class="cart_item_text">{{$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title"><b>Total Price</b></div>
                                                <div class="cart_item_text">{{$row->qty * $row->price}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="list-group col-lg-8" style="float:right;">
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
                                <li class="list-group-item">Total: <span style="float: right;">Tk. {{ Cart::Subtotal() + $charge + $vat }}</span></li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="col-lg-5" style="border: 1px solid grey; padding: 20px;border-radius: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>
                        <form action="{{ route('oncash-charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Cash On Delivery
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div><br>

                            <input type="hidden" name="shipping" value="{{ $charge }} ">
                            <input type="hidden" name="vat" value="{{ $vat }} ">
                            <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }} ">

                            <input type="hidden" name="shipping_name" value="{{ $data['name'] }} ">
                            <input type="hidden" name="shipping_phone" value="{{ $data['phone'] }} ">
                            <input type="hidden" name="shipping_email" value="{{ $data['email'] }} ">
                            <input type="hidden" name="shipping_address" value="{{ $data['address'] }} ">
                            <input type="hidden" name="shipping_city" value="{{ $data['city'] }} ">
                            <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">

                            <button class="btn btn-info">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection

