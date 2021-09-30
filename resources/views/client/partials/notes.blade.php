<div class="card">
    <div class="card-body">
        <div class="col-xs-12">
            <div class="row">
                <textarea placeholder="Insert a new note " name="" id="notes_field" cols="30" rows="5"></textarea>
            </div>
            <br>
            <div style="text-align: right">
                <button type="button" onclick="addNote()" class="btn btn-primary w-md submit_form">Save</button>
            </div>
            <div id="notes_table">
                @include('client.partials.notes_table',['items' => $item->notes])
            </div>
        </div>
    </div>
</div>

@include('client.scripts.notes_script')
