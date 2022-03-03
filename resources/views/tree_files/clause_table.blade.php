<tr id="{{ $item->id }}">
    <td style="width:50px;padding-left: {{ $padding }}px">{{ $item->number }}</td>
    <td>
        {!!descriptionWrapText($item->title,50)!!}
    </td>
    <td>
        {!!descriptionWrapText($item->description,50)!!}
    </td>
</tr>
@php($childs = $item->nodes ?? [])
@if(count($childs) > 0)
    @php($padding = $padding + 40)
    @foreach($childs as $child)
        @include('tree_files.clause_table',['item' => $child,'padding' => $padding])
    @endforeach
@endif
