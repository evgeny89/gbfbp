<div>
    @if(isset($field['label']))
        <p>{{ $field['label'] }}</p>
    @endif
        <label>
            <select name="{{ $field['name'] }}">
                @foreach($field['values'] as $value)
                    <option
                        value="{{ $value->id }}"
                        @if(isset($entry) && $entry->{$field['name']} === $value->id) selected @endif
                    >{{ $value->name }}</option>
                @endforeach
            </select>
        </label>
</div>
