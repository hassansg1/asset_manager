@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input
                {{ !$item->is_critical ? 'disabled' : '' }}
                data-type="{{ $route ?? '' }}"
                data-software="{{ $item->software->id ?? null }}"
                type="checkbox" name="select_row" value="{{ $item->id }}"
                id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->name ?? '' }}</td>
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->software->version ?? '' }}</td>
        <td>{{ $item->software->vendor->name ?? '' }}</td>
        <td>{{ $item->release_date ?? '' }}</td>
        <td>{{ $item->article ?? '' }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
