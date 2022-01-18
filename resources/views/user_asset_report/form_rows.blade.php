@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->user_accounts->user->name }}</td>
        <td>{{ $item->user_id }}</td>
{{--        <td >--}}
{{--            @if($item->parent == "system")--}}
{{--            {{ $item->user_id_systems->name }}--}}
{{--            @endif--}}
{{--        </td>--}}
        <td>
            @if($item->parent == "asset")
                <span class="badge bg-primary" style="padding: 1px">{{ $item->user_id_assets->rec_id }}</span>
            @elseif($item->parent == "system")
                @foreach(getSystemAssets($item->user_id_systems->id) as $system_asset)
                    <span class="badge bg-success" style="margin-top: 1px;padding: 1px">{{$system_asset->system_assets->rec_id}}</span><br>
                @endforeach
            @endif
        </td>
        <td>{{ $item->user_rights_id->rights_name->name }}</td>
    </tr>
@endforeach
