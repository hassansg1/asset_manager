<tr class="parent_row" id="compl_{{ $location->id }}{{$item_id}}">
    <td class="compl_name">
        {{ $location->long_name }}
    </td>
    <td class="compl_compliant">
        {{ isset($dt) ? \App\Models\ClauseData::getLabel($dt->compliant) : '-' }}
    </td>
    <td class="compl_comment">
        {!! descriptionWrapText($dt->comment ?? '-',20) !!}
    </td>
    <td class="compl_attachment">
        @isset($dt)
            @foreach($dt->attachments as $attachment)
                @foreach($attachment->attachment->attachmentItems as $attachmentItem)
                    <a target="_blank"
                       href="{{ $attachmentItem->fileLink() }}">
                        {!! descriptionWrapText($attachment->attachment->title ?? '-',20) !!}
                    </a>
                    <br>
                    <br>
                @endforeach
            @endforeach
            @if($dt->link)
                <a target="_blank"
                   href="{{ $dt->link ?? '' }}">
                    {!! descriptionWrapText($dt->link ?? '',20,"") !!}
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
