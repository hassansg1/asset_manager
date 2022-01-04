@foreach($items as $item)
    @foreach(getPatchAssets($item) as $asset)
        @if(!checkIfPatchInstalled($asset,$item))
            <tr id="{{ $item->id }}">
                @php($app = getApprovedStatus($asset,$item))
                <td colspan="1"><input data-asset="{{ $item->id }}_{{ $asset->id }}"
                                       {{ count($app['pending']) > 0 ? 'disabled' : '' }} type="checkbox"
                                       name="select_row" value="{{ $item->id }}"
                                       id="select_check_{{ $item->id }}" class="select_row select_patch"></td>
                <td>{{ $item->software->name ?? '' }} {{ $item->name ?? '' }}</td>
                <td>{{ $asset->name  ?? '' }}</td>
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
                <td>
                    <button
                        {{ count($app['pending']) > 0 ? 'disabled' : '' }} onclick="applyPatch('{{ $item->id }}','{{ $asset->id }}')"
                        class="btn btn-primary">Apply Patch
                    </button>
                </td>
            </tr>
        @endif
    @endforeach
@endforeach
