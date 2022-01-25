@foreach($items as $item)
    @php($found = 0)
    <tr id="{{ $item->id }}">
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->name ?? '' }}</td>
        <td>
            <ul>
                @foreach(getPatchAssets($item) as $asset)
                    @if(checkIfPatchInstalled($asset,$item))
                        @php($found = 1)
                        <li>
                            {{ $asset->name  ?? '' }}
                        </li>
                    @endif
                @endforeach
                @if(!$found)
                    -
                @endif
            </ul>
        </td>
    </tr>
@endforeach
