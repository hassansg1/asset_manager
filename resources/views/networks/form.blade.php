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
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label required">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}start_ip" class="form-label required">Start IP Address</label>
                            <input type="text" value="{{ isset($item) ? $item->start_ip:old('start_ip') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}start_ip"
                                   name="start_ip" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}end_ip" class="form-label required">End IP Address</label>
                            <input type="text" value="{{ isset($item) ? $item->end_ip:old('end_ip') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}end_ip"
                                   name="end_ip" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
