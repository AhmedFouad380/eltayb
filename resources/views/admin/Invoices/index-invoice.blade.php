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
                                    <h2 class="text-end">رقم الفاتورة: #45613</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="invoice-top" style="margin-bottom: 10px;margin-top: 10px;">
                    <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
                        <div class="invoice" >
                            <h2 style="text-align: center;">فاتورة شراء</h2>
                        </div>

                    </div>
                    <div class="row" >
                        <div class="col-sm-6 mb-30 border" >
                            <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                <div class="inv-title-1" style="text-align: center;">الى السيد</div>
                                <div class="inv-title-1" >
                                   اسم السيد: احمد حسانين
                                </div>
                                <div class="inv-title-1" >
                                   رقم الجوال: 96062755
                                </div>
                                <div class="inv-title-1" >
                                    العنوان: الفروانية
                                </div>
                                <div class="inv-title-1" >
                                    التاريخ: 26/10/2022
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 mb-30 border" >
                            <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                <div class="inv-title-1" style="text-align: center;">بيانات الفاتورة</div>
                                <div class="inv-title-1" >
                                    اسم الشركة: الطيب للادوات المنزلية
                                </div>
                                <div class="inv-title-1" >
                                    رقم الفاتورة: 552100
                                </div>
                                <div class="inv-title-1" >
                                    رقم الجوال: 96062755
                                </div>
                                <div class="inv-title-1" >
                                    العنوان: الفروانية
                                </div>
                                <div class="inv-title-1" >
                                    الفرع: الفروانية
                                </div>
                                <div class="inv-title-1" >
                                    التاريخ: 26/10/2022
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="invoice-center">
                    <div class="order-summary">
                        <h4>تفاصيل الفاتورة</h4>
                        <div class="table-outer">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-bordered " id="users_table" style=" border-collapse: collapse;">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fw-bolder text-muted border bg-gray-400">
                                        <th class="min-w-100px" style="border: 1px;">اسم المنتج</th>
                                        <th class="min-w-30px">الحجم</th>
                                        <th class="min-w-30px">الوحدة</th>
                                        <th class="min-w-30px">العدد</th>
                                        @if($type == 'income')
                                            <th class="min-w-30px">سعر الشراء</th>
                                        @else
                                            <th class="min-w-30px">سعر البيع</th>
                                        @endif
                                        <th class="min-w-30px">الاجمالي</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody id="questions" class="border">
                                    <tr class="fw-bolder border">
                                        <td>Standard Plan</td>
                                        <td>$443.00 </td>
                                        <td>$921.80</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                    </tr>
                                    <tr class="fw-bolder border">
                                        <td>Standard Plan</td>
                                        <td>$443.00 </td>
                                        <td>$921.80</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                    </tr>
                                    <tr class="fw-bolder border">
                                        <td>Standard Plan</td>
                                        <td>$443.00 </td>
                                        <td>$921.80</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                    </tr>
                                    <tr class="fw-bolder border">
                                        <td>Standard Plan</td>
                                        <td>$443.00 </td>
                                        <td>$921.80</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                    </tr>
                                    <tr class="fw-bolder border">
                                        <td>Standard Plan</td>
                                        <td>$443.00 </td>
                                        <td>$921.80</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                        <td>$9243</td>
                                    </tr>
                                    </tbody>
                                <tfoot class="border">
                                    <tr  style="color:red!important;">
                                        <th colspan="4"> </th>
                                        <th colspan="1">  خصم  :</th>
                                        <th colspan="2" > -20 </th>
                                    </tr>

                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">الضرائب </th>
                                    <th colspan="2"> 50</th>
                                </tr>
                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">خدمة توصيل </th>
                                    <th colspan="2">10</th>
                                </tr>
                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">اجمالي الفاتورة </th>
                                    <th colspan="2"></th>
                                </tr>
                                </tfoot>
                                <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-bottom">
                    <div class="row">
                        <div class="col-sm-10 mb-30 border" >
                            <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="inv-title-1" >
                                            السعر بالكلمات
                                        </div>
                                        <div class="inv-title-1" >
                                            تم استلام البضاعة بواسطة
                                        </div>
                                        <div class="inv-title-1" >
                                            الاسم
                                        </div>
                                        <div class="inv-title-1" >
                                            التوقيع
                                        </div>
                                        <div class="inv-title-1" >
                                            التاريخ
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="inv-title-1" >
                                            :اربعة الاف وربعمائة ومئتان واثنين وخمسون وسبعمائة وخمسة وخمسون دينار كويتى فقط لا غير
                                        </div>
                                        <div class="inv-title-1" >
                                            :
                                        </div>
                                        <div class="inv-title-1" >
                                            :
                                        </div>
                                        <div class="inv-title-1" >
                                            :
                                        </div>
                                        <div class="inv-title-1" >
                                            :
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="important-note mb-30">
                                <h3 class="inv-title-1">ملاحظات مهمة</h3>
                                <ul class="important-notes-list-1">
                                    <li>بمجرد تسليم الطلب لا يوجد استرجاع</li>
                                    <li>يجب معيانة البضاعة قبل استلامها وغير مسئولين عن اى تلفيات</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-offsite">
                            <div class="text-end payment-info mb-30">
                                <h3 class="inv-title-1">Payment Info</h3>
                                <p class="mb-0 text-13">This payment made by BRAC BANK master card without any problem</p>
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
