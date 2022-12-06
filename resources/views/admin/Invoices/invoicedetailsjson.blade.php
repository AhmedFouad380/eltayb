<div class="row g-6 g-xl-9 ">
    <div class="col-md-6 col-xl-2">
        <div class="card card-xl-stretch mb-xl-8">
            <label class="required fw-bold fs-6 mb-2">اختار المنتج </label>
            <!--end::Label-->
            <!--begin::Input-->
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 product_id"  data-num="{{$num}}" id="js-example-basic-products" name="product_id[]"
            >
                @inject('products','App\Models\Product')
                @foreach($products->all() as $product)
                    <option value="{{$product->id}}">{{$product->ar_title}}</option>
                @endforeach
            </select>

        </div>

    </div>
    <div class="col-md-6 col-xl-2">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">الاحجام </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control" id="shape{{$num}}" name="shape_id" id="shape_id[]" >
        </select>
        <!--end::Input-->
    </div>
    <div class="col-md-6 col-xl-2">
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">سعر الشراء</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="purchase_price[]"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="سعر الشراء" value="{{old('notes')}}" />
            <!--end::Input-->

        </div>

    </div>
    <div class="col-md-6 col-xl-2">
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">سعر البيع</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="sell_price[]"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="سعر الشراء" value="{{old('notes')}}" />
            <!--end::Input-->

        </div>

    </div>

    <div class="col-md-6 col-xl-2">
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">الكمية</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="quantity[]"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="الكمية" value="{{old('quantity')}}" />
            <!--end::Input-->

        </div>

    </div>
    <div class="col-md-6 col-xl-2">
        <div class="card card-xl-stretch mb-xl-8">

            <div class="form-check form-switch form-check-custom form-check-solid">
                <label class="form-check-label" for="flexSwitchDefault">مفعل
                    ؟</label>
                <input class="form-check-input" name="is_active[]" type="hidden"
                       value="inactive" id="flexSwitchDefault"/>
                <input
                    class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                    name="is_active" type="checkbox"
                    value="active" id="flexSwitchDefault" checked/>
            </div>
        </div>
    </div>
    <div class="col-3">
                                                             <button type="button"
                                                                class="btn btn-light-danger me-3 delete_question">
                                                            <i class="bi bi-trash-fill fs-2x fs-2x"></i>
                                                       </button>
                                                     </div>
</div>


<script>
    $(".product_id").change(function () {
        var wahda = $(this).val();
        var num = $(this).data('num');
        if (wahda != '') {
            $.get("{{ URL::to('/get-Shapes')}}" + '/' + wahda, function ($data) {
                var outs = "";
                $.each($data, function (title, id) {
                    console.log(title)
                    outs += '<option value="' + id + '">' + title + '</option>'
                });
                $('#shape'+num).html(outs);

            });
        }
    });
</script>
