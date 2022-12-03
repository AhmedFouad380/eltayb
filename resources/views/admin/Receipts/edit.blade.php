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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات السندات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تعديل بيانات السندات</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات السندات</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-receipts')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">اسم المورد </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="supplier_id"
                            >
                                @inject('suppliers','App\Models\Supplier')
                                @foreach($suppliers->all() as $supplier)
                                    <option value="{{$supplier->id}}" @if($employee->supplier_id == $supplier->id) selected @endif >{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id" value="{{$employee->id}}">

                            <!--end::Input-->
                            <a class="text-gray-800 text-hover-primary mb-1" href="{{url('suppliers_Setting')}}">اضافة مورد جديد</a>
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">قيمة السند </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" step="0.001" name="value"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   value="{{$employee->value}}"
                                   required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">اسم مستلم السند</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="tel" name="reciever_name" id="reciever_name" maxlength="11"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="الاسم" value="{{$employee->reciever_name}}" />
                            <!--end::Input-->
                            <span id="error-validation" style="color:red"></span>
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">نوع السند</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid mb-3 mb-lg-0" name="receipt_type"
                                    required
                            >
                                @foreach(config('enum.receipt_type') as $key => $value)
                                    <option value="{{ $key }}" @if($employee->receipt_type == $key) selected @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7" >
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">طريقة الدفع</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select id="payment_type" class="form-control form-control-solid mb-3 mb-lg-0" name="payment_type"
                                    required
                            >
                                @foreach(config('enum.payment_type') as $key => $value)
                                    <option value="{{ $key }}" @if($employee->payment_type == $key) selected @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7" id="transfer_number" @if($employee->transfer_number != null) style="display: block;" @else style="display: none;" @endif>
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">رقم التحويل</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="transfer_number"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="" value="{{$employee->transfer_number}}" />
                            <!--end::Input-->
                        </div>

                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="fv-row mb-7" id="cheque_number" @if($employee->cheque_number != null) style="display: block;" @else style="display: none;" @endif>
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">رقم الشيك</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="cheque_number"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="" value="{{$employee->cheque_number}}" />
                            <!--end::Input-->
                        </div>

                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">ملاحظات</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="notes"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="العنوان التفصبلى" value="{{$employee->notes}}" />
                            <!--end::Input-->
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title"></h4>
                                    <div class="controls">
                                        <input type="file"   name="photo" />
                                    </div>
                                </div>
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                        {{--                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
                        <!--end::Hint-->
                        </div>
                            <!--end::Input group-->


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

