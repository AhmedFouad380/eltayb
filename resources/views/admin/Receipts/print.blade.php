<html dir="rtl">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

<body>
<!--begin::Entry-->
    <!--begin::Container-->
    <!--begin::Container-->
    <div class="">
        <!--begin::Card-->
            <div class="" id="content_2">
                <form class="px-12" novalidate="novalidate" id="kt_form" method="get"
                      action="#" enctype="multipart/form-data">

                    <div class="col-sm-12 row">
                        <div class="row" style="position: absolute; right:15%">
                            <div class="col-md-4" style="text-align: right; padding: 0px;  display:inline;width: 300px;float:right;">
                                <img src="{{$settings->logo}}" alt="{{$settings->name}}" style="width: 208px; height: 70px">
                                {{--                                <label style="font-size: 18px;font-weight: bold">{{$settings->name}}</label>--}}

                            </div>
                            <div class="col-md-4"  style="position: absolute; right:30%">
                                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(url('/'), 'QRCODE',4,4)}}"
                                     alt="barcode"/>

                            </div>
                            <div class="col-md-4"   style="position: absolute; right:60%">
                                <label style="font-size: 18px;font-weight: bold">التاريخ : </label>
                                <label
                                    style="font-size: 18px;font-weight: bold">  {{ $hijri_date }}
                                </label> هـ <br>
                                <label
                                    style="font-size: 18px;font-weight: bold">{{Carbon\Carbon::parse($User->created_at)->format('Y/m/d')}}</label>
                                م <br>
                                <label style="font-size: 18px;font-weight: bold">رقم السند : </label>
                                <label
                                    style="font-size: 18px;font-weight: bold;padding-left: 47px">{{$User->id}}</label><br>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <br><br><br>
                    <br>
                    <div class="col-lg-12" style="text-align: center">
                        <h3 style="font-size: 18px;font-weight: bold;">@if($User->type == 'income') سند قبض @else سند صرف @endif  </h3>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"  style="width: 20%; right: 10%"  >استلمنا من السيد/ـه: </label>
                        <div class="col-lg-9 col-xl-9"   style="width: 80%; right: 20%">
                            @inject('client','App\Models\Client')
                            <input type="text" value="{{$client->find($id)->name}}" disabled class="form-control form-control-solid"  required placeholder="" >
                        </div>
                    </div>

                    <br>
                    @if($client->find($id)->tax_num != null)
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"  style="width: 20%; right: 10%"  >رقم ضريبي : </label>
                        <div class="col-lg-9 col-xl-9"   style="width: 80%; right: 20%">
                            @inject('client','App\Models\Client')
                            <input type="text" value="{{$client->find($id)->tax_num}}" disabled class="form-control form-control-solid"  required placeholder="" >
                        </div>
                    </div>
                    <br>
                    @endif
                    <!--begin: Wizard Step 1-->
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label" style="width: 20%; right: 10%" >  مبلغ و قدرة  </label>
                        <div class="col-lg-3 col-xl-3 col-sm-3"  style="width: 30%; right: 20%" >
                            <input type="number" id="txt" disabled class="form-control form-control-solid" value="{{$User->price}}" name="price" required placeholder="{{__('lang.price')}}" >
                        </div>



                        <label class="col-xl-1 col-lg-1 col-sm-1 col-form-label"  style="width: 10%; right: 50%"  > كتابة :  </label>
                        <div class="col-lg-5 col-xl-5 col-sm-5" style="width: 40%; right: 70%">
                            <input type="text" id="demo" disabled class="form-control form-control-solid" name="price" required  >
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"  style="width: 20%; right: 10%"  > {{__('lang.pay_type')}}: </label>
                        <div class="col-lg-9 col-xl-9"   style="width: 80%; right: 20%">
                            <input type="text"  disabled class="form-control form-control-solid" value="{{__('lang.'.$User->pay_type)}}" required placeholder="" >
                        </div>
                    </div>
                    <br>
                    @if($User->pay_type == 'network')
                    <div id="networkInputs" >
                        <div class="form-group row">
                            <label class="col-xl-1 col-lg-1 col-form-label"  style="width: 20%; right: 10%"> {{__('lang.network_num')}}</label>
                            <div class="col-lg-3 col-xl-3"  style="width: 20%; right: 20%">
                                <input type="text" disabled class="form-control form-control-solid" name="network_date" value="{{$User->network_num}}"  placeholder="{{__('lang.network_num')}}" >
                            </div>

                            <label class="col-xl-1 col-lg-1 col-form-label"  style="width: 10%; right: 30%" > {{__('lang.date')}}</label>
                            <div class="col-lg-3 col-xl-3"  style="width: 20%; right: 30%" >
                                <input type="text" disabled class="form-control form-control-solid" value="{{\Carbon\Carbon::parse($User->date)->format('Y-m-d')}}" name="network_date"  placeholder="{{__('lang.date')}}" >
                            </div>
                            <label class="col-xl-1 col-lg-1 col-form-label"  style="width: 10%; right: 60%" > {{__('lang.time')}}</label>
                            <div class="col-lg-3 col-xl-3"  style="width: 20%; right: 30%">
                                <input type="text" disabled class="form-control form-control-solid" value="{{\Carbon\Carbon::parse($User->date)->format('H:i')}}" name="network_date"  placeholder="{{__('lang.date')}}" >
                            </div>
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"  style="width: 20%; right: 10%" > وذلك مقابل </label>
                        <div class="col-lg-9 col-xl-9" style="width: 80%; right: 20%">
                            <textarea rows="6" disabled class="form-control" name="note">{{$User->note}}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <br>
                        <br>
                        <br>
                        <br>
                        <label style="font-size: 13px;font-weight: bold;padding-right: 50px" class="col-4">
                            المستلم </label>
                        </label>
                        <label style="font-size: 13px;font-weight: bold;padding-right: 110px"
                               class="col-4">المدير العام </label>
                        <label style="font-size: 13px;font-weight: bold;padding-right: 110px"
                               class="col-4">الختم </label>


                    </div>
                    <br>

                </form>
            </div>

        <!--end::Card-->
    </div>
<script src="{{asset('front/Tafqeet.js')}}"></script>
<script>
    function main (){
        var fraction = document.getElementById("txt").value.split(".");

        if (fraction.length == 2){
            document.getElementById ("demo").value =  tafqeet (fraction[0]) + " فاصلة " + tafqeet (fraction[1]) + 'ريال  فقط لاغير ';
        }
        else if (fraction.length == 1){
            document.getElementById ("demo").value =  tafqeet (fraction[0]) + ' ريال  فقط لاغير ';
        }
    }
    main();
    window.print();
</script>
    <!--end::Container-->
</body>

</html>

