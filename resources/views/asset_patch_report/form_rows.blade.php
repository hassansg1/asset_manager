@foreach($items as $asset)
    @foreach(getAssetPatches($asset->id) as $patch)
        @if(!checkIfPatchInstalled($asset,$patch))
            <tr id="{{ $asset->id }}">
                @php($app = getApprovedStatus($asset,$patch))
                <td colspan="1"><input
                        data-type="{{ $route ?? '' }}"
                        data-asset="{{ $asset->id }}_{{ $patch->id }}"
                        {{ count($app['pending']) > 0 ? 'disabled' : '' }} type="checkbox"
                        name="select_row" value="{{ $patch->id }}"
                        id="select_check_{{ $asset->id }}" class="select_row select_patch"></td>
                <td>{{ $asset->name ?? '' }}</td>
                <td>{{ $patch->software->name ?? '' }}</td>
                <td>{{ $patch->name  ?? '' }}</td>
                <td style="color: {{ $app['status'] == "Yes" ? 'green' : 'red' }}">{{ $app['status'] }}
                    <br>
                    <br>
                    <span style="color: green;background-color: #e4ece4;">
                    Approved :
                    @foreach($app['approved'] as $approved)
                            {{ $approved->name }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                    <br>
                    <span style="color: red;background-color: #f4dfdf;">
                      Pending :
                    @foreach($app['pending'] as $pending)
                            {{ $pending->name }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                  </span>
                </td>
            </tr>
        @endif
    @endforeach
@endforeach
