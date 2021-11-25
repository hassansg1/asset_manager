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
                            <label for="{{ isset($item) ? $item->id:'' }}standard_id"
                                   class="form-label">Standard</label>
                            <select class="form-select form-select-input" name="standard_id"
                                    id="{{ isset($item) ? $item->id:'' }}standard_id">
                                @foreach(\App\Models\Standard::all() as $value)
                                    <option value=""></option>
                                    <option
                                        {{ $value->id == (isset($item) ? $item->standard_id:old('last_name') ?? '') ? 'selected' : ''  }}
                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}number"
                                   class="form-label required">Number</label>
                            <input type="text" value="{{ isset($item) ? $item->number:old('number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}number" name="number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label">Title</label>
                            <input type="text" value="{{ isset($item) ? $item->title:old('title') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}title" name="title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label">Description</label>
                            <input type="text" value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
