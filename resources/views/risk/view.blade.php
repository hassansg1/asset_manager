<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Risk ID : <b>{{$item->risk_number}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <h5>Risk Statement</h5>
        <p>{{$item->risk_statement}}</p>
    </div>
    <div class="row">
        <div class="col-md-6">
        <h5>Threat Zone</h5>
        <p>{{$item->risk_zone}}</p>
        </div>
        <div class="col-md-6">
            <h5>Threat Source</h5>
            <p>{{$item->threat_source}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Threat Action</h5>
            <p>{{$item->threat_action}}</p>
        </div>
        <div class="col-md-6">
            <h5>Threat Vulnerabilities</h5>
            <p>{{$item->vulnerability}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Consequence</h5>
            <p>{{$item->consequence}}</p>
        </div>
        <div class="col-md-2">
            <h5>Impact</h5>
            <p>{{$item->impact}}</p>
        </div>
        <div class="col-md-2">
            <h5>UTL</h5>
            <p>{{$item->utl}}</p>
        </div>
        <div class="col-md-2">
            <h5>Unmitigated Risk</h5>
            <p>{{$item->unmitigated_risk}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Existing Countermeasures</h5>
            <p>{{$item->existing_countermeasures}}</p>
        </div>
        <div class="col-md-2">
            <h5>MTL</h5>
            <p>{{$item->mtl}}</p>
        </div>
        <div class="col-md-2">
            <h5>Mitigated Risk</h5>
            <p>{{$item->mitigated_risk}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Recommendations</h5>
            <p>{{$item->recommendations}}</p>
        </div>
        <div class="col-md-2">
            <h5>ATL</h5>
            <p>{{$item->atl}}</p>
        </div>
        <div class="col-md-2">
            <h5>Residual Risk</h5>
            <p>{{$item->residual_risk}}</p>
        </div>
    </div>
</div>
