@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input
                data-type="{{ $route ?? '' }}"
                type="checkbox" name="select_row" value="{{ $item->id }}"
                id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->version }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->vendor->name ?? '' }}</td>
        <td>
            @if($item->approval_required)
                @include('software.partials.approval_btns')
            @else
                Not Required
            @endif
        </td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
