<!--begin::Input group-->
<div class="fv-row mb-7 row">
    <!--begin::Label-->
    <!--end::Label-->
    @foreach($posts as $Product)
        <div class="col-md-4 col-lg-3 col-12 addShape" data-id="{{$Product->id}}">
            <div class="info-box text-center">
                <p class="text-center w-100 p-2 text-wrap">
                    {{$Product->ar_title}}
                </p>

            </div>
        </div>
    @endforeach

<!--end::Input-->
</div>

<script>
    $(".addShape").click(function () {
        var id = $(this).data('id');
        $('.bs-edit-modal-lg').modal('hide');

        var client_id = $('#client_id').val();
        if (client_id != '') {
            if (id != '') {
                $.ajax({
                    type: "GET",
                    url: "{{url('add-item')}}",
                    data: {
                        'id': id,
                        client_id: client_id
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
        }else{
            Swal.fire({
                icon: 'error',
                title: "عفوا!",
                text: "يجب اختيار العميل اولا",
                type: "error",
                timer: 3000,
                showConfirmButton: false
            });

        }
    });

</script>
