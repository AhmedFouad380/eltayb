@foreach($Products as $Storage)
<option value="{{$Storage->Product->id}}">{{$Storage->Product->ar_title}} </option>
@endforeach
