
<form  id="getBulckRowsNetwork" action="{{url('getNewAjaxRow')}}" >
    {{csrf_field()}}
    <input type="hidden" id="modalCloseId" value="{{$modal}}">
{{--    <input type="hidden" name="type" value="network">--}}
    <div class="modal-body">
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Type</th>
                <th>Netwrok</th>
                <th>Speed</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @php($rand = rand(10000,100000))
            <tr data-id="1" id="{{ $rand }}">
                <td><input type="text" name="name" class="form-control"></td>
                <td><input type="text" name="number"
                           class="form-control"></td>
                <td><input type="text" name="type"
                           class="form-control" value="network"></td>
                <td></td>
                <td><input type="text" name="network"
                           class="form-control"></td>
                <td>
                    <input type="text" name="speed"
                           class="form-control">
                </td>
                @php($rand = rand(100000,1000000))
            </tr>
            <tr>
                <td>Number of rows</td>
                <td><input type="number" minlength="1" name="rows"  value="1"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit"  class="btn btn-primary" >Add</button>
    </div>
</form>
<script>
    $("#getBulckRowsNetwork").submit(function(e) {
        e.preventDefault();
        var modal =  $('#modalCloseId').val();
        var form = $(this);
        var form_data = form.serialize();
        var url = form.attr('action');
        $.ajax({
            type: "GET",
            url: url,
            data: form_data,
            success: function(result)
            {
                $('#'+modal).modal('hide');
                $('#ports_table_row').append(result.html);
            }
        });
    });

</script>
