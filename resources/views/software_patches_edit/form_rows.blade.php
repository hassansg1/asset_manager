@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input
                {{ checkIfPatchPolicyCanBeDeleted($item->software->id,$item->patch->id) ? 'disabled' : '' }}
                data-type="{{ $route ?? '' }}"
                type="checkbox" name="select_row" value="{{ $item->id }}"
                id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->patch->software->name ?? '' }} {{ $item->patch->name ?? '' }}</td>
    </tr>
@endforeach
