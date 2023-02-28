@props(['selects','name','id','key'])
<select name="{{ $name }}" id="{{ $id }}" class="w-full text-justify rounded">
{{--     @foreach ($selects as $select)
        <option value="{{ $select->id }}">{{ $select[$key] }}</option>
    @endforeach --}}
</select>