<div class="modal-header">
    <h5 class="modal-title">Edit note</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <textarea placeholder="Insert a new note" name="" id="notes_field_modal_{{ $note->id }}" cols="30" rows="5">{{ $note->notes_content ?? '' }} </textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="button" onclick="updateNote('{{ $note->id }}')"  data-bs-dismiss="modal" class="btn btn-primary">Save</button>
</div>
