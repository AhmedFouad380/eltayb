@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات كود الخصم</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تعديل بيانات كود الخصم</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات كود الخصم</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-Coupons')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->

                            <div class="fv-row mb-7">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">الاسم</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name"  value="{{$employee->name}}"
                                           class="form-control form-contr ol-solid mb-3 mb-lg-0"
                                           required/>
                                    <input type="hidden" name="id" value="{{$employee->id}}">

                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">نسبة الخصم </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="percent" value="{{$employee->percent}}"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           required/>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">الحد الاقصى للاستخدام </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="use_count"  value="{{$employee->use_count}}"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           required/>
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">تاريخ الانتهاء </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="date" name="expire_date"  value="{{$employee->expire_date}}"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           required/>
                                    <!--end::Input-->
                                </div>


                                <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_active" type="checkbox"
                                           value="active" id="flexSwitchDefault"
                                           @if($employee->is_active == 'active') checked @endif />
                                </div>
                            </div>

                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
                            </button>
                        </div>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );

        $('.dropify').dropify();

        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>



@endsection

