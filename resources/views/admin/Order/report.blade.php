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
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تقرير المبيعات</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->


        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <br>
                    <h3>الاجمالي :
                        @php
                        $query = \App\Models\Order::OrderBy('id','asc');

                        if(Request::get('user_id') && Request::get('user_id') != 0){
                           $query->where('user_id',Request::get('user_id'));
                        }
                          if(Request::get('type')  && Request::get('type') != 0){
                           $query->where('type',Request::get('type'));
                        }
                      if(Request::get('payment_type') && Request::get('payment_type') != 0 ){
                           $query->where('payment_type',Request::get('payment_type'));
                        }
                      if(Request::get('is_payed') && Request::get('is_payed') != 3){
                           $query->where('is_payed',Request::get('is_payed'));
                        }

                          if(Request::get('from')){
                           $query->whereDate('created_at','>=',Request::get('from'));
                        }
                            if(Request::get('to')){
                           $query->whereDate('created_at','<=',Request::get('to'));
                        }
                        $OrderSum = $query->sum('total_price')
                        @endphp
                        {{$OrderSum}}

                    </h3>
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

                            <th class="min-w-125px">اسم المنتج  </th>
                            <th class="min-w-125px">الحجم </th>
                            <th class="min-w-125px">الوحدة </th>
                            <th class="min-w-125px">سعر البيع </th>
                            <th class="min-w-125px">الكمية </th>
                            <th class="min-w-125px">رقم الفاتورة </th>
                            <th class="min-w-125px">اسم الفرع </th>

                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--    <script type="text/javascript"--}}
{{--            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>--}}
{{--    <script src="{{asset('admin/locationpicker.jquery.js')}}"></script>--}}

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
                    url: '{{ route('datatableOrderReports') }}',
                    data: {

                        @if(Request::get('user_id'))
                        user_id:"{{Request::get('user_id')}}",
                        @endif

                        @if(Request::get('type'))
                        type:"{{Request::get('type')}}",
                        @endif
                            @if(Request::get('from'))
                        from:"{{Request::get('from')}}",
                        @endif
                            @if(Request::get('to'))
                        to:"{{Request::get('to')}}",
                        @endif
                            @if(Request::get('payment_type'))
                        payment_type:"{{Request::get('payment_type')}}",
                        @endif
                            @if(Request::get('is_payed'))
                        is_payed:"{{Request::get('is_payed')}}",
                        @endif
                            @if(isset($user_id))
                        user_id:"{{$user_id}}",
                        @endif


                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'product', name: 'product', "searchable": true, "orderable": true},
                    {data: 'shape', name: 'shape', "searchable": true, "orderable": true},
                    {data: 'unit', name: 'unit', "searchable": true, "orderable": true},
                    {data: 'sell_price', name: 'sell_price', "searchable": true, "orderable": true},
                    {data: 'quantity', name: 'quantity', "searchable": true, "orderable": true},
                    {data: 'invoice_number', name: 'invoice_number', "searchable": true, "orderable": true},
                    {data: 'branch_name', name: 'branch_name', "searchable": true, "orderable": true},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/add-button-Order')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });


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

