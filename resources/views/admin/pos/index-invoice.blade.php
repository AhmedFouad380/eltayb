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
                                    <h2 class="text-end">?????? ????????????????: #{{$employee->id}}</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="invoice-top" style="margin-bottom: 10px;margin-top: 10px;">
                    <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
                        <div class="invoice" >
                            @if($type == 'income')
                            <h2 style="text-align: center;">???????????? ????????</h2>
                            @else
                                <h2 style="text-align: center;">???????????? ??????</h2>
                            @endif
                        </div>

                    </div>
                    <div class="row" >
                        @if($type == 'outcome')
                            @if($employee->client_id != null)
                                <div class="col-sm-6 mb-30 border" >
                            <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                <div class="inv-title-1" style="text-align: center;">?????? ??????????</div>
                                <div class="inv-title-1" >
                                   ?????? ??????????: {{$employee->client->name}}
                                </div>
                                <div class="inv-title-1" >
                                   ?????? ????????????: {{$employee->client->phone}}
                                </div>
                                <div class="inv-title-1" >
                                    ??????????????: {{$employee->client->address}}
                                </div>
                                <div class="inv-title-1" >
                                    ??????????????: {{$employee->date}}
                                </div>

                            </div>
                        </div>
                            @elseif($employee->user_id != null)
                                <div class="col-sm-6 mb-30 border" >
                                    <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                        <div class="inv-title-1" style="text-align: center;">?????? ??????????</div>
                                        <div class="inv-title-1" >
                                            ?????? ??????????: {{$employee->user->name}}
                                        </div>
                                        <div class="inv-title-1" >
                                            ?????? ????????????: {{$employee->user->phone}}
                                        </div>
                                        <div class="inv-title-1" >
                                            ??????????????: {{$employee->user->address}}
                                        </div>
                                        <div class="inv-title-1" >
                                            ??????????????: {{$employee->date}}
                                        </div>

                                    </div>
                                </div>
                            @endif
                                <div class="col-sm-6 mb-30 border" >
                            <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                <div class="inv-title-1" style="text-align: center;">???????????? ????????????????</div>
                                <div class="inv-title-1" >
                                    ?????? ????????????: ?????????? ?????????????? ????????????????
                                </div>
                                <div class="inv-title-1" >
                                    ?????? ????????????????: 552100
                                </div>
                                <div class="inv-title-1" >
                                    ?????? ????????????: 96062755
                                </div>
                                <div class="inv-title-1" >
                                    ??????????????: ??????????????????
                                </div>
                                <div class="inv-title-1" >
                                    ??????????: ??????????????????
                                </div>
                                <div class="inv-title-1" >
                                    ??????????????: 26/10/2022
                                </div>

                            </div>
                        </div>
                        @else
                            <div class="col-sm-6 mb-30 border" >
                                <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                    <div class="inv-title-1" style="text-align: center;">???????????? ????????????</div>
                                    <div class="inv-title-1" >
                                        ?????? ????????????: {{$employee->supplier->name}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ?????? ????????????: {{$employee->supplier->phone}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ??????????????: {{$employee->supplier->address}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ??????????????: {{$employee->date}}
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 mb-30 border" >
                                <div class="invoice-number" style="margin-bottom: 15px;margin-top: 10px;">
                                    <div class="inv-title-1" style="text-align: center;">???????????? ????????????????</div>
                                    <div class="inv-title-1" >
                                        ?????? ????????????: {{$settings->ar_name}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ?????? ????????????????: {{$employee->id}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ?????? ????????????: {{$settings->phone}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ??????????????: {{$settings->address}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ??????????: {{$employee->branch->ar_name}}
                                    </div>
                                    <div class="inv-title-1" >
                                        ??????????????: {{$employee->date}}
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="invoice-center">
                    <div class="order-summary">
                        <h4>???????????? ????????????????</h4>
                        <div class="table-outer">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-bordered " id="users_table" style=" border-collapse: collapse;">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fw-bolder text-muted border bg-gray-400">
                                        <th class="min-w-100px" style="border: 1px;">?????? ????????????</th>
                                        <th class="min-w-30px">??????????</th>
                                        <th class="min-w-30px">????????????</th>
                                        <th class="min-w-30px">??????????</th>
                                        @if($type == 'income')
                                            <th class="min-w-30px">?????? ????????????</th>
                                        @else
                                            <th class="min-w-30px">?????? ??????????</th>
                                        @endif
                                        <th class="min-w-30px">????????????????</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody id="questions" class="border">
                                    @foreach($employee->invoicesDetails as $product)
                                    <tr class="fw-bolder border">
                                        <td>{{$product->product->ar_title}}</td>
                                        <td>{{$product->shape->ar_title}} </td>
                                        <td>{{$product->product->units->ar_name}} </td>
                                        <td>{{$product->quantity}}</td>
                                        @if($type == 'income')
                                        <td>{{$product->purchase_price}}</td>
                                            <td>{{$product->purchase_price * $product->quantity}}</td>

                                        @else
                                            <td>{{$product->sell_price}}</td>
                                            <td>{{$product->sell_price * $product->quantity}}</td>

                                        @endif
                                    </tr>
                                    @endforeach
                                    {{--<tr class="fw-bolder border">
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
                                    </tr>--}}
                                    </tbody>
                                <tfoot class="border">
                                    <tr  style="color:red!important;">
                                        <th colspan="4"> </th>
                                        <th colspan="1">  ??????  :</th>
                                        <th colspan="2" > -{{$employee->additions->discount}} </th>
                                    </tr>

                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">?????????????? </th>
                                    <th colspan="2"> {{$employee->additions->tax}}</th>
                                </tr>
                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">???????? ?????????? </th>
                                    <th colspan="2">{{$employee->additions->delivery_fees}}</th>
                                </tr>
                                <tr>
                                    <th colspan="4"> </th>
                                    <th colspan="1">???????????? ???????????????? </th>
                                    <th colspan="2">{{$employee->total_price}}</th>
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
                                            ?????????? ????????????????
                                        </div>
                                        <div class="inv-title-1" >
                                            ???? ???????????? ?????????????? ????????????
                                        </div>
                                        <div class="inv-title-1" >
                                            ??????????
                                        </div>
                                        <div class="inv-title-1" >
                                            ??????????????
                                        </div>
                                        <div class="inv-title-1" >
                                            ??????????????
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="inv-title-1" id="demo" >

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
                                <h3 class="inv-title-1">?????????????? ????????</h3>
                                <ul class="important-notes-list-1">
                                    <li>?????????? ?????????? ?????????? ???? ???????? ??????????????</li>
                                    <li>?????? ???????????? ?????????????? ?????? ???????????????? ???????? ?????????????? ???? ???? ????????????</li>
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

    <input type="hidden" id="txt" value="{{$amount}}">
    <script src="{{asset('admin/Tafqeet.js')}}"></script>
<script>
    function main (){
        var fraction = document.getElementById("txt").value.split(".");

        if (fraction.length == 2){
            document.getElementById ("demo").innerHTML   =  tafqeet (fraction[0]) + " ?????????? ??" + tafqeet (fraction[1]) + ' ??????  ?????? ?????????? ';
        }
        else if (fraction.length == 1){
            document.getElementById ("demo").innerHTML =  tafqeet (fraction[0]) + ' ??????????  ?????? ?????????? ';
        }
    }
    main();
    window.onafterprint = function(e){
        closePrintView();
    };

        window.print();

    function closePrintView() {
        document.location.href  = "{{url('PointOfSale')}}";
    }


</script>

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
