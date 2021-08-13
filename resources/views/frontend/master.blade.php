@php
    $siteSetting = DB::table('site_settings')->first();
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ asset('public') }}/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/frontend/styles/contact_responsive.css">

    <script src="https://js.stripe.com/v3/"></script>



</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public') }}/frontend/images/phone.png" alt=""></div>
                            {{ $siteSetting->phone_one }}</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public') }}/frontend/images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">{{ $siteSetting->email }}</a></div>
                        <div class="top_bar_content ml-auto">
                            @guest

                            @else
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">

                                        <li>
                                            <a href="" data-toggle="modal" data-target="#exampleModal">My Order Tracking Page</a>
                                        </li>
                                    </ul>
                                </div>
                            @endguest

                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    @php
                                        $language = Session()->get('lang');
                                    @endphp
                                    <li>
                                        @if(Session()->get('lang') == 'hindi')
                                            <a href="{{ route('english-language') }}">English<i class="fas fa-chevron-down"></i></a>
                                        @else
                                            <a href="{{ route('hindi-language') }}">Hindi<i class="fas fa-chevron-down"></i></a>
                                        @endif


                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar_user">
                                @guest
                                    <div class="user_icon"><img src="{{ asset('public') }}/frontend/images/user.svg" alt=""></div>
                                    <div><a href="{{route('customer-register')}}">Register</a></div>
                                    <div><a href="{{route('customer-login')}}">Sign in</a></div>
                                @else
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href=""><div class="user_icon"><img src="{{ asset('public') }}/frontend/images/user.svg" alt=""></div>Profile<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="{{ route('user-wishlist') }}">WishList</a></li>
                                                <li><a href="{{ route('user-checkout') }}">CheckOUt</a></li>
                                                <li><a href="#">Others</a></li>
                                                <li><a href="{{route('user.logout')}}">LogOut</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                @endguest


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="{{ route('/') }}"><img src="{{ asset('public') }}/frontend/images/logo.png" alt=""></a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    @php
                        $categories = DB::table('categories')->get();
                    @endphp

                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="{{ route('product-search') }}" method="post" class="header_search_form clearfix">
                                        @csrf
                                        <input type="search" name="search" required="required" class="header_search_input" placeholder="Search for products...">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    @foreach($categories as $category)
                                                        <li><a class="clc" href="#">{{$category->category_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('public') }}/frontend/images/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                @guest

                                @else
                                    @php
                                        $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
                                    @endphp
                                    <div class="wishlist_icon"><img src="{{ asset('public') }}/frontend/images/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">{{count($wishlist)}}</div>
                                    </div>
                            </div>
                        @endguest

                        <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{ asset('public') }}/frontend/images/cart.png" alt="">
                                        <div class="cart_count"><span>{{Cart::count()}}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route('show-cart') }}">Cart</a></div>
                                        <div class="cart_price">Tk. {{Cart::subtotal()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->



        @yield('content')

        @include('frontend.includes.footer')

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="{{ asset('public') }}/frontend/images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public') }}/frontend/images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public') }}/frontend/images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public') }}/frontend/images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Order Tracking Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('order-tracking') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="">Status Code</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger">Track Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<script src="{{ asset('public') }}/frontend/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('public') }}/frontend/styles/bootstrap4/popper.js"></script>
<script src="{{ asset('public') }}/frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/slick-1.8.0/slick.js"></script>
<script src="{{ asset('public') }}/frontend/plugins/easing/easing.js"></script>
<script src="{{ asset('public') }}/frontend/js/custom.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


<script>
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on("click", "#return", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to return?",
            text: "Once Return, This will return your money!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Cancel!");
                }
            });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.addwishlist').on('click',function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    url: " {{ url('/add/wishlist/') }}/"+id,
                    type: 'Get',
                    dataType: "json",
                    success: function(data){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }


                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}
{{--        $('.addcart').on('click',function(){--}}
{{--            var id = $(this).data('id');--}}
{{--            // alert(id);--}}
{{--            if(id){--}}
{{--                $.ajax({--}}
{{--                    url: " {{ url('/add/to/card/') }}/"+id,--}}
{{--                    type: 'Get',--}}
{{--                    dataType: "json",--}}
{{--                    success: function(data){--}}
{{--                        const Toast = Swal.mixin({--}}
{{--                            toast: true,--}}
{{--                            position: 'top-end',--}}
{{--                            showConfirmButton: false,--}}
{{--                            timer: 3000,--}}
{{--                            timerProgressBar: true,--}}
{{--                            didOpen: (toast) => {--}}
{{--                                toast.addEventListener('mouseenter', Swal.stopTimer)--}}
{{--                                toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
{{--                            }--}}
{{--                        })--}}

{{--                        if($.isEmptyObject(data.error)){--}}
{{--                            Toast.fire({--}}
{{--                                icon: 'success',--}}
{{--                                title: data.success--}}
{{--                            })--}}
{{--                        }else{--}}
{{--                            Toast.fire({--}}
{{--                                icon: 'error',--}}
{{--                                title: data.error--}}
{{--                            })--}}
{{--                        }--}}


{{--                    },--}}
{{--                });--}}
{{--            }else{--}}
{{--                alert('danger');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script type="text/javascript">
    function productview(id){
        $.ajax({
            url: "{{ url('/cart/product/view/') }}/"+id,
            type: "Get",
            dataType:"json",
            success:function(data){
                $('#pcode').text(data.product.product_code);
                $('#pcat').text(data.product.category_name);
                $('#psub').text(data.product.subcategory_name);
                $('#pbrand').text(data.product.brand_name);
                $('#pname').text(data.product.product_name);
                $('#pimage').attr('src',data.product.image_two);
                $('#product_id').val(data.product.id);

                var d = $('select[name="color"]').empty();
                $.each(data.color, function(key,value){
                    $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                });
                var d = $('select[name="size"]').empty();
                $.each(data.size, function(key,value){
                    $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
                });
            }

        })
    }
</script>

</body>

</html>
