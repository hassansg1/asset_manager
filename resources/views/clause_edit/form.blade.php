@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label">Title</label>
                            <input type="text" value="{{ isset($item) ? $item->title:old('title') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}title" name="title">
                            <input type="hidden" class="form-control" name="standard_id" id="standard_id" value="{{Session::get('standard_id')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}number"
                                   class="form-label required">Number</label>
                            <input type="text" value="{{ isset($item) ? $item->number:old('number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}number" name="number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label">Description</label>
                            <textarea class="form-control" name="description"
                                      id="{{ isset($item) ? $item->id:'' }}description" cols="30"
                                      rows="10">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
