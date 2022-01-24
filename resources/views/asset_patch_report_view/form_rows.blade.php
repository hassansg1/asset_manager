@foreach($items as $asset)
    @foreach(getAssetPatches($asset->id) as $patch)
        @if(checkIfPatchInstalled($asset,$patch))
            <tr id="{{ $asset->id }}">
                <td>{{ $asset->name ?? '' }}</td>
                <td>{{ $patch->software->name ?? '' }}</td>
                <td>{{ $patch->name  ?? '' }}</td>
            </tr>
        @endif
    @endforeach
@endforeach
