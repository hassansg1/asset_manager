<div class="table-responsive">
    <table class="table mb-0" id="location_table">
        <thead class="table-light">
        <tr>
            <th>Location Name</th>
            <th>Compliant</th>
            <th>Comment</th>
            <th>Attachment ID</th>
            <th>Attachment Url</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="item" id="item" class="form-control" value="{{$item_id}}">
        @foreach($locations as $location)
            @php
                $dt = getComplianceStatus($versionId,$item_id,$location->id)
            @endphp
            <tr class="parent_row">
                <input type="hidden" name="location_id" id="location_id" class="form-control location_id"
                       value="{{$location->id}}">
                <td>
                    {{ $location->show_name }}
                </td>
                <td>
                    <select class="form-control" name="compliant" id="compliant"
                            onchange="updateCompliant('{{ $location->id }}', this,'{{ $versionId }}','{{ $item_id }}')">
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_ALL ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_ALL }}">
                            Select Compliant
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_YES ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_YES }}">
                            Yes
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_NO ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NO }}">
                            No
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_UNDER_PROCESS ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_UNDER_PROCESS }}">
                            Under Process
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_NOT_EVALUATED ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NOT_EVALUATED }}">
                            Not Evaluated
                        </option>
                    </select>
                </td>
                <td>
                    <textarea
                        onfocusout="updateComment('{{ $location->id }}', this,'{{ $versionId }}','{{ $item_id }}')"
                        class="form-control"
                        name="comment" id="comment" cols="30" rows="10">{{ $dt->comment ?? '' }}</textarea>
                </td>
                <td>
                    <select class="form-control select2" name="attachment_id" id="attachment_id"
                            onchange="updateComplianceVersionItemsAttachmentId('{{ $location->id }}', this,'{{ $versionId }}','{{ $item_id }}')"
                            multiple>
                        <option value="">-Select Document-</option>
                        @foreach(getAttchments() as $attachment)
                            <option
                                {{ isset($dt->attachments) && in_array($attachment->id,$dt->attachments->pluck('attachment_id')->toArray()) ? 'selected' : '' }}
                                value="{{$attachment->id}}">
                                {{$attachment->title}}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input value="{{ $dt->link ?? '' }}" type="text" name="link" id="comment" class="form-control"
                           onfocusout="updateLink('{{ $location->id }}', this,'{{ $versionId }}','{{ $item_id }}')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
