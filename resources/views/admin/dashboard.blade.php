@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">لوحة القيادة</h1>
@endsection

@section('content')


    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Row-->
            <div class="row g-5 ">
                <div class="col-xl-3">
                    <!--begin::Stats Widget 29-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bgi-no-repeat card-stretch gutter-b"
                         style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"/>
															<path
                                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															<path
                                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            @inject('Admins','App\Models\Admin')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$Admins->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">مستخدمي النظام </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 29-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 31-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"/>
															<path
                                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															<path
                                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            @inject('User','App\Models\User')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$User->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">العملاء
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>

                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            @inject('Order','App\Models\Order')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$Order->where('type','delivered')->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">الطلبات المكتملة</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$Order->where('type','!=','canceled')->where('type','!=','delivered')->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">الطلابات الغير مكتملة </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
            </div>
            <div class="row g-5 ">
                <div class="col-xl-3">
                    <!--begin::Stats Widget 25-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-light-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            @inject('MainCategory','App\Models\Category')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$MainCategory->count()}}</span>
                            <span
                                class="font-weight-bold text-muted font-size-sm">الاقسام</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 25-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 27-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-light-info card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                            <!--end::Svg Icon-->
												</span>
                            @inject('Product','App\Models\Product')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$Product->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">المنتجات</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 27-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 26-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-light-danger card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            @inject('SubCategory','App\Models\Coupon')
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$SubCategory->where('is_active','active')->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">اكواد الخصم المفعله</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 26-->
                </div>

                <div class="col-xl-3">
                    <!--begin::Stats Widget 28-->
                    <div style="background-color:#FFF!important; border-radius: 35px; "
                         class="card card-custom bg-light-warning card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-warning">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path
                                                                d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                                fill="#000000"/>
															<path
                                                                d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                                fill="#000000" opacity="0.3"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span
                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{\App\Models\ContactForm::where('is_read',0)->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">الرسائل الجديدة</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stat: Widget 28-->
                </div>
            </div>


            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <!--begin::Charts Widget 3-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">الطلبات</span>
                                <span class="text-muted fw-bold fs-7">                            الاجمالي :
                        {{$Order->whereYear('created_at',date('Y'))->count()}}</span>
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar" data-kt-buttons="true">
{{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a>--}}
{{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>--}}
{{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a>--}}
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_3_chart" style="height: 350px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Charts Widget 3-->
                </div>
            </div>

            <!--end::Row-->

            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <!--begin::Charts Widget 3-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1"> الطلبات الجديدة</span>
                                <span class="text-muted fw-bold fs-7">                            الاجمالي :
                        {{$Order->whereDate('created_at',date('Y-m-d'))->count()}}</span>
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar" data-kt-buttons="true">
                                {{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a>--}}
                                {{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>--}}
                                {{--                                <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a>--}}
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <!--end::Chart-->
                            <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->

                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>
                                        </div>
                                    </th>

                                    <th class="min-w-125px">رقم الطلب  </th>
                                    <th class="min-w-125px">اسم العميل </th>
                                    <th class="min-w-125px">رقم الجوال العميل</th>
                                    <th class="min-w-125px">حالة الطلب </th>
                                    <th class="min-w-125px">طريقة الدفع </th>
                                    <th class="min-w-125px">اجمالي المبلغ  </th>
                                    <th class="min-w-125px"> تفاصيل  الطلب  </th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->


                                <!--end::Table body-->
                            </table>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Charts Widget 3-->
                </div>
            </div>
            <!--begin::Row-->
            <!--end::Row-->




        </div>
        <!--end::Post-->
    </div>


@endsection

@section('script')
    <script src="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
{{--    <script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>--}}
    <script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>
{{--    <script src="{{asset('admin/assets/js/custom/documentation/charts/apexcharts.js')}}"></script>--}}

    <script src="{{asset('admin/assets/js/custom/modals/create-app.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/type.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/budget.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/team.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/targets.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/files.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/complete.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/main.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                ],
                ajax: {
                    url: '{{ route('Order.datatable.data') }}',
                    data: {
                        to:"{{date('Y-m-d')}}"

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'order_num', name: 'order_num', "searchable": true, "orderable": true},
                    {data: 'user_name', name: 'user_name', "searchable": true, "orderable": true},
                    {data: 'user_phone', name: 'user_phone', "searchable": true, "orderable": true},
                    {data: 'type', name: 'type', "searchable": true, "orderable": true},
                    {data: 'payment_type', name: 'payment_type', "searchable": true, "orderable": true},
                    {data: 'total_price', name: 'payment_type', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Order')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>

    <script>

        $("#getMoney").click(function () {
            var to = $('#to').val();
            var from = $('#from').val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('getMoney')}}",
                data: {"to": to, "from": from},
                success: function (data) {
                    $("#MoneyData").html(data)
                }
            })

        })
        $(document).ready(function () {
            $("#project_state").submit(function (e) {
                e.preventDefault();

                var project_to = $('#project_to').val();
                var project_from = $('#project_from').val();

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "GET",
                    url: "{{url('projectState')}}",
                    data: {"project_to": project_to, "project_from": project_from},
                    success: function (data) {
                        $("#items2").html(data)
                        $('#kt_menu_project_state').hide();

                    }
                })

            })
        });

        $("#getLevel").click(function () {
            var id = $('#idContract').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Get_Levels')}}",
                data: {"id": id},
                success: function (data) {
                    $("#items").html(data)
                    $('#kt_menu_61a08bf50cf89').hide();
                }
            })

            $.ajax({
                type: "GET",
                url: "{{url('contractName')}}",
                data: {"id": id},
                success: function (data) {
                    $("#contractName").html(data)
                }
            })
        })
    </script>


    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success("نجاح", "{{$message}}");
        </script>

    @endif

    <script>
        (function () {
            var e = document.getElementById("kt_charts_widget_3_chart"),
                t = (parseInt(KTUtil.css(e, "height")), KTUtil.getCssVariableValue("--bs-gray-500")),
                a = KTUtil.getCssVariableValue("--bs-gray-200"),
                o = KTUtil.getCssVariableValue("--bs-info"),
                s = KTUtil.getCssVariableValue("--bs-light-info");
            e &&
            new ApexCharts(e, {
                series: [{
                    name: 'الطلبات المكتملة',
                    data: [
                        @inject('uses','App\Models\Order')
                            @for($x=1; $x<=12; $x++)
                            "{{$uses->whereYear('created_at',date('Y'))->where('type','Delivered')->whereMonth('created_at','=',$x)->count()}}",
                        @endfor
                    ],

                },
                    {
                        name: 'الطلابات الغير مكتملة ',
                        data: [
                            @inject('uses','App\Models\Order')
                                @for($x=1; $x<=12; $x++)
                                "{{$uses->whereYear('created_at',date('Y'))->where('type','!=','Delivered')->whereMonth('created_at','=',$x)->count()}}",
                            @endfor
                        ]
                    }
                ],
                chart: { fontFamily: "inherit", type: "area", height: 350, toolbar: { show: !1 } },
                plotOptions: {},
                legend: { show: !1 },
                dataLabels: { enabled: !1 },
                fill: { type: "solid", opacity: 1 },
                stroke: { curve: "smooth", show: !0, width: 3, colors: [s,o] },
                xaxis: {
                    categories: [
                        @for($x=1; $x<=12; $x++)
                            "{{date('Y')}}-{{$x}}-1",
                        @endfor
                    ],
                    axisBorder: { show: !1 },
                    axisTicks: { show: !1 },
                    labels: { style: { colors: t, fontSize: "12px" } },
                    crosshairs: { position: "front", stroke: { color: o, width: 1, dashArray: 3 } },
                    tooltip: { enabled: !0, formatter: void 0, offsetY: 0, style: { fontSize: "12px" } },
                },
                yaxis: { labels: { style: { colors: t, fontSize: "12px" } } },
                states: { normal: { filter: { type: "none", value: 0 } }, hover: { filter: { type: "none", value: 0 } }, active: { allowMultipleDataPointsSelection: !1, filter: { type: "none", value: 0 } } },
                tooltip: {
                    style: { fontSize: "12px" },
                    y: {
                        formatter: function (e) {
                            return  e;
                        },
                    },
                },
                colors: [s],
                grid: { borderColor: a, strokeDashArray: 4, yaxis: { lines: { show: !0 } } },
                markers: { strokeColor: o, strokeWidth: 3 },
            }).render();
        })()

    </script>
@endsection

