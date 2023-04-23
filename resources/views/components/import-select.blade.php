@props(['data','name'])
<option value="0">No Column Selected</option>
@foreach ($data as $item =>$value)
    <option value="{{$item}}" {{$name==$item?'selected':''}}>{{$item."(".$value.")"}}</option>
@endforeach