        <!--begin::Header-->
        <style>.margin-10 {
                margin: 10px;
            }</style>
        <!--begin::Header-->
        <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
             data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <!--begin::Container-->
            <div class="container-xxl sabi d-flex flex-grow-1 flex-stack">
                <!--begin::Header Logo-->
                <div class="d-flex align-items-center me-5">
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                         id="kt_header_menu_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                      fill="black"/>
                                <path opacity="0.3"
                                      d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Heaeder menu toggle-->
                    <!--begin::Logo-->
                    <a href="{{ url('/') }}">
                        <img alt="Logo" src="" class="h-25px h-lg-60px"/>
                    </a>
                    <!--end::Logo-->

                </div>
                <!--end::Header Logo-->
                <!--begin::Topbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Toolbar wrapper-->
                    <div class="topbar d-flex align-items-stretch flex-shrink-0" id="kt_topbar">


                    <!--end::Notifications-->

                        <!--begin::inbox-->

                        <!--end::inbox-->

                        <!--begin::Quick links-->
                        <!--end::Quick links-->
                        <!--begin::User-->
                        <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                                 data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <img src="{{asset('admin/assets/media/avatars/150-26.jpg')}}" alt="user"/>
                            </div>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="{{asset('admin/assets/media/avatars/150-26.jpg')}}"/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{url('logout')}}" class="menu-link px-5">تسجيل الخروج</a>

                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User -->
                        <!--begin::Heaeder menu toggle-->
                        <!--end::Heaeder menu toggle-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
            <!--begin::Container-->
            <div class="header-menu-container d-flex align-items-stretch flex-stack h-lg-75px w-100" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu container-xxl sabi flex-column align-items-stretch flex-lg-row" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div
                        class="menu menu-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch flex-grow-1"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item  @if(Request::segment(1) == 'Dashboard') here show @endif  menu-lg-down-accordion me-lg-1">
                            <a class="menu-link  py-3"
                               href="/Dashboard">
                                <span class="menu-title ">لوحة القيادة</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'Admin_setting' || Request::segment(1) == 'Admin-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('Admin_setting')}}">
                                <span class="menu-title">قائمة مستخدمي النظام</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'User_setting' || Request::segment(1) == 'User-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('User_setting')}}">
                                <span class="menu-title">قائمة العملاء</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'Page_Setting' || Request::segment(1) == 'Page-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('Page_Setting')}}">
                                <span class="menu-title">الصفحات التعريفية</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'Slider_Setting' || Request::segment(1) == 'Slider-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('Slider_Setting')}}">
                                <span class="menu-title">السليدر</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                            <div
                                class="menu-item   @if(Request::segment(1) == 'Categories_Setting' || Request::segment(1) == 'Categories-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                                <a class="menu-link py-3" href="{{url('Categories_Setting')}}">
                                    <span class="menu-title">الاقسام</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </a>
                            </div>
                            <div
                                class="menu-item @if(Request::segment(1) == 'Product_Setting' || Request::segment(1) == 'Product-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                                <a class="menu-link py-3" href="{{url('Product_Setting')}}">
                                    <span class="menu-title"> المنتجات </span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </a>
                            </div>

                        <div
                            class="menu-item @if(Request::segment(1) == 'Coupons_Setting' || Request::segment(1) == 'Coupons-edit') here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('Coupons_Setting')}}">
                                <span class="menu-title"> اكود الخصم </span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item @if(Request::segment(1) == 'General_Setting') here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('General_Setting')}}">
                                <span class="menu-title"> الاعدادات العامة </span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->
