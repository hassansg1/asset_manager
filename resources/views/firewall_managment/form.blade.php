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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}source_location" class="form-label required">Source Location</label>
                                <input type="text" value="{{ isset($item) ? $item->source_location:old('source_location') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}source_location" name="source_location">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}source_zone" class="form-label required">Source Zone</label>
                                <input type="text" value="{{ isset($item) ? $item->source_zone:old('source_zone') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}source_zone" name="source_zone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}source_asset" class="form-label required">Source Assets</label>
                                <input type="text" value="{{ isset($item) ? $item->source_asset:old('source_asset') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}source_asset" name="source_asset">
{{--                                <select class="form-control select2" id="source_asset" name="source_asset[]" multiple>--}}
{{--                                    <option value="">-Select Source Asset ID-</option>--}}
{{--                                    @foreach($firewallAssets as $value)--}}
{{--                                        <option value="{{$value->id}}" {{ isset($item) && in_array($value->id, $item->source_asset)  ? 'selected' : ''}}>{{$value->rec_id}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}destination_location" class="form-label required">Destination Location</label>
                                <input type="text" value="{{ isset($item) ? $item->destination_location:old('destination_location') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}destination_location" name="destination_location">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}destination_zone" class="form-label required">Destination Zone</label>
                                <input type="text" value="{{ isset($item) ? $item->destination_zone:old('destination_zone') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}destination_zone" name="destination_zone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}destination_asset" class="form-label required">Destination Assets</label>
                                <input type="text" value="{{ isset($item) ? $item->destination_asset:old('destination_asset') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}destination_asset" name="destination_asset">
{{--                                <select class="form-control select2" id="destination_asset" name="destination_asset[]" multiple>--}}
{{--                                    <option value="">-Select Destination Asset ID-</option>--}}
{{--                                    @foreach($firewallAssets as $value)--}}
{{--                                        <option value="{{$value->id}}" {{ isset($item) && in_array($value->id, $item->destination_asset)  ? 'selected' : ''}}>{{$value->rec_id}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}applicatin_port" class="form-label required">Application / Port</label>
                            <input type="text" value="{{ isset($item) ? $item->applicatin_port:old('applicatin_port') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}applicatin_port" name="applicatin_port">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Justification</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="{{ isset($item) ? $item->id:'' }}condition" class="form-label required">Select Policy Validity</label>
                        <select class="form-control select2" id="condition" name="condition">
                            <option value="">-Select Policy Validity-</option>
                            <option value="temporary" {{ isset($item) && $item->condition == 'temporary'  ? 'selected' : ''}}>Temporary</option>
                            <option value="permanent" {{ isset($item)  && $item->condition == 'permanent'  ? 'selected' : ''}}>Permanent</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}approvel_expirey_date" class="form-label">Policy Expirey Date</label>
                            <input type="date" value="{{ isset($item) ? $item->approvel_expirey_date:old('approvel_expirey_date') ?? ''  }}" {{ isset($item) && $item->condition == 'permanent'  ? 'disabled' : ''}}
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}approvel_expirey_date" name="approvel_expirey_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}approved_by" class="form-label required">Approved By</label>
                            <input type="text" value="{{ isset($item) ? $item->approved_by:old('approved_by') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}approved_by" name="approved_by">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
          $('#condition').on('change', function(){
          var condition= this.value;
          if(condition == 'permanent'){
              $("input[name=approvel_expirey_date]").attr('disabled',true);
      }
          if(condition == 'temporary'){
              $("input[name=approvel_expirey_date]").attr('disabled',false);
              }

      });
  });
</script>
@endsection


