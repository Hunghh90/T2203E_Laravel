
<div class="form-group">
    <label>{{$label}}</label>
    <select  class="@error($key)is-invalid @enderror select2 form-control" name="{{$key}}" required>
        @foreach($categories as $item)
            <option @if($product->category_id==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
        @error($key)
        <p class="text-danger">{{$message}}</p>
        @enderror
    </select>
</div>
