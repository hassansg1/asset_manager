<div class="modal-content">
    <form id="complianceForm" action="{{ url('submitCompliance') }}" name="submit_compliance_form" method="POST">
        <input type="hidden" name="id" value="{{ $compliance->id ?? '' }}">
        <input type="hidden" name="location_id" id="location_id" value="{{ $request->locationId }}">
        <input type="hidden" name="clause_id" id="clause_id" value="{{ $request->clauseId }}">
        <input type="hidden" name="compliance_version_id" id="compliance_version_id"
               value="{{ $request->versionId }}">
        {{ csrf_field() }}
        <div class="modal-header">
            @include('version_compliance.partials.title')
        </div>
        <div class="modal-body default_modal_body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="compliant" class="form-label required">Compliant</label>
                                        <select class="form-control" name="compliant" id="compliant" required>
                                            <option
                                                value="">
                                                Select Compliant
                                            </option>
                                            <option
                                                {{ isset($compliance) && $compliance->compliant == App\Models\ClauseData::COMPLIANT_YES ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_YES }}">
                                                Yes
                                            </option>
                                            <option
                                                {{ isset($compliance) && $compliance->compliant == App\Models\ClauseData::COMPLIANT_NO ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NO }}">
                                                No
                                            </option>
                                            <option
                                                {{ isset($compliance) && $compliance->compliant == App\Models\ClauseData::COMPLIANT_UNDER_PROCESS ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_UNDER_PROCESS }}">
                                                Under Process
                                            </option>
                                            <option
                                                {{ isset($compliance) && $compliance->compliant == App\Models\ClauseData::COMPLIANT_NOT_EVALUATED ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NOT_EVALUATED }}">
                                                Not Evaluated
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <textarea
                                            class="form-control comment_ck_compliance"
                                            name="comment" id="comment" cols="30"
                                            rows="4">{!! $compliance->comment ?? '' !!}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="attachments" class="form-label">Attachments</label>
                                    <select class="form-control select2" name="attachments[]" id="attachments"
                                            multiple>
                                        <option value="">Select Attachment(s)</option>
                                        @foreach(getAttchments() as $attachment)
                                            <option
                                                {{ isset($compliance->attachments)
    && in_array($attachment->id,$compliance->attachments->pluck('attachment_id')->toArray()) ? 'selected' : '' }}
                                                value="{{$attachment->id}}">
                                                {{$attachment->title}} - {{ $attachment->documentNumber }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="link" class="form-label">Attachment URL</label>
                                    <input value="{{ $compliance->link ?? '' }}" type="text" name="link" id="link"
                                           class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Cancel
            </button>
        </div>
    </form>
</div>
