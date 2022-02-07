<div class="modal-header">
    <h5 class="modal-title" id="viewDetailPopUpModalModalLabel">Software Name : <b>{{$item->name}} ({{$item->version}})</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <h5>Vendor :  <b>{{$item->vendor->name}}</b></h5>
        <h5>Decription :  <b>{{$item->description}}</b></h5>
    </div>
</div>
