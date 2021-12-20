<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">{{ isset($clone) && $clone ? 'Clone' : 'Edit' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @include($route.'.edit_form')
    </div>
</div>
