<div class="form-group">
    <label for="region" class="control-label">Region</label>
    <select name="region_id" id="region" class="form-control">
        @foreach ($regions as $country)
            <optgroup label="{{ $country->name }}">
                @foreach ($country->children as $state)
                    <optgroup label="{{ $state->name }}">
                        @foreach ($state->children as $child)
                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>