
<tr>
    <td>
        <div class="d-flex align-items-center">
            1
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">

            <!--end::Input-->
            {{$product->ar_title}}

        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">

            {{$shape_title}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">

            {{$unit_name}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">

            {{$quantity}}

        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            @if($type == 'income')
            {{$purchase_price}}
            @else
            {{$sell_price}}
            @endif

        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            <input type="text" name="total_price[]"
                   value="{{$total_price}}"
                   hidden/>
            <input type="text" name="add_to_storage[]"
                   value="{{$add_to_storage}}"
                   hidden/>
            <input type="text" name="sell_price[]"
                   value="{{$sell_price}}"
                   hidden/>
            <input type="text" name="purchase_price[]"
                   value="{{$purchase_price}}"
                   hidden/>
            <input type="text" name="quantity[]"
                   value="{{$quantity}}"

                   hidden/>
            <input type="text" name="product_id[]"
                   class="form-control form-control-solid mb-2 mb-lg-0"
                   placeholder="سعر الشراء" value="{{$product->id}}" hidden/>
            <input type="text" name="shape_id[]"
                   value="{{$shape->id}}"
                   hidden/>
            {{$total_price}}
        </div>
    </td>
    <td >
        <button type="button"
                class="btn btn-light-danger me-3 delete_question">
            <i class="bi bi-trash-fill fs-2x fs-2x"></i>
        </button>
    </td>
</tr>

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
