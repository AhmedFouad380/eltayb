<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>
    <title> Eltayb - invoice</title>

    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('admin/assets/icon.png')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
<!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/style.bundlee.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->


</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-me" style="background-color: white;">
    <div class="invoice">
        <div class="container">
            <div class="row">
                <div class="invoice-info" style="margin-bottom: 10px;margin-top: 10px;">
                    <div class="invoice-header">
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="invoice-name">
                                    <!-- logo started -->
                                    <div class="logo">
                                        <img src="http://127.0.0.1:8000/uploads/Setting/16652532096341bf5931a95.png" alt="logo" class="h-25px h-lg-60px">
                                    </div>
                                    <!-- logo ended -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="invoice">
                                    <h2 class="text-end">رقم السند: #{{$employee->id}}</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="invoice-top" style="margin-bottom: 10px;margin-top: 10px;">
                    <div class="row" style="margin-bottom: 10px;margin-top: 20px;">
                        <div class="invoice" >
                            @if($employee->type_receipt == 'in')
                            <h1 style="text-align: center;">سند قبض</h1>
                            @else
                                <h1 style="text-align: center;">سند صرف</h1>
                            @endif
                        </div>

                    </div>
                    <div class="row" style="margin-top: 40px;">
                        @if($employee->receipt_type == 'out')
                            <div class="col-md-12 mb-30 border" >
                                <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">التاريخ</a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    دفع الى

                                                </a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    مبلغ

                                                </a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    مبلغ وقدره

                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-md-7">
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    :{{$employee->date}}
                                                </a>
                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:{{$employee->supplier->name}}</a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:{{$employee->value}}</a>
                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-end">
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:</a>
                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:</a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:</a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">:</a>
                                            </div>

                                        </div>
                                        <div class="col-sm-2 text-end">
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    Date
                                                </a>


                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    Pay To

                                                </a>

                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    Amount
                                                </a>


                                            </div>
                                            <div class="invoice-title-1" style="margin-top:5px;">
                                                <a class="text-black fs-2">
                                                    Amount in words

                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                        </div>
                        @else
                    <div class="col-md-12 mb-30 border" >
                        <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">التاريخ</a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            الى شركة/السيد

                                        </a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            مبلغ

                                        </a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            مبلغ وقدره

                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            :{{$employee->date}}
                                        </a>
                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:{{$employee->supplier->name}}</a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:{{$employee->value}}</a>
                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:</a>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-end">
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:</a>
                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:</a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:</a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">:</a>
                                    </div>

                                </div>

                                <div class="col-sm-2 text-end">
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            Date
                                        </a>


                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            To Mr/Company

                                        </a>

                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            Amount
                                        </a>


                                    </div>
                                    <div class="invoice-title-1" style="margin-top:5px;">
                                        <a class="text-black fs-2">
                                            Amount in words

                                        </a>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                @endif

                    </div>
            <div class="invoice-bottom" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-md-12 mb-30 " >
                        <div class="col-md-3">
                            <div class="invoice-title-2" >
                                <a class="text-black fs-4">ملاحظات : {{$employee->notes}}</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-30 " >
                        <div class="col-md-3">
                            @if($employee->payment_type == 'cash')
                            <div class="invoice-title-2" >
                                <a class="text-black fs-4">طريقة الدفع : نقدا </a>
                            </div>
                                @elseif($employee->payment_type == 'visa')
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-4">طريقة الدفع : فيزا </a>
                                </div>
                            @elseif($employee->payment_type == 'bank_transfer')
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-4">طريقة الدفع : تحويل بنكى </a>
                                </div>
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-4">رقم التحويل : {{$employee->transfer_number}} </a>
                                </div>
                            @elseif($employee->payment_type == 'cheque')
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-4">طريقة الدفع : شيك </a>
                                </div>
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-4">رقم الشيك : {{$employee->cheque_number}} </a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="invoice-bottom" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-md-12 mb-30 " >
                        <div class="row">
                            <div class="col-md-4 align-center border" style="padding-bottom: 20px; text-align: center">
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-2">المستلم</a>
                                    <a class="text-black fs-2 text-end">Received By</a>
                                </div>

                            </div>
                            <div class="col-md-4 align-center border" style="padding-bottom: 20px; text-align: center">
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-2">المحاسب</a>
                                    <a class="text-black fs-2 text-end">Accountant</a>
                                </div>

                            </div>
                            <div class="col-md-4 align-center border" style="padding-bottom: 80px;text-align: center">
                                <div class="invoice-title-2" >
                                    <a class="text-black fs-2">الادارة</a>
                                    <a class="text-black fs-2" style="text-align: end">Management</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

                </div>

            </div>
        </div>
    </div>


<!--end::Main-->
<script>var hostUrl = "{{asset('admin/assets/')}}";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
</body>
<!--end::Body-->
</html>
