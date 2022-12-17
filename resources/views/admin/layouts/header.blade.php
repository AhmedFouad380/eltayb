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
                        <img alt="Logo" src="{{\App\Models\Setting::find(1)->logo}}" class="h-25px h-lg-60px"/>
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
                                            <img alt="Logo" src="{{\App\Models\Setting::find(1)->logo}}"/>
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
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
                            <span
                                class="menu-link @if(Request::segment(1) == "User_setting" || Request::segment(1) == 'User-edit' || Request::segment(1) == 'clients_Setting' || Request::segment(1) == 'clients_edit'
                                 ) active @endif py-3">
                                <span class="menu-title">قائمة العملاء </span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/User_setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "User_setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Product_Reports") text-active-primary active @endif ">

                                                مستخدمى الموقع
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/clients_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "clients_Settings" || Request::segment(1) == 'clients-edit' ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "clients") text-active-primary active @endif ">

                                                العملاء
                                              </span>
                                    </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'suppliers_setting' || Request::segment(1) == 'suppliers-edit' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('suppliers_Setting')}}">
                                <span class="menu-title">قائمة الموردين</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div
                            class="menu-item   @if(Request::segment(1) == 'Orders' || Request::segment(1) == 'Order_detail' ) here show @endif menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{url('Orders')}}">
                                <span class="menu-title">قائمة الطلبات</span>
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
                            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
                            <span
                                class="menu-link @if(Request::segment(1) == "Product_Reports"
                                 ) active @endif py-3">
                                <span class="menu-title">التقارير </span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/Product_Reports')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Product_Reports"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Product_Reports") text-active-primary active @endif ">

                                                تقرير المنتجات
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/Order_Reports')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Order_Reports"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Order_Reports") text-active-primary active @endif ">

                                                تقرير المبيعات
                                              </span>
                                    </span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
                            <span
                                class="menu-link @if(Request::segment(1) == "invoices_Setting_buy" || Request::segment(1) == 'Storage_Setting' || Request::segment(1) == "receipts_Setting" || Request::segment(1) == "receipts-edit"
                                 ) active @endif py-3">
                                <span class="menu-title">الحسابات    </span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/invoices_Setting/'. 'income')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "invoices_Setting_buy"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "invoices_Setting_buy") text-active-primary active @endif ">

                                                فواتير الشراء
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/invoices_Setting/outcome')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "invoices_Setting_sell"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "invoices_Setting_sell") text-active-primary active @endif ">

                                                فواتير البيع
                                              </span>
                                    </span>
                                    </a>
                                </div>
                               
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/receipts_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "receipts_Setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "receipts_Setting") text-active-primary active @endif ">

                                            السندات
                                              </span>
                                    </span>
                                    </a>
                                </div>

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/Storage_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Storage_Setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Storage_Setting") text-active-primary active @endif ">

                                            المخزون
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/StorageTransaction_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "StorageTransaction_Setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "StorageTransaction_Setting") text-active-primary active @endif ">

                                            حركة المخزون
                                              </span>
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
                            <span
                                class="menu-link @if(Request::segment(1) == "Coupons_Setting" ||
                                Request::segment(1) == "Coupons-edit" ||
                                Request::segment(1) == "Slider_Setting" ||
                                 Request::segment(1) == "Slider-edit" ||
                                 Request::segment(1) == "General_Setting"||
                                  Request::segment(1) == "Page_Setting" ||
                                  Request::segment(1) == "units_Setting" ||
                                  Request::segment(1) == "branches_Setting" ||
                                  
                                Request::segment(1) == "-edit" ||

                                  Request::segment(1) == "edit-page"
                                 ) active @endif py-3">
                                <span class="menu-title">الاعدادات</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/General_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "General_Setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "General_Setting") text-active-primary active @endif ">

                                                الاعدادات العامة
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('/branches_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "branches_Setting"  ) active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "branches_Setting" || Request::segment(1) == 'Storage-edit') text-active-primary active @endif ">

                                            الفروع
                                              </span>
                                    </span>
                                    </a>
                                </div>
                                
                               

                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('Coupons_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Coupons_Setting" ||Request::segment(1) == "Coupons-edit") active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title @if(Request::segment(1) == "Coupons_Setting" ||Request::segment(1) == "Coupons-edit")  text-active-primary active @endif ">

                                                اكود الخصم

                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('units_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "units_Setting" ||Request::segment(1) == "units-edit") active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title @if(Request::segment(1) == "units_Setting" ||Request::segment(1) == "units-edit")  text-active-primary active @endif ">

                                                الوحدات

                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('Slider_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Slider_Setting" ||Request::segment(1) == "edit-Slider") active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Slider_Setting" ||Request::segment(1) == "edit-Slider") text-active-primary active @endif ">

                                                السليدر

                                              </span>
                                    </span>
                                    </a>
                                </div>
                                <div data-kt-menu-placement="right-start"
                                     class="menu-item menu-lg-down-accordion">
                                    <a href="{{url('Page_Setting')}}">
                                    <span
                                        class="menu-link @if(Request::segment(1) == "Page_Setting" ||Request::segment(1) == "edit-Page") active @endif py-3">
                                        <span class="menu-icon ">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black"/>
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"/>
                                                    <path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"/>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title  @if(Request::segment(1) == "Page_Setting" ||Request::segment(1) == "edit-Page") text-active-primary active @endif ">

                                                الصفحات التعريفية

                                              </span>
                                    </span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->
