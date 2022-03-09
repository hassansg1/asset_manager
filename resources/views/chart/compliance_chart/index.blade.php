<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            <div class="card-heading">
                <div class="row">
                    <div class="col-md-3">
                        <label for="select_version">Compliance Version</label>
                        <select class="form-control" onchange="renderComplianceChart()"
                                name="select_version"
                                id="select_version">
                            <option value="">Select Version</option>
                            @foreach(\App\Models\ComplianceVersion::all() as $version)
                                <option selected value="{{ $version->id }}">{{ $version->name }}
                                    - {{ $version->standard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="select_location">Select Location</label>
                        <select class="form-control select2" onchange="renderComplianceChart()"
                                name="select_location"
                                id="select_location">
                            <option value="">Search by Name</option>
                            <optgroup label="Company">
                                @foreach(getCompanies() as $row)
                                    <option
                                        value="{{ $row->id }}">{{ $row->show_name }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Unit">
                                @foreach(getUnit() as $row)
                                    <option
                                        value="{{ $row->id }}">{{ $row->show_name }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Site">
                                @foreach(getSites() as $row)
                                    <option
                                        value="{{ $row->id }}">{{ $row->show_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" onclick="renderComplianceChart()">Reload</button>
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
