@foreach($items as $item)
    @php($found = 0)
    <tr id="{{ $item->id }}">
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->name ?? '' }}</td>
        <td>
            @foreach(getPatchAssets($item) as $asset)
                @if(!checkIfPatchInstalled($asset,$item))
                    @php($app = getApprovedStatus($asset,$item))
                    @php($found = 1)
                    <input
                        data-type="{{ $route ?? '' }}"
                        data-asset="{{ $item->id }}_{{ $asset->id }}"
                        {{ count($app['pending']) > 0 ? 'disabled' : '' }} type="checkbox"
                        name="select_row" value="{{ $asset->id }}"
                        id="select_check_{{ $item->id }}" class="select_row select_patch">
                    {{ $asset->name  ?? '' }}
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
                    <br>
                    <br>
                @endif
            @endforeach
            @if(!$found)
                -
            @endif
        </td>
    </tr>
@endforeach
