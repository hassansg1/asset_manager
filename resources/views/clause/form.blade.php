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
{{--                            <input type="text" class="form-control" name="name" id="name" readonly value="{{Session::get('standard')->name}}">--}}
                            <input type="hidden" class="form-control" name="standard_id" id="standard_id" value="{{Session::get('standard_id')}}">
{{--                            <label for="{{ isset($item) ? $item->id:'' }}standard_id"--}}
{{--                                   class="form-label">Standard</label>--}}
{{--                            <input type="hidden" name="standard_id"--}}
{{--                                   value="{{ \Illuminate\Support\Facades\Session::get('standard_id') ?? '' }}">--}}
{{--                            <select class="form-select form-select-input" name="standard_id"--}}
{{--                                    id="{{ isset($item) ? $item->id:'' }}standard_id">--}}
{{--                                @foreach(\App\Models\Standard::all() as $value)--}}
{{--                                    <option value=""></option>--}}
{{--                                    <option--}}
{{--                                        {{ $value->id == (isset($item) ? $item->standard_id:old('last_name') ?? (\Illuminate\Support\Facades\Session::get('standard_id') ?? '')) ? 'selected' : ''  }}--}}
{{--                                        value="{{ $value->id }}">{{ $value->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
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
{{--                    <div class="col-lg-4">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label">Title</label>--}}
{{--                            <input type="text" value="{{ isset($item) ? $item->title:old('title') ?? ''  }}"--}}
{{--                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}title" name="title">--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
