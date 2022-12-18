@extends('layouts.master')

@section('css')
@if(session('lang')=='en')
<!-- DataTables -->
<link href="{{ URL::asset('admin/en/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/en/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/en/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('admin/en/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@else
<!-- DataTables -->
<link href="{{ URL::asset('admin/ar/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/ar/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/ar/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('admin/ar/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endif

@endsection

@section('breadcrumb')
<h3 class="page-title">{{trans('lang.Permissions')}}</h1>
@endsection

@section('content')

<div class="page-content-wrapper">
    <div class="container-fluid" @if(session('lang')=='en') @else dir="rtl" @endif>
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body">

                <table class="table table-bordered table-hover table-checkable mt-10" id="datatable">
                    <thead>
                    <tr>
                        <th class="headerr">#</th>
                        <th class="headerr">{{__('lang.name')}} </th>
                        <th class="headerr"> {{__('lang.Users_Edit')}}  </th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

<!-- sample modal content -->

@endsection

@section('script')
@if(session('lang')=='en')
<!-- Required datatable js -->
<script src="{{ URL::asset('admin/en/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/alertify/js/alertify.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('admin/en/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('admin/en/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('admin/en/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
@else
<!-- Required datatable js -->
<script src="{{ URL::asset('admin/ar/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/alertify/js/alertify.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('admin/ar/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('admin/ar/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('admin/ar/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

@endif
<!-- Datatable init js -->

<script type="text/javascript">
    $(function () {
        var table = $('#datatable').DataTable({
            processing: false,
            serverSide: true,
            autoWidth: false,
            searching: false,
            responsive: true,
            aaSorting: [],
            "dom": "<'border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
            "language": {
                search: '',
                searchPlaceholder: 'بحث سريع'
            },
            buttons: [
                {
                    extend: 'print',
                    className: 'btn btn-info m-1',
                    text: '<i class="dripicons-print"></i>'
                },
                // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                {
                    extend: 'excel',
                    className: 'btn btn-success m-1',
                    text: '<i class="dripicons-download"></i>'
                },
                {
                    text: '<i class="dripicons-experiment"></i>',
                    className: 'btn btn-warning m-1',
                    action: function ( e, dt, node, config ) {
                        $('#addModel').modal('show');
                    }
                },
                @can('add Permissions')
                {
                    text: '{{__('lang.Users_Create')}}',
                    className: 'btn btn-purple m-1',
                    action: function ( e, dt, node, config ) {
                        window.location.href = "{{url('create-Permission')}}"
                    }
                },
                @endcan
                @can('delete Permissions')

                {
                    text: '{{__('lang.Users_Delete')}} ',
                    className: 'btn btn-danger m-1 btn_delete'
                }
                @endcan


                // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
            ],
            ajax: {
                url: '{{ route('Permission.database.data') }}',
                data: {

                }
            },
            columns: [
                {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                {data: 'name', name: 'name', "searchable": true, "orderable": true},
                {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

            ]
        });

        $("#checker").click(function(){
            var items = document.getElementsByTagName("input");

            for(var i=0; i<items.length; i++){
                if(items[i].type=='checkbox') {
                    if (items[i].checked==true) {
                        items[i].checked=false;
                    } else {
                        items[i].checked=true;
                    }
                }
            }

        });

        $(".btn_delete").click(function(event){
            event.preventDefault();
            var checkIDs = $("#datatable input:checkbox:checked").map(function(){
            return $(this).val();
            }).get(); // <----

            if (checkIDs.length > 0) {
                var token = '{{ csrf_token() }}';
                Swal.fire({
                    title: "{{trans('lang.Are you sure?')}}",
                    text: "{{__('lang.You wont be able to revert this')}}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    confirmButtonText: "{{trans('lang.Yes, Sure it!')}}",
                    cancelButtonText: "{{trans('lang.No')}}",
                }).then(function (isConfirm) {
                    if (isConfirm.value) {
                        $.ajax(
                        {
                            url: "{{url('Delete_Permission')}}",
                            type: 'get',
                            dataType: "JSON",
                            data: {
                                "id": checkIDs,
                                "_method": 'post',
                                "_token": token,
                            },
                            success: function (data) {
                                if(data.msg == "Success") {
                                    location.reload();

                                } else {
                                    location.reload();

                                }
                            },
                            fail: function(xhrerrorThrown){

                            }
                        });
                    } else {
                        console.log(isConfirm);
                    }
                });
            }

        });

    });
</script>
@endsection
