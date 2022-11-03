﻿@extends('front.layout')
@section('title')
    {{__('lang.login')}}
@endsection
@section('content')
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                        <span></span> {{__('lang.login')}}
                    </div>
                </div>
            </div>
            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="row">
                                <div class="col-lg-6 pr-30 d-none d-lg-block">
                                    <img class="border-radius-15" src="{{asset('website/assets/imgs/page/login-1.png')}}" alt="" />
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <div class="login_wrap widget-taber-content background-white">
                                        <div class="padding_eight_all bg-white">
                                            <div class="heading_s1">
                                                <h1 class="mb-5"> {{__('lang.login')}} </h1>
                                                <p class="mb-30">{{__('lang.Don`t have an account')}}? <a href="{{url('register')}}">{{__('lang.register')}}</a></p>
                                            </div>
                                            <form method="post" action="{{url('login')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" required="" name="email" placeholder="email *" />
                                                </div>
                                                <div class="form-group">
                                                    <input required="" type="password" name="password" placeholder="Your password *" />
                                                </div>

                                                <div class="login_footer form-group mb-50">
                                                    <div class="chek-form">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                            <label class="form-check-label" for="exampleCheckbox1"><span>{{__('lang.Remember me')}}</span></label>
                                                        </div>
                                                    </div>
                                                    <a class="text-muted" href="#">{{__('lang.Forgot password')}}?</a>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-heading btn-block hover-up" name="login">{{__('lang.Log in')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection