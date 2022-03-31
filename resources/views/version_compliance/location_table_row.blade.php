<tr class="parent_row" id="compl_{{ $location->id }}{{$item_id}}">
    <td class="compl_name">
        {{ $location->long_name }}
    </td>
    <td class="compl_compliant">
        {{ isset($dt) ? \App\Models\ClauseData::getLabel($dt->compliant) : '-' }}
    </td>
    <td class="compl_comment">
        <iframe style="width: 100%;height: 300px" src="{{ url('getCommentIframe/'.$dt->id) }}">
        </iframe>
    </td>
    <td class="compl_attachment">
        @isset($dt)
            @php($count = 0)
            @foreach($dt->attachments as $attachment)
                @foreach($attachment->attachment->attachmentItems as $attachmentItem)
                    @php($count += 1)
                    <a title="{{ $attachment->attachment->title }}" target="_blank"
                       href="{{ $attachmentItem->fileLink() }}">
                        <i class="fas fa-paperclip"></i><sup>{{ $count }}</sup>
                    </a>
                @endforeach
            @endforeach
            @if($dt->link)
                <a target="_blank"
                   href="{{ $dt->link ?? '' }}">
                    <i class="fas fa-paperclip"></i><sup>{{ $count + 1 }}</sup>
                </a>
                <br>
            @endif
        @endif
    </td>
    <td>
        @if(!$version->closed)
            <button onclick="showCompliancePopup('{{$location->id}}','{{$item_id}}','{{ $versionId }}')"
                    class="btn btn-primary">
                Update
            </button>
        @endif
        <button onclick="showCompliancePopup('{{$location->id}}','{{$item_id}}','{{ $versionId }}',true)"
                class="btn btn-primary">View
        </button>
    </td>
</tr>
