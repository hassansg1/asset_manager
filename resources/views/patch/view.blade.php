<div class="modal-header">
    <h5 class="modal-title" id="viewDetailPopUpModalModalLabel">Patch Name: <b>{{$item->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>Software(Version) : <b>{{$item->software->name}} ({{$item->software->version}})</b></h5>
    <h5>Vednor: <b>{{$item->software->vendor->name}}</b></h5>
    <h5>Release Date: <b>{{ $item->release_date ?? '' }}</b></h5>
    <h5>Article: <b>{{ $item->article ?? '' }}</b></h5>
</div>
