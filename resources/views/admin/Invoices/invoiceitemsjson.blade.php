
<tr>
    <td>
        <div class="d-flex align-items-center">
            1
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            {{$product->ar_title}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            {{$shape}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            {{$sell_price}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            {{$purchase_price}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            {{$quantity}}
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
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
