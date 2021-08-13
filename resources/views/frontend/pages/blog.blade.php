@extends('frontend.master')
@section('content')
    @include('frontend.includes.menubar')
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/blog_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/frontend/styles/blog_responsive.css">
    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                        <!-- Blog post -->
                        @foreach($post as $row)
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{asset($row->post_image)}})"></div>
                            <div class="blog_text">
                                @if(Session()->get('lang') == 'hindi')
                                    {{$row->post_title_in}}
                                @else
                                    {{$row->post_title_en}}
                                @endif
                            </div>
                            <div class="blog_button"><a href="{{url('blog/single/details',['id'=>$row->id])}}">

                                    @if(Session()->get('lang') == 'hindi')
                                        जारी रखें पढ़ रहे हैं
                                    @else
                                        Continue Reading
                                    @endif



                                </a></div>
                        </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('public')}}/frontend/js/blog_custom.js"></script>
@endsection
