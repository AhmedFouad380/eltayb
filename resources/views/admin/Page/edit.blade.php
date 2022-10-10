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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات الصفحات التعريفية</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تعديل بيانات الصفحات التعريفية</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات الصفحات التعريفية</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-Page')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الاسم باللغة العربية</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ar_title" value="{{$employee->ar_title}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                                <input type="hidden" name="id" value="{{$employee->id}}">

                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الاسم باللغة الانجليزية </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="en_title" value="{{$employee->en_title}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">مكان الاظهار </label>
                                <!--end::Label-->
                                <select name="position" class="form-control" >
                                    <option @if($employee->poisition == 'header') selected @endif value="header">اعلى الصفحة </option>
                                    <option @if($employee->poisition == 'footer') selected @endif  value="footer">اسفل الصفحة </option>
                                    <option @if($employee->poisition == 'both') selected @endif  value="both">الاثنان معا </option>
                                </select>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الوصف  باللغة العربية </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea rows="5" name="ar_description" id="editor1"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          required>{{$employee->description}}</textarea>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الوصف  باللغة الانجليزية </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea rows="5" name="en_description" id="editor2"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          required>{{$employee->description}}</textarea>
                                <!--end::Input-->
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">الصورة</h4>
                                        <div class="controls">
                                            <input type="file"  class="dropify"  name="image" data-default-file="{{$employee->image}}"  data-validation-required-message="{{trans('word.This field is required')}}"/>
                                        </div>
                                    </div>
                                </div>
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

