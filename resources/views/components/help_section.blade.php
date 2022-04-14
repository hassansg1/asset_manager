<div class="row mt-3">
    <div class="cl-12">
        <div style="padding: 30px" class="card">
            <div class="card-title">
                <h3>Help
                    @if(checkIfSuperAdmin())
                        <p onclick="showTextArea()" style="float: right;cursor: pointer"><i style="color: black"
                                                                                     class="far fa-edit"></i></p>
                    @endif</h3>
            </div>
            <div class="card-body">
                @if(checkIfSuperAdmin())
                    <div  id="text_manager">
                        {!! getHelpSectionText() !!}
                    </div>
                    <div id="text_hel_div" style="display: none">
                    <textarea name="help_text" id="help_text"
                              style="width:95%;height: 900px;">{!! getHelpSectionText() !!}</textarea>
                    </div>
                @else
                    {!! getHelpSectionText() !!}
                @endif

            </div>
            <div align="right">
                <button class="btn btn-primary" id="helpSaveButton" style="display: none">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showTextArea() {
        $('#text_hel_div').css('display', 'block');
        $('#text_manager').css('display', 'none');
        $('#helpSaveButton').show();
    }
</script>
