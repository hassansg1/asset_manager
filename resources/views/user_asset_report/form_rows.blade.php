@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @if($item->user_accounts)
            <td>{{ $item->user_accounts->user->name }}</td>
        @else
            <td></td>
        @endif
        <td>{{ $item->user_id }}</td>
{{--        <td >--}}
{{--            @if($item->parent == "system")--}}
{{--            {{ $item->user_id_systems->name }}--}}
{{--            @endif--}}
{{--        </td>--}}
        <td>
            @if($item->parent == "asset")
                @if($item->user_id_assets)
                <span class="badge bg-primary" style="padding: 1px">{{ $item->user_id_assets->rec_id }}</span>
                @endif
            @elseif($item->parent == "system")
                @foreach(getSystemAssets($item->user_id_systems->id) as $system_asset)
                    @if($item->system_assets)
                    <span class="badge bg-success" style="margin-top: 1px;padding: 1px">{{$system_asset->system_assets->rec_id}}</span><br>
                    @endif
                @endforeach
            @endif
        </td>
            <td>
                @foreach(\App\Models\UserRight::where('parent_id', $item->id)->get() as $function)
                    @if($function->rights_name)
                        {{  $function->rights_name->name }},<br>
                    @else

                    @endif
                @endforeach
            </td>
    </tr>
@endforeach
