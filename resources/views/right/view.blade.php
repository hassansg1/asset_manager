<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Right: <b>{{$item->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>System/Asset Type : <b>{{$item->right_type->name}}</b></h5>
    <h5>Description</h5>
    <div class="row">
        <p>{{$item->description}}</p>
    </div>
</div>
