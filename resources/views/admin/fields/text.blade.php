<div>
    @if(isset($field['label']))
        <p>{{ $field['label'] }}</p>
    @endif
        <label>
            <input
                name="{{ $field['name'] }}"
                type="text"
                @if(isset($entry)) value="{{ $entry->{$field['name']} }}" @endif
            >
        </label>
</div>
