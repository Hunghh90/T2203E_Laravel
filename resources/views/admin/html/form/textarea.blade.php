<div class="form-group">
    <label for="exampleInputEmail1">{{$label}}</label>
    <textarea class="@error($key)is-invalid @enderror form-control" name="{{$key}}" @if($required) required  @endif>{{$product->depcription}}</textarea>
    @error($key)
    <p class = "text-danger">{{$message}}</p>
    @enderror
</div>
