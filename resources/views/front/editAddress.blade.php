<form id="" class="form" method="post" action="{{url('update-Address')}}">
@csrf
<!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7"
         id="kt_modal_add_user_scroll" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}"
         data-kt-scroll-max-height="auto"
         data-kt-scroll-dependencies="#kt_modal_add_user_header"
         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
         data-kt-scroll-offset="300px">

        <!--begin::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">{{__('lang.name')}}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="name" value="{{$data->name}}"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="{{__('lang.name')}}"  required/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->  <!--begin::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">{{__('lang.address')}} </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="address" value="{{$data->address}}"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="{{__('lang.address')}}"
            />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2"> {{__('lang.building_num')}}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="building_num" id="building_num"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="{{__('lang.building_num')}}" value="{{$data->building_num}}" required/>
            <!--end::Input-->
            <span id="error-validation" style="color:red"></span>
        </div>

        <div class="form-group">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2"> {{__('lang.floor_num')}}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="floor_num"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder=" {{__('lang.floor_num')}}" value="{{$data->floor_num}}" required/>
            <!--end::Input-->
        </div>

        <!--end::Input group-->
        <div class="">
            <label>{{__('lang.location on map')}} </label>
            <input type="text" id="search_input2" placeholder=" {{__('lang.search')}}"/>
            <input type="hidden" id="information"/>
            <div id="us12" style="width: 100%; height: 400px;"></div>

        </div>
    <?php

    $lat = !empty($data->lat) ? $data->lat : '24.69670448385797';
    $lng = !empty($data->lng) ? $data->lng : '46.690517596875';

    ?>
    <!--begin::Form Group-->

        <input type="hidden" value="{{$lat}}" id="lat2" name="lat">
        <input type="hidden" value="{{$lng}}" id="lng2" name="lng">

    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" style="background-color:#787878"
                data-bs-dismiss="modal">ألغاء
        </button>
        <button type="submit" class="btn btn-primary me-3" style="background-color: #386dc2"
                data-kt-users-modal-action="submit">
            <span class="indicator-label">حفظ</span>
        </button>
    </div>
    <!--end::Actions-->
</form>
    <script>
        var map; //Will contain map object.
        var marker = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap() {

            //The center location of our map.
            var centerOfMap = new google.maps.LatLng({{$data->lat}}, {{$data->lng}});

            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 7 //The zoom value.
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('us12'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                    });
                    //Listen for drag events!
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat2').value = currentLocation.lat(); //latitude
            document.getElementById('lng2').value = currentLocation.lng(); //longitude
        }


        //Load the map when the page has finished loading.
        google.maps.event.addDomListener(window, 'load', initMap);



</script>
