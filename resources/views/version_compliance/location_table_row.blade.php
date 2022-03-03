<tr class="parent_row" id="compl_{{ $location->id }}{{$item_id}}">
    <td>
        {{ $location->long_name }}
    </td>
    <td>
        {{ isset($dt) ? \App\Models\ClauseData::getLabel($dt->compliant) : '-' }}
    </td>
    <td>
        {!! descriptionWrapText($dt->comment ?? '-',50) !!}
    </td>
    <td>
        @isset($dt)
            @foreach($dt->attachments as $attachment)
                @foreach($attachment->attachment->attachmentItems as $attachmentItem)
                    <a target="_blank"
                       href="{{ $attachmentItem->fileLink() }}">{{ $attachment->attachment->title ?? '' }}</a>
                    <br>
                @endforeach
            @endforeach
            @if($dt->link)
                <a target="_blank"
                   href="{{ $dt->link ?? '' }}">{{ $dt->link ?? '' }}</a>
                <br>
            @endif
        @endif
    </td>
    <td>
        <button onclick="showCompliancePopup('{{$location->id}}','{{$item_id}}','{{ $versionId }}')"
                class="btn btn-primary">
            Update
        </button>
        <button onclick="showCompliancePopup('{{$location->id}}','{{$item_id}}','{{ $versionId }}',true)"
                class="btn btn-primary">View
        </button>
    </td>
</tr>
