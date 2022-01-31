<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Risk Assessent : <b>{{$item->title}} ({{$item->risk_assesment_id}})</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <h5>Assessment Description</h5>
        <p>{{$item->description}}</p>
    </div>
    <div class="row">
        <h5>Partisipant : <b>{{$item->participant}}</b> </h5>
    </div>
    <div class="row">
        <h5>Reason of Assessment</h5>
        <p>{{$item->reason_of_assesment}}</p>
    </div>
</div>
