@foreach($Products as $Product)
    <div class="col-md-4 col-lg-3 col-12 add-item" data-id="{{$Product->id}}">
        <div class="info-box text-center">
            <div class="img p-2">
                <img src="{{$Product->image}}" alt="" class="w-100">
            </div>
            <p class="text-center w-100 p-2 text-wrap">
                {{$Product->ar_title}}
            </p>

        </div>
    </div>
@endforeach



<script>
    $(".add-item").click(function () {
        var id = $(this).data('id');
        $('.bs-edit-modal-lg').hide();

        var client_id = $('#client_id').val();
        if (client_id != '') {
            if (id != '') {
                $.ajax({
                    type: "GET",
                    url: "{{url('getShapesPos')}}",
                    data: {
                        'id': id,
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    },
                    success: function (data) {
                        getData()
                        $(".bs-edit-modal-lg .modal-body").html(data)
                        $(".bs-edit-modal-lg").modal('show')
                        $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                            //   $('.bs-edit-modal-lg').empty();
                            $('.bs-edit-modal-lg').hide();
                        })

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
