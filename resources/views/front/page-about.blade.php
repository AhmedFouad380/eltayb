@extends('front.layout')
@section('title')
    {{$data->title}}
    @endsection
@section('content')
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                        <span></span>     {{$data->title}}

                    </div>
                </div>
            </div>
            <div class="page-content pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                            <section class="row align-items-center mb-50">
                                @if(isset($data->image))
                                <div class="col-lg-6">
                                    <img src="{{$data->image}}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                                </div>
                                <div class="col-lg-6">
                                    <div class="pl-25">
                                        {!! $data->description !!}
                                    </div>
                                </div>
                                @else
                                    <div class="col-lg-12">
                                        <div class="pl-25">
                                            {!! $data->description !!}
                                        </div>
                                    </div>

                                @endif
                            </section>
                        </div>
                    </div>
                </div>
{{--                <section class="container mb-50 d-none d-md-block">--}}
{{--                    <div class="row about-count">--}}
{{--                        <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">--}}
{{--                            <h1 class="heading-1"><span class="count">12</span>+</h1>--}}
{{--                            <h4>Glorious years</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-1-5 col-md-6 text-center">--}}
{{--                            <h1 class="heading-1"><span class="count">36</span>+</h1>--}}
{{--                            <h4>Happy clients</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-1-5 col-md-6 text-center">--}}
{{--                            <h1 class="heading-1"><span class="count">58</span>+</h1>--}}
{{--                            <h4>Projects complete</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-1-5 col-md-6 text-center">--}}
{{--                            <h1 class="heading-1"><span class="count">24</span>+</h1>--}}
{{--                            <h4>Team advisor</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-1-5 text-center d-none d-lg-block">--}}
{{--                            <h1 class="heading-1"><span class="count">26</span>+</h1>--}}
{{--                            <h4>Products Sale</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
            </div>
        </main>
    @endsection
