@foreach($Products as $Storage)
    <option value="{{$Storage->Shape->id}}">{{$Storage->Shape->ar_title}}  :  ( {{$Storage->quantity}} )</option>
@endforeach
