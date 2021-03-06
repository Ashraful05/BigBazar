@extends('frontend.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/blog_single_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/blog_single_responsive.css">

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public')}}/frontend/images/blog_single_background.jpg" data-speed="0.8"></div>
    </div>

    <!-- Single Blog Post -->
    @foreach($posts as $row)
        <div class="single_post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="single_post_title">
                            @if(Session()->get('lang') == 'hindi')
                                {{$row->post_title_in}}
                            @else
                                {{$row->post_title_en}}
                            @endif
                        </div>
                        <div class="single_post_text">
                            <p> @if(Session()->get('lang') == 'hindi')
                                    {!! $row->details_in !!}
                                @else
                                    {!! $row->details_en !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{asset('public')}}/frontend/js/blog_single_custom.js"></script>

@endsection
