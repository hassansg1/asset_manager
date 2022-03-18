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
                            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Cabinet
                                Parent</label>
                            @include('hierarchy.create_drop_down',['type' => 'cabinets'])
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">Cabinet
                                ID</label>
                            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id" name="rec_id"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label">Cabinet Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
