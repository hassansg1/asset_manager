@foreach($items as $item)
    @foreach(getPatchAssets($item) as $asset)
        @if(checkIfPatchInstalled($asset,$item))
            <tr id="{{ $item->id }}">
                <td>{{ $item->software->name ?? '' }}</td>
                <td>{{ $item->name ?? '' }}</td>
                <td>{{ $asset->name  ?? '' }}</td>
            </tr>
        @endif
    @endforeach
@endforeach
