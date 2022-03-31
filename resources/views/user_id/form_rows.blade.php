@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        <td>{{ $item->user_id }}</td>
        <td>
                @if($item->parent == "asset")
                    <i>AST:</i> {{ $item->user_id_assets->rec_id }}
                @elseif($item->parent == "system")
                    <i>SYS:</i> {{ $item->user_id_systems->name }}
                @endif
</td>
        <td>
            @foreach(\App\Models\UserRight::where('parent_id', $item->id)->get() as $function)
                @if($function)
                    {{  $function->rights_name->name }},
                @else
                    {{}}
                @endif
            @endforeach
        </td>
<td>
    @include('components.edit_delete_button')
</td>
</tr>
@endforeach
