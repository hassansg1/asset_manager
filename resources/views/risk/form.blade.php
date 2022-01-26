@include('components.form_errors')
{{ csrf_field() }}
@php $risk_assesment = riskAssesments(); @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}risk_assesment_id" class="form-label required">Risk Assesment Title</label>
                                <select class="form-control select2" id="risk_assesment_id" name="risk_assesment_id">
                                    <option value="">-Select Risk Assesment Title-</option>
                                    @foreach($risk_assesment as $value)
                                        <option value="{{$value->id}}" {{ isset($item) && $item->risk_assesment_id == $value->id  ? 'selected' : ''}}>{{$value->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}risk_number" class="form-label required">Risk Number/ID</label>
                                <input type="text" value="{{ isset($item) ? $item->risk_number:old('risk_number') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}risk_number" name="risk_number">
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}risk_statement" class="form-label required">Risk Statement</label>
                            <textarea class="form-control" name="risk_statement" id="risk_statement">{{ isset($item) ? $item->risk_statement:old('risk_statement') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}risk_zone" class="form-label ">Threat Zone</label>
                            <input type="text" value="{{ isset($item) ? $item->risk_zone:old('risk_zone') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}risk_zone" name="risk_zone">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}threat_source" class="form-label">Threat Source</label>
                            <input type="text" value="{{ isset($item) ? $item->threat_source:old('threat_source') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}threat_source" name="threat_source">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}threat_action" class="form-label">Threat Action</label>
                            <textarea class="form-control" name="threat_action" id="threat_action">{{ isset($item) ? $item->threat_action:old('threat_action') ?? ''  }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}vulnerability" class="form-label">Threat Vulnerabilities</label>
                            <textarea class="form-control" name="vulnerability" id="vulnerability">{{ isset($item) ? $item->vulnerability:old('vulnerability') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}consequence" class="form-label">Consequence</label>
                            <textarea class="form-control" name="consequence" id="consequence" rows="10">{{ isset($item) ? $item->consequence:old('consequence') ?? ''  }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">

                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}impact" class="form-label">Impact</label>
                                    <input type="text" value="{{ isset($item) ? $item->impact:old('impact') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}impact" name="impact">
                                </div>

                        </div>
                        <div class="row">

                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}utl" class="form-label">UTL</label>
                                    <input type="text" value="{{ isset($item) ? $item->utl:old('utl') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}utl" name="utl">
                                </div>
                            </div>
                        <div class="row">
                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}unmitigated_risk" class="form-label">Unmitigated Risk</label>
                                    <input type="text" value="{{ isset($item) ? $item->unmitigated_risk:old('unmitigated_risk') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}unmitigated_risk" name="unmitigated_risk">
                                </div>
                        </div>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}existing_countermeasures" class="form-label">Existing Countermeasures</label>
                            <textarea class="form-control" name="existing_countermeasures" id="existing_countermeasures" rows="6">{{ isset($item) ? $item->existing_countermeasures:old('existing_countermeasures') ?? ''  }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}mtl" class="form-label">MTL</label>
                                    <input type="text" value="{{ isset($item) ? $item->mtl:old('mtl') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}mtl" name="mtl">
                                </div>
                        </div>
                        <div class="row">
                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}mitigated_risk" class="form-label">Mitigated Risk</label>
                                    <input type="text" value="{{ isset($item) ? $item->mitigated_risk:old('mitigated_risk') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}mitigated_risk" name="mitigated_risk">
                                </div>
                        </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}recommendations" class="form-label">Recommendations</label>
                            <textarea class="form-control" name="recommendations" id="recommendations" rows="6">{{ isset($item) ? $item->recommendations:old('recommendations') ?? ''  }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}atl" class="form-label">ATL</label>
                                    <input type="text" value="{{ isset($item) ? $item->atl:old('atl') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}atl" name="atl">
                                </div>
                        </div>
                        <div class="row">
                                <div class="mb-3">
                                    <label for="{{ isset($item) ? $item->id:'' }}residual_risk" class="form-label">Residual Risk</label>
                                    <input type="text" value="{{ isset($item) ? $item->residual_risk:old('residual_risk') ?? ''  }}"
                                           class="form-control" id="{{ isset($item) ? $item->id:'' }}residual_risk" name="residual_risk">
                                </div>
                        </div>
                    </div>
                </div>
        </div>
            </div>
        </div>
    </div>
</div>
