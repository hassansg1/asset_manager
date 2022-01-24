@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1">
            <input type="checkbox"
                   data-type="{{ $route ?? '' }}"
                   name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}"
                   class="select_row"></td>
        <td>{{ $item->parentName }}</td>
        <td>{{ $item->rec_id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->description }}</td>
        <td>
            @include('computer.partials.asset_install_btns')
        </td>
        <td>
            @include('components.edit_delete_button_asset',['assetString' => 'assets'])
        </td>
    </tr>
@endforeach
