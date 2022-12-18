@foreach($Products as $Product)
    <div class="col-md-4 col-lg-3 col-12">
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
