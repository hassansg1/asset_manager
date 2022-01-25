@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->patch->show_name }}</td>
        @if(!isset($request->software_id))
            <td>
                @php($ids = explode(',',$item->ids))
                @foreach(explode(',',$item->softwares) as $software)
                    <input
                        data-type="delete_patch_software_approved"
                        type="checkbox" name="select_row" value="{{ $ids[$loop->index] }}"
                        id="select_check_{{ $ids[$loop->index] }}" class="select_row">
                    {{ $software }}
                    <br>
                @endforeach
            </td>
        @endif
    </tr>
@endforeach
