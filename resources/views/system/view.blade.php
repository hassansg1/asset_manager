<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">System Name: <b>{{$item->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>System/Asset Type : <b>{{$item->system_type->name}}</b></h5>
    <h5>Description</h5>
    <div class="row">
        <p>{{$item->description}}</p>
    </div>
    <h4>Assets</h4>
        @foreach(getSystemAssets($item->id) as $system_asset)
            <span class="badge bg-success" style="margin-left: 5px">{{$system_asset->system_assets->rec_id}}</span>
        @endforeach
</div>
