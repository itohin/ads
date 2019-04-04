<div class="form-group">
    <label for="category" class="control-label">Category</label>
    <select name="category_id" id="category" class="form-control"{{ isset($listing) && $listing->isLive() ? ' disabled="disabled"' : '' }}>
        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                    @if (isset($listing) && $listing->category->id == $child->id || old('category_id') == $child->id)
                        <option value="{{ $child->id }}" selected="selected">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @else
                        <option value="{{ $child->id }}">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @if ($errors->has('category_id'))
        <span class="form-text">{{ $errors->first('category_id') }}</span>
    @endif
</div>