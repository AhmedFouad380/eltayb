@extends('layout.layout')

@section('title')
    {{$User->ReceiptType->title}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>

    <style>
        @media print {
            .flex-column-fluid {
                display: none;
            }

            .brand-logo img {
                display: none;
            }

            .breadcrumb-item h5 {
                display: none;
            }

            .logo {
                display: none;
            }

            .card-toolbar button {
                display: none;
            }

            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: left !important;
            }

            .col-sm-12 {
                width: 100%;
            }

            .col-sm-11 {
                width: 91.66666666666666%;
            }

            .col-sm-10 {
                width: 83.33333333333334%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-8 {
                width: 66.66666666666666%;
            }

            .col-sm-7 {
                width: 58.333333333333336%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-5 {
                width: 41.66666666666667%;
            }

            .col-sm-4 {
                width: 32.33333333333333%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-2 {
                width: 16.666666666666664%;
            }

            .col-sm-1 {
                width: 8.333333333333332%;
            }

        }
    </style>

@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                            id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->

                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">


                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{$User->ReceiptType->title}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <!--begin::Card-->
            <br>
            <br>
            <br>
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->


                        <button id="print-div" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-print"></i> {{__('lang.printReceipt')}}</button>

                        <!--end::Button-->
                    </div>

                </div>

                <div class="card-body" id="content_2">
                    <form class="px-10" novalidate="novalidate" id="kt_form" method="get"
                          action="#" enctype="multipart/form-data">

                        <div class="col-sm-12 row">
                            <div class="row" style="text-align: right;width: 100%; overflow: hidden">
                                <div class="col-sm-4 col-md-4"
                                     style="text-align: right; padding: 0px;  display:inline;width: 300px;float:right;">
                                    <img src="{{$settings->logo}}" alt="{{$settings->name}}"
                                         style="width: 208px; height: 70px">
                                    {{--                                <label style="font-size: 18px;font-weight: bold">{{$settings->name}}</label>--}}

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4"
                                     style="text-align: center; padding: 15px;  display:inline;width: 300px;float:none;">
                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(url('/'), 'QRCODE',4,4)}}"
                                         alt="barcode"/>

                                </div>
                                <div class="col-sm-4 col-lg-4"
                                     style="text-align: left; padding: 0px;  display:inline;width: 300px;float:left;">
                                    <label style="font-size: 18px;font-weight: bold">التاريخ : </label>
                                    <label
                                        style="font-size: 18px;font-weight: bold">  {{ $hijri_date }}
                                    </label> هـ <br>
                                    <label
                                        style="font-size: 18px;font-weight: bold">{{Carbon\Carbon::parse($User->created_at)->format('Y/m/d')}}</label>
                                    م <br>
                                    <label style="font-size: 18px;font-weight: bold"> رقم السند : {{$User->id}}</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12" style="text-align: center">
                            <h3 style="font-size: 18px;font-weight: bold;">{{$User->ReceiptType->title}}  </h3>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">استلمنا من السيد/ـه: </label>
                            <div class="col-lg-9 col-xl-9">
                                @inject('client','App\Models\Client')
                                <input type="text" value="{{$client->find($id)->name}}" disabled
                                       class="form-control form-control-solid" required placeholder="">
                            </div>
                        </div>

                        @if($client->find($id)->tax_num != null)
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">رقم ضريبي : </label>
                                <div class="col-lg-9 col-xl-9">
                                    @inject('client','App\Models\Client')
                                    <input type="text" value="{{$client->find($id)->tax_num}}" disabled
                                           class="form-control form-control-solid" required placeholder="">
                                </div>
                            </div>

                        @endif
                        <br>
                        <!--begin: Wizard Step 1-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label"> نقدا مبلغ و قدرة </label>
                            <div class="col-lg-3 col-xl-3 col-sm-3">
                                <input type="number" id="txt" disabled class="form-control form-control-solid"
                                       value="{{$User->price}}" name="price" required
                                       placeholder="{{__('lang.price')}}">
                            </div>
                            <label class="col-xl-1 col-lg-1 col-sm-1 col-form-label"> كتابة : </label>
                            <div class="col-lg-5 col-xl-5 col-sm-5">
                                <input type="text" id="demo" disabled class="form-control form-control-solid" required
                                       placeholder="{{__('lang.price')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.pay_type')}}: </label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="text" disabled class="form-control form-control-solid"
                                       value="{{__('lang.'.$User->pay_type)}}" required placeholder="">
                            </div>
                        </div>

                        @if($User->pay_type == 'network')
                            <div id="networkInputs">
                                <div class="form-group row">
                                    <label class="col-xl-1 col-lg-1 col-form-label"> {{__('lang.network_num')}}</label>
                                    <div class="col-lg-3 col-xl-3">
                                        <input type="text" disabled class="form-control form-control-solid"
                                               name="network_date" value="{{$User->network_num}}"
                                               placeholder="{{__('lang.network_num')}}">
                                    </div>

                                    <label class="col-xl-1 col-lg-1 col-form-label"> {{__('lang.date')}}</label>
                                    <div class="col-lg-3 col-xl-3">
                                        <input type="text" disabled class="form-control form-control-solid"
                                               value="{{\Carbon\Carbon::parse($User->date)->format('Y-m-d')}}"
                                               name="network_date" placeholder="{{__('lang.date')}}">
                                    </div>
                                    <label class="col-xl-1 col-lg-1 col-form-label"> {{__('lang.time')}}</label>
                                    <div class="col-lg-3 col-xl-3">
                                        <input type="text" disabled class="form-control form-control-solid"
                                               value="{{\Carbon\Carbon::parse($User->date)->format('H:i')}}"
                                               name="network_date" placeholder="{{__('lang.date')}}">
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($User->pay_type == 'check')

                            <div id="checkInputs">

                                <div class="form-group row">

                                    <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label"> رقم الشيك</label>
                                    <div class="col-lg-3 col-xl-3 col-sm-3 ">
                                        <input type="text" disabled class="form-control form-control-solid"
                                               value="{{ $User->check_number }}" name="check_number"
                                               placeholder="{{__('lang.date')}}">
                                    </div>
                                    <label class="col-xl-2 col-lg-2 col-sm-2 col-form-label"> تاريخ الاستحقاق</label>
                                    <div class="col-lg-4 col-xl-4 col-sm-2">
                                        <input type="date" disabled class="form-control form-control-solid"
                                               name="check_date" value="{{$User->check_date}}"
                                               placeholder="{{__('lang.network_num')}}">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-xl-3 col-lg-3 col-form-label"> اسم البنك</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input type="text" disabled class="form-control form-control-solid"
                                               value="{{ $User->bank_name }}" name="bank_name"
                                               placeholder="{{__('lang.date')}}">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label"> وذلك مقابل </label>
                            <div class="col-lg-9 col-xl-9 col-sm-9">
                                <p> {{$User->note}} </p>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


@endsection



@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/custom/wizard/wizard-6.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>


    <script src="{{asset('front/Tafqeet.js')}}"></script>
    <script>
        function main() {

            var fraction = document.getElementById("txt").value.split(".");
            if (fraction.length == 2) {
                document.getElementById("demo").value = tafqeet(fraction[0]) + " فاصلة " + tafqeet(fraction[1]) + 'ريال  فقط لاغير ';
            } else if (fraction.length == 1) {
                document.getElementById("demo").value = tafqeet(fraction[0]) + ' ريال  فقط لاغير ';
            }
            return document.getElementById("demo").value;
        }

        main();

    </script>
    <script>
        $(document).ready(function () {
            $('#print-div').on('click ', function () {
                var val = demo.value; //get the input box value
                demo.setAttribute('value', val); //set value attribute into input
                var divToPrint = document.getElementById('content_2');

                console.log(main());
                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write('<html>' +
                    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">' +
                    '<body dir="rtl" onload="window.print()"> ' + divToPrint.innerHTML + '</body></html>');
                newWin.document.title = 'سند رقم ' + {!! json_encode($User->id) !!};
                newWin.document.close();
                setTimeout(function () {
                    newWin.close();
                }, 100000);

            });
        });


    </script>
@endsection
