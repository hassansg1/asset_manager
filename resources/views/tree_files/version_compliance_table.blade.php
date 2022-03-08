<tr id="{{ $item->id }}">
    <td style="padding-left: {{ $padding }}" data-id="{{ $item->id }}"
        class="{{ $item->applicable ? 'details-control' : '' }}">
        @if($item->applicable)
            <span title="View Compliance by Locations" style="cursor: pointer;color: #337ab7"
                  class="fas fa-eye icon_{{ $item->id }}"></span>
        @endif
        {{ $item->number ?? '' }} {{ !$item->applicable ? '(Not Applicable)' : '' }}
    </td>
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
        @include('tree_files.version_compliance_table',['item' => $child,'padding' => $padding])
    @endforeach
@endif

