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
                            <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label">Title</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name" name="name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
