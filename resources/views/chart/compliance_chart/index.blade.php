<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            <div class="card-heading">
                <div class="row">
                    <div class="col-md-3">
                        <label for="select_version">Select Compliance Version</label>
                        <select class="form-control select2" onchange="renderComplianceChart()"
                                name="select_version"
                                id="select_version">
                            <option value="">Search by Name</option>
                            @foreach(\App\Models\ComplianceVersion::all() as $version)
                                <option selected value="{{ $version->id }}">{{ $version->name }}
                                    - {{ $version->standard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="select_location">Select Location</label>
                        <select onchange="renderComplianceChart()" class="form-control select2" name="select_location[]"
                                id="select_location" multiple required>
                            <option value="">Search by Name</option>
                            @foreach(getLocationsForDropDown('assets',null,$model ?? null) as $heading => $locations)
                                <optgroup label={{ \App\Models\Location::getTypeToModel($heading) }}>
                                    @foreach($locations as $location)
                                        <option
                                            {{ isset($item) && $item->parent_id == $location->id ? 'selected' : '' }}
                                            value="{{ $location->id }}">{{ $location->text }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" style="margin-top: 25px" onclick="renderComplianceChart()">Reload</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="pie-chart" class="e-charts"></div>
                    <div id="compliance_table"></div>
                </div>
            </div>
        </div>
    </div>
</div>
