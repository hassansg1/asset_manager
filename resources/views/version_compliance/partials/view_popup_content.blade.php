<div class="modal-content">
    <div class="modal-header">
        @include('version_compliance.partials.title')
    </div>
    <form id="complianceForm" action="{{ url('submitCompliance') }}" name="submit_compliance_form" method="POST">
        <div class="modal-body default_modal_body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="compliant" class="form-label required">Compliant</label>
                                        <p>
                                            {{ isset($compliance) && $compliance->compliant ? \App\Models\ClauseData::getLabel($compliance->compliant) : '-' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="link" class="form-label">Attachment URL</label>
                                    <p>
                                        @if(isset($compliance->link) && $compliance->link != "")
                                            <a href="{{ $compliance->link }}">{{ $compliance->link }}</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <p>
                                            {!! $compliance->comment ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="attachments" class="form-label">Attachments</label>
                                    @if($compliance)
                                        @foreach($compliance->attachments as $attachment)
                                            @foreach($attachment->attachment->attachmentItems as $attachmentItem)
                                                <p>
                                                    <a title="{{ $attachment->attachment->title }}" target="_blank"
                                                       href="{{ $attachmentItem->fileLink() }}">
                                                        {{ $attachment->attachment->title }} - {{ $attachment->attachment->documentNumber }}
                                                    </a>
                                                </p>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            @if($request->view == "false")
                <button type="submit" class="btn btn-success">Save</button>
            @endif
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Cancel
            </button>
        </div>
    </form>
</div>
