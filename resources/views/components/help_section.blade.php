<div class="row mt-3">
    <div class="cl-12">
        <div class="card">
            <div class="card-title">
                <h3>Help</h3>
            </div>
            <div class="card-body">
                @if(checkIfSuperAdmin())
                    <textarea name="help_text" id="help_text" style="width:95%;height: 900px"></textarea>
                @else
                    {!! getHelpSectionText() !!}
                @endif
            </div>
        </div>
    </div>
</div>
