@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        <td>
            @if($item->user_id_assets && $item->parent == "asset")
                <i>AST:</i> {{ $item->user_id_assets->rec_id }}
            @elseif($item->user_id_systems && $item->parent == "system")
                <i>SYS:</i> {{ $item->user_id_systems->name }}
            @else

            @endif
        </td>
        <td>{{ $item->user_id }}</td>
        <td>
            @foreach(\App\Models\UserRight::where('parent_id', $item->id)->get() as $function)
                @if($function->rights_name)
                    {{  $function->rights_name->name }}<br>

                @else

                @endif
            @endforeach
        </td>
        <td>{{ ucfirst($item->condition) }}</td>
<td>
    @include('components.edit_delete_button')
</td>
</tr>
@endforeach
