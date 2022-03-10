@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1">

            <input
                {{ !$item->is_critical ? 'disabled' : '' }}
                data-type="{{ $route ?? '' }}"
                data-software="{{ $item->software->id ?? null }}"
               @if($item->software)
                data-show_name="{{ $item->show_name ?? null }}"
                @endif
                type="checkbox" name="select_row" value="{{ $item->id }}"
                id="select_check_{{ $item->id }}" class="select_row select_patch_cb">
        </td>
        <td>{{ $item->name ?? '' }}</td>
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->software->version ?? '' }}</td>
        <td>{{ $item->software->vendor->name ?? '' }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
        <td>
            {{ $item->release_date ?? '' }}
        </td>
        <td>{{ $item->article ?? '' }}</td>
    </tr>
@endforeach
