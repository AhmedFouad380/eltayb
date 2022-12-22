<table class="table table-striped table-bordered">
    <thead>
    <tr class="text-capitalize">
        <th scope="col">
            المنتج

        </th>
        <th scope="col">العدد</th>
        <th scope="col">السعر</th>
        <th scope="col">الاجمالي</th>
        <th scope="col"><i class=" close fa-solid fa-xmark"></i></th>
    </tr>
    </thead>
    <tbody  >
    @foreach($pos as $data)
    <tr class="">
        <td scope="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-model" data-bs-toggle="modal" data-bs-target="#exampleModal">
                {{$data->Product->ar_title}}
                <i class=" baby-blue fa-solid fa-circle-info"></i>
            </button>
            <input type="hidden" name="product_id[]" value="{{$data->product->id}}">
            <!-- Modal -->
        </td>
        <td>
            <!-- this is Quantity -->
            <div class="qty-input d-flex">
                <button class="qty-count update-count qty-count--minus"  data-id="{{$data->id}}" data-type="minus"  data-action="minus" type="button">-</button>
                <input readonly class="product-qty form-control inputcount-{{$data->id}}" type="number" name="count[]" min="0" value="{{$data->count}}">
                <button class="qty-count update-count qty-count--add" data-type="add" data-id="{{$data->id}}" data-action="add" type="button">+</button>
            </div>
            <!-- end Quantity -->
            <div class="mt-3">
                {{$data->Shape->ar_title}}
            </div>
            <input type="hidden" name="shape_id[]" value="{{$data->Shape->id}}">

        </td>
        <td>
            <input type="text" name="sell_price[]" class="form-control price" value="{{$data->Shape->price}}">
        </td>
        <td class="sub-total">
            {{$data->count * $data->Shape->price}}
        </td>
        <td>
            <i class="mt-3 red close fa-solid fa-xmark delete" data-id={{$data->id}}""></i>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>


<script>



    $(".update-count").click(function () {
        var id = $(this).data('id');
        var count= $('.inputcount-'+id).val();
        var type = $(this).data('type');
        if(count == 1 && type == 'minus'){
            Swal.fire({
                icon: 'error',
                title: "عفوا!",
                text: " اقل قيمة ممكنه هي 1",
                type: "error",
                timer: 3000,
                showConfirmButton: false
            });

        }else{
            $.ajax({
                type: "GET",
                url: "{{url('update-count')}}",
                data: {
                    'id': id,
                    'count': count,
                    'type':type
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function (data) {
                    $("#table-data").html(data);
                    getData()
                }
            })

        }

    });

    $(".delete").click(function () {
        var id = $(this).data('id');
        if (id != '')  {
            Swal.fire({
                title: "هل انت متاكد ",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("delete-item")}}',
                        type: "get",
                        data: {'id': id, _token: CSRF_TOKEN},
                        success: function (data) {
                            console.log(data);
                            Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                            $("#table-data").html(data);
                            getData()
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("{{__('lang.Cancelled')}}", "{{__('lang.Message_Cancelled_Delete')}}", "error");
                }
            });
        } else{
            Swal.fire({
                icon: 'error',
                title: "عفوا!",
                text: "عفوا حدث خطأ",
                type: "error",
                timer: 3000,
                showConfirmButton: false
            });

        }
    });


</script>
