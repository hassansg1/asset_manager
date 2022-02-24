<tr id="{{ $item->id }}">
{{--    <td colspan="1"><input type="checkbox" name="select_row"--}}
{{--                           value="{{ $item->id }}"--}}
{{--                           id="select_check_{{ $item->id }}" class="select_row">--}}
{{--    </td>--}}
    <td style="width:50px;padding-left: {{ $padding }}px">{{ $item->number }}</td>
    <td>{{ $item->title }}</td>
    <td>{{ substr($item->description,0,20) }}</td>
{{--    <td>--}}
{{--        @include('components.edit_delete_button')--}}
{{--    </td>--}}
</tr>
@php($childs = $item->childs)
@if(count($childs) > 0)
    @php($padding = $padding + 40)
    @foreach($childs as $child)
        @include('tree_files.clause_table',['item' => $child,'padding' => $padding])
    @endforeach
@endif
