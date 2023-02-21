<div class="form-group">
    <label for="exampleInputEmail1">{{$label}}</label>
    <input type="{{$type}}" class="@error("$key")is-invalid @enderror form-control" value="{{isset($value)?$value:old("$key")}}" name="{{$key}}" @if($required) required @endif  >
    @error("$key")
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
