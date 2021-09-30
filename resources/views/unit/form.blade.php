@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Parent</label>
                            <select class="form-control select2" name="parent" id="{{ isset($item) ? $item->id:'' }}short_name">
                                <option>Search by Name</option>
                                <optgroup label="Company">
                                    @foreach(getCompanies() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Company::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Company::class}}??{{ $row->id }}">{{ $row->long_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Short
                                Name</label>
                            <input type="text" value="{{ isset($item) ? $item->short_name:old('short_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}short_name"
                                   name="short_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}long_name" class="form-label required">Long
                                Name</label>
                            <input type="text" value="{{ isset($item) ? $item->long_name:old('long_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}long_name" name="long_name"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}code" class="form-label">Code</label>
                            <input type="text" value="{{ isset($item) ? $item->code:old('code') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}code" name="code">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}contact_person" class="form-label">Contact
                                Person</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->contact_person:old('contact_person') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}contact_person"
                                   name="contact_person">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}ot_apn" class="form-label">OT APN</label>
                            <input type="text" value="{{ isset($item) ? $item->ot_apn:old('ot_apn') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}ot_apn" name="ot_apn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
