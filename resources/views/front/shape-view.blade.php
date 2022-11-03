@if($data->Product->is_discount == 'active')

    <span data-shape="{{$data->id}}"class="current-price text-brand">{{ $data->StorageAvaliable->sell_price - (( $data->StorageAvaliable->sell_price * $data->discount_value ) / 100 ) }}</span>
    <span>
                                                          <span class="save-price font-md color3 ml-15">{{$data->Product->discount_value}}% Off</span>
                                                          <span class="old-price font-md ml-15">{{$data->StorageAvaliable->sell_price}}</span>
                                                     </span>
@else
    <span class="current-price text-brand">{{$data->StorageAvaliable->sell_price }}</span>
@endif
