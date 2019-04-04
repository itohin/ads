<div class="form-group">
    <label for="region" class="control-label">Region</label>
    <select name="region_id" id="region" class="form-control">
        @foreach ($regions as $country)
            <optgroup label="{{ $country->name }}">
                @foreach ($country->children as $state)
                    <optgroup label="{{ $state->name }}">
                        @foreach ($state->children as $child)
                            @if (
                                isset($listing) && $listing->region->id == $child->id ||
                                !isset($listing) && $region->id == $child->id && !old('region_id') ||
                                old('region_id') == $child->id
                            )
                                <option value="{{ $child->id }}" selected="selected">{{ $child->name }}</option>
                            @else
                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @if ($errors->has('region_id'))
        <span class="form-text">{{ $errors->first('region_id') }}</span>
    @endif
</div>