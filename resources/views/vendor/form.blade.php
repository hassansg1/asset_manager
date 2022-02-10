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
                            <label for="{{ isset($item) ? $item->id:'' }}name"
                                   class="form-label">Vendor Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}profile"
                                   class="form-label">Vendor profile</label>
                            <input type="text" value="{{ isset($item) ? $item->profile:old('profile') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}profile"
                                   name="profile">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}contact_number"
                                   class="form-label">Vendor Contact</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->contact_number:old('contact_number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}contact_number"
                                   name="contact_number">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
