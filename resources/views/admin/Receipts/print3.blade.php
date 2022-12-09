@extends('admin.layouts.master')

@section('css')

@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تفاصيل السند</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تفاصيل السند</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">تفاصيل السند</h3>
                    </div>
                    <div class="card-title m-0">
                        <a class="btn btn-light-primary me-3" href="{{url('receipts_print/' . $employee->id)}}">طباعة السند</a>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <!--end::Content-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <div id="kt_account_settings_profile_details" class="collapse show" style="margin: 50px;">
                    <!--begin::Form-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <div class="col-lg-2-5">
                            <a class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{$employee->supplier->name}} </a>

                        </div>
                        <div class="col-lg-2-5">
                            <a class="text-gray-600 text-hover-primary fs-5 fw-bolder me-3">{{$employee->supplier->phone}} </a>

                        </div>
                        <div class="col-lg-2-5">
                            <a class="text-gray-600 text-hover-primary fs-5 fw-bolder me-3">{{$employee->supplier->email}} </a>

                        </div>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="col-lg-2-5">
                            <a class="text-inverse-danger-600 fs-5 fw-bolder me-3" style="color: darkred">{{$employee->supplier->address}} </a>

                        </div>

                    </div>
                    <div class="separator"></div>
                    <div class="card-body pt-5">
                        <div class="row g-6 g-xl-9 ">
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">اسم مستلم السند: </div>
                                    <div class="fs-4 fw-bolder">
                                        @if($employee->reciever_name != null)
                                        {{$employee->reciever_name}}
                                        @else
                                        غير معروف
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">قيمة السند: </div>
                                    <div class="fs-4 fw-bolder danger">{{$employee->value}} </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">عمل السند: </div>
                                    <div class="fs-4 fw-bolder danger">{{$employee->creator->name}} </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">قام يتحديث السند: </div>
                                    <div class="fs-4 fw-bolder danger">{{$employee->updator->name}} </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">نوع السند: </div>
                                    <div class="fs-4 fw-bolder danger">
                                        @foreach(config('enum.receipt_type') as $key => $value)
                                            @if($employee->receipt_type == $key) {{$value}} @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">طريقة الدفع: </div>
                                    <div class="fs-4 fw-bolder danger">
                                        @foreach(config('enum.payment_type') as $key => $value)
                                            @if($employee->payment_type == $key) {{$value}} @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4" @if($employee->transfer_number == null) style="display: none" @endif>
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">رقم التحويل: </div>
                                    <div class="fs-4 fw-bolder danger">
                                        {{$employee->transfer_number}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4" @if($employee->cheque == null) style="display: none;" @endif>
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">رقم الشيك: </div>
                                    <div class="fs-4 fw-bolder danger">
                                        {{$employee->cheque_number}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4" >
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="fs-4 fw-bolder">ملاحظات: </div>
                                    <div class="fs-4 fw-bolder danger">
                                        @if($employee->notes !=null)
                                        {{$employee->notes}}
                                        @else
                                        لا يوجد ملاحظات
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="separator"></div>


                    <!--begin::Hint-->
                    <!--end::Form-->
                </div>

            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-body">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                         data-bs-target="#kt_account_profile_details" aria-expanded="true"
                         aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">جميع السندات التى تخص هذه الشركة</h3>
                        </div>
                    </div>
                        <!--end::Card title-->
                    <!--begin::Table-->
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

                            <th class="min-w-125px">اسم المورد  </th>
                            <th class="min-w-100px">قيمة السند  </th>
                            <th class="min-w-125px">اسم المستلم  </th>
                            <th class="min-w-100px">نوع السند  </th>
                            <th class="min-w-125px">طريقة دفع او استلام السند  </th>
                            <th class="min-w-100px">ملاحظات  </th>
                            <th class="min-w-100px">مستندات </th>
                            <th class="min-w-100px">الاجراءات</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    <div class="separator"></div>
                </div>
            </div>

            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    url: '{{ route('receipts.datatable.data') }}',
                    data: {
                        @isset($employee)
                        id : {{$employee->supplier_id}},
                        @endisset


                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'supplier', name: 'supplier', "searchable": true, "orderable": true},
                    {data: 'value', name: 'value', "searchable": false, "orderable": false},
                    {data: 'reciever_name', name: 'reciever_name', "searchable": false, "orderable": false},
                    {data: 'receipt_type', name: 'receipt_type', "searchable": false, "orderable": false},
                    {data: 'payment_type', name: 'payment_type', "searchable": false, "orderable": false},
                    {data: 'notes', name: 'notes', "searchable": false, "orderable": false},
                    {data: 'photo', name: 'photo', "searchable": false, "orderable": false},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/add-button-receipts')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });
    </script>
    <script>
        $("#payment_type").change(function () {
            var type = $(this).val();
            if($(this).val() == 'bank_transfer'){
                document.getElementById('transfer_number').style.display = 'block';
                document.getElementById('cheque_number').style.display = 'none';

            }else if($(this).val() == 'cheque'){
                document.getElementById('transfer_number').style.display = 'none';
                document.getElementById('cheque_number').style.display = 'block';
            }else{
                document.getElementById('transfer_number').style.display = 'none';
                document.getElementById('cheque_number').style.display = 'none';
            }
        });
    </script>

@endsection

