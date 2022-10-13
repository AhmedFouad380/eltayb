@extends('admin.layouts.master')

@section('css')
    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }

        .select2-container .select2-selection--single .select2-selection__clear {
            padding-right: 355px;
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">الاعدادات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/Orders') }}" class="text-gray-600 text-hover-primary">قائمة الطلبات</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تفاصيل طلب رقم : {{$data->order_num}}</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->


        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Navbar-->
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <!--begin::Image-->
                        <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-100px mw-lg-100px" src="{{asset('admin\assets\media\avatars\blank.png')}}" alt="image" />
                        </div>
                        <!--end::Image-->
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::Details-->
                                <div class="d-flex flex-column">
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">طلب رقم : {{$data->order_num}}</a>
                                            <span class="badge badge-light-success me-auto">
                                            @if($data->type == 'preparing')
                                                جاري التحضير
                                            @elseif($data->type == 'on_way')
                                                جاري التوصيل
                                            @elseif($data->type == 'delivered')
                                                تم التوصيل
                                            @elseif($data->type == 'canceled')
                                                تم الالغاء
                                            @endif
                                        </span>
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Description-->
                                    <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400"> اسم العميل {{$data->User->name}}</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Actions-->

                                <button type="button" class="btn btn-sm btn-danger me-3" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_user">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    الموقع
                                </button>


                                <!--end::Actions-->
                            </div>
                            <!--end::Head-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap justify-content-start">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{$data->created_at}}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">تاريخ الطلب</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    @if($data->delivery_time != null)
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-6 text-gray-800 fw-bolder">{{$data->delivery_time}}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">تاريخ التسليم </div>
                                        <!--end::Label-->
                                    </div>
                                    @endif
                                    <!--end::Stat-->
                                    <!--begin::Stat-->

                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                            </svg>
                                        </span>
                                                <!--end::Svg Icon-->

                                                <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data->total_price}}" data-kt-countup-prefix="SAR">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">اجمالي الفاتورة</div>
                                            <!--end::Label-->
                                        </div>

                                <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                                <!--begin::Users-->
                                <div class="symbol-group symbol-hover mb-3">
                                    <!--begin::User-->


{{--                                <!--end::User-->--}}
{{--                                    <!--begin::All users-->--}}
{{--                                    <a href="{{url('projectEmployes',$data->id)}}" class="symbol symbol-35px symbol-circle" >--}}
{{--                                        <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder" data-bs-toggle="tooltip" data-bs-trigger="hover" title="رؤية العاملين على المشروع">+</span>--}}
{{--                                    </a>--}}

{{--                                    <!--end::All users-->--}}
                                </div>
                                <!--end::Users-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Details-->
                    <div class="separator"></div>
                    <!--begin::Nav wrapper-->

                    <!--end::Nav wrapper-->
                </div>
            </div>
            <!--end::Navbar-->

            <!--begin::Row-->
            <div class="row g-6 g-xl-9">
                <div class="card mb-5">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">تفاصيل الطلب</span>
                            <span class="text-muted mt-1 fw-bold fs-7"></span>
                        </h3>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4" id="users_table">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-30px">م</th>
                                    <th class="min-w-125px">اسم المنتج</th>
                                    <th class="min-w-100px">الحجم</th>
                                    <th class="min-w-100px">العدد</th>
                                    <th class="min-w-100px">السعر</th>
                                    <th class="min-w-100px">الاجمالي</th>
                                    <th class="min-w-150px">الملاحظات</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($data->OrderDetails as $key => $OrderDetails)

                                    <tr>
                                        <td>
                                            <span class="fw-bold text-dark d-block fs-5">{{$key + 1 }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$OrderDetails->title}}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$OrderDetails->Shape->title}}
                                            </div>
                                        </td>


                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$OrderDetails->count}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$OrderDetails->price / $OrderDetails->count}}
                                            </div>
                                        </td>


                                        <td>
                                            <div class="d-flex align-items-center">

                                                        <?php
                                                        $total = $OrderDetails->price ;
                                                        echo $total;
                                                        ?>


                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$OrderDetails->note}}
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                @if(isset($data->coupon))
                                    <tr style="color:red!important;">
                                        <th colspan="4"> </th>
                                        <th colspan="1">  كود الخصم  : {{$data->coupon->name}}</th>
                                        <th colspan="2" > {{$data->coupon_percent}} - </th>
                                    </tr>
                                @endif

                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">الضرائب </th>
                                    <th colspan="2">{{$data->tax}}</th>
                                </tr>
                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">خدمة توصيل </th>
                                    <th colspan="2">{{$data->delivery_fees}}</th>
                                </tr>
                                    <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">اجمالي الفاتورة </th>
                                    <th colspan="2">{{$data->total_price + $data->tax + $data->delivery_cost   }}</th>
                                </tr>
                                </tfoot>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">الموقع</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <!--end::Form-->
                    <div class="fv-row mb-7">
                        <iframe
                            width="500"
                            height="350"
                            frameborder="0"
                            scrolling="no"
                            marginheight="0"
                            marginwidth="0"
                            src="https://maps.google.com/maps?q={{$data->lat}},{{$data->lng}}&hl=es&z=14&amp;output=embed"
                        >
                        </iframe>
                        <br />
                        <small>
                            <a
                                href="https://maps.google.com/maps?q={{$data->lat}},{{$data->lng}}&hl=es;z=14&amp;output=embed"
                                style="color:#0000FF;text-align:left"
                                target="_blank"
                            >
                                See map bigger
                            </a>
                        </small>
                    </div>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--    <script type="text/javascript"--}}
    {{--            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>--}}
    {{--    <script src="{{asset('admin/locationpicker.jquery.js')}}"></script>--}}

    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script type="text/javascript">
        {{--$(function () {--}}
        {{--    var table = $('#users_table').DataTable({--}}
        {{--        processing: true,--}}

        {{--        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable--}}
        {{--        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],--}}
        {{--        "language": {--}}
        {{--            search: '<i class="fa fa-eye" aria-hidden="true"></i>',--}}
        {{--            searchPlaceholder: 'بحث سريع',--}}
        {{--            "url": "{{ url('admin/assets/ar.json') }}"--}}
        {{--        },--}}
        {{--        buttons: [--}}
        {{--            {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>' , footer: true},--}}
        {{--            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},--}}
        {{--            {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},--}}
        {{--            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}--}}
        {{--        ],--}}


        {{--    });--}}

        {{--});--}}
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

@endsection

