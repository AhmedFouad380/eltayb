<!DOCTYPE html>
    <html lang="en" dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
            <link  rel="stylesheet" href="{{asset('pos/assets/css/all.min.css')}}">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
/            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
            <link rel="stylesheet" href="{{asset('pos/assets/css/styleEn.css')}}">
            <title>pos page</title>
            <style type="text/css">
                .ajax-load{
                    background: #e1e1e1;
                    padding: 10px 0px;
                    width: 100%;
                }
            </style>
        </head>
        <body>

            <div class="container-fluied p-4 text-capitalize">
                <!-- -----------this is section 1-----------  -->
                <div class="row mb-3">
                    <div class="col-md-6 col-lg-6 col-12">
                        <label for="cars">الموقع :</label>
                        <select name="branch_id" id="cars">
                            <option value="{{Auth::guard('admin')->user()->Branch->id}}">{{Auth::guard('admin')->user()->Branch->ar_name}}</option>
                        </select>
                        <span class="date">{{\Carbon\Carbon::now()->format('Y-m-d')}} </span>
                        <span class="time">{{\Carbon\Carbon::now()->format('h:i A')}} </span>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 d-flex justify-content-end">
                        <a class="btn return" href="{{url('Dashboard')}}">
                            <i class="fa-solid fa-arrow-rotate-left"></i>
                        </a>
                    </div>
                </div>
                 <!-- -----------end  section 1-----------  -->
                <div class="row">
                    <div class="col-md-7 col-lg-7 col-12">
                         <!-- -----------this is section 2 "table"-----------  -->
                        <div class="box1">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-12 col-lg-5 d-flex mb-4">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                     </span>
                                     <select name="client_id" id="">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <span>
                                        <i class=" blue fa-solid fa-circle-plus"></i>
                                    </span>
                                </div>
                                <div class="col-md-7 col-lg-6 col-7 d-flex justify-content-end mb-4">
                                    <span>
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                     </span>
                                     <select name="" id="">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <span>
                                        <i class=" blue fa-solid fa-circle-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-capitalize">
                                                <th scope="col">
                                                    Product
                                                    <i class=" baby-blue fa-solid fa-circle-info"></i>
                                                </th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price inc. tax</th>
                                                <th scope="col">Subtotal</th>
                                                <th scope="col"><i class=" close fa-solid fa-xmark"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row">
                                                     <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-model" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            proudact name
                                                            <i class=" baby-blue fa-solid fa-circle-info"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td>
                                                    <!-- this is Quantity -->
                                                    <div class="qty-input d-flex">
                                                        <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                                        <input class="product-qty form-control" type="number" name="product-qty" min="0" value="1">
                                                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                                    </div>
                                                    <!-- end Quantity -->
                                                    <div class="mt-3">
                                                        <select name="" id="" class="selc">
                                                            <option value="volvo">prices</option>
                                                            <option value="saab">Saab</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control price">
                                                </td>
                                                <td class="sub-total">
                                                    $1235
                                                </td>
                                                <td>
                                                    <i class="mt-3 red close fa-solid fa-xmark"></i>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- ---------- end section 2 "table" ---------- -->
                        <!-- ---------- this is total section ---------- -->
                        <div class="white">
                             <div class="row">
                                 <div class="col-md-4 col-12 col-lg-4 mb-3">
                                      <span class="text-capitalize">العدد :</span>
                                      <span>7</span>
                                 </div>
                                 <div class="col-md-8 col-12 col-lg-8 mb-3">
                                      <span class="text-capitalize">total : </span>
                                      <span>140.57</span>
                                 </div>
                                 <div class="col-md-4 col-12 col-lg-4 mb-3">
                                      <span>
                                        Discount (-) <i class=" baby-blue fa-solid fa-circle-info"></i> :
                                      </span>
                                      <span class="text-capitalize">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        1460
                                      </span>
                                 </div>
                                 <div class="col-md-4 col-12 col-lg-4 mb-3">
                                      <span class="text-capitalize">
                                        Order Tax (+) :
                                      </span>
                                      <span>
                                        <i class=" baby-blue fa-solid fa-circle-info"></i>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        0.00
                                      </span>
                                 </div>
                                 <div class="col-md-4 col-12 col-lg-4 mb-3">
                                      <span class="text-capitalize">
                                        Order Tax(+) :
                                      </span>
                                      <span class="text-capitalize">
                                        <i class=" baby-blue fa-solid fa-circle-info"></i>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        0.00
                                      </span>
                                 </div>
                             </div>
                        </div>
                    </div>
                    <!-- ---------- end total section ---------- -->

                    <!-- ---------- this is categories ---------- -->
                    <div class="col-md-5 col-lg-5 col-12">
                        <div class="box2">
                            <div class="my-4">
                                <select class="form-control js-example-basic-single category_id" name="category_id" >
                                    @foreach(\App\Models\Category::all() as $Cat)
                                        <option value="{{$Cat->id}}" >{{$Cat->ar_title}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="row scroll-y" id="post-data">
                            @include('admin.posdata')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-lg-6 col-12">
                        <p class="green">
                            <i class="fa-solid fa-money-bill-1"></i>
                            cash
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 d-flex justify-content-end">
                        <p class="color-p">
                            Total Payable
                            <span class="d-block">2.546546564</span>
                        </p>
                    </div>
                </div>
            </div>














            <script src="{{asset('pos/assets/js/jquery-3.6.1.min.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="{{asset('pos/assets/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('pos/assets/js/script.js')}}"></script>


        <script>
            $(".category_id").change(function () {
                var category_id = $(this).val();
                if (category_id != '') {
                    $.ajax({
                        type: "GET",
                        url: "{{url('POSProducts')}}",
                        data: {'category_id': category_id

                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        },
                        success: function (data) {
                            $("#post-data").html(data);
                        }
                    })
                }
            });

        </script>


        </body>
    </html>
