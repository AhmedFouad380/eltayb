@extends('front.layout')
@section('title')
    {{__('lang.register')}}
@endsection
@section('content')
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.home')}}</a>
                        <span></span> {{__('lang.register')}}
                    </div>
                </div>
            </div>
            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <div class="login_wrap widget-taber-content background-white">
                                        <div class="padding_eight_all bg-white">
                                            <div class="heading_s1">
                                                <h1 class="mb-5">{{__('lang.Create an Account')}}</h1>
                                                <p class="mb-30">{{__('lang.Already have an account?')}} <a href="{{url('/login')}}">Login</a></p>
                                            </div>
                                            <form method="post" action="{{url('registerUser')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" required="" name="name"  required placeholder="{{__('lang.name')}}" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" required="" name="email" placeholder="{{__('lang.email')}}" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" required="" name="phone" placeholder="{{__('lang.phone')}}" />
                                                </div>
                                                <div class="form-group">
                                                    <input required="" type="password" name="password" placeholder="{{__('lang.password')}}" />
                                                </div>
                                                <div class="form-group">
                                                    <input required="" type="password" name="password_confirmation" placeholder="{{__('lang.Confirm password')}}" />
                                                </div>

                                                <div class="login_footer form-group mb-50">
                                                    <div class="chek-form">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" required type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                            <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                        </div>
                                                    </div>
                                                    <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                                </div>
                                                <div class="form-group mb-30">
                                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">
                                                        {{__('submit')}}</button>
                                                </div>
                                                <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pr-30 d-none d-lg-block">
                                    <div class="card-login mt-115">
                                        <a href="#" class="social-login facebook-login">
                                            <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                            <span>Continue with Facebook</span>
                                        </a>
                                        <a href="#" class="social-login google-login">
                                            <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                            <span>Continue with Google</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
