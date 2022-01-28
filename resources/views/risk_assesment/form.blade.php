@include('components.form_errors')
{{ csrf_field() }}
@php $firewallAssets = getComputerAssets(); @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}risk_assesment_id" class="form-label required">Risk Assessment ID</label>
                                <input type="text" value="{{ isset($item) ? $item->risk_assesment_id:old('risk_assesment_id') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}risk_assesment_id" name="risk_assesment_id">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label required">Risk Assessment Title</label>
                                <input type="text" value="{{ isset($item) ? $item->title:old('title') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}title" name="title">
                            </div>
                        </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Risk Assessment Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}date_of_assesment" class="form-label">Date for Assesment</label>
                            <input type="date" value="{{ isset($item) ? $item->date_of_assesment:old('date_of_assesment') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}date_of_assesment" name="date_of_assesment">
                        </div>
                    </div>
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}participant" class="form-label ">Participant</label>
                                <input type="text" value="{{ isset($item) ? $item->participant:old('participant') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}participant" name="participant">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}reason_of_assesment" class="form-label">Reason of Assessment</label>
                            <textarea class="form-control" name="reason_of_assesment" id="reason_of_assesment">{{ isset($item) ? $item->reason_of_assesment:old('reason_of_assesment') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
