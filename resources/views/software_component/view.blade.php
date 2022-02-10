<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Software Component Name: <b>{{$item->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>Software(Version) : <b>{{$item->software->name}} ({{$item->software->version}})</b></h5>
    <h5>Vednor: <b>{{$item->software->vendor->name}}</b></h5>
    <h5>Description: <b>{{ $item->description ?? '' }}</b></h5>
</div>
