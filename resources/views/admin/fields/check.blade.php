<div>
    @if(isset($field['label']))
        <p>{{ $field['label'] }}</p>
    @endif
        <input type="hidden" name="{{ $field['name'] }}" value="0">
    <label>
        <input
            name="{{ $field['name'] }}"
            type="checkbox"
            value="1"
            @if(isset($entry) && $entry->{$field['name']}) checked @endif
        >
    </label>
</div>
