
<form  id="getBulckRows" action="{{url('getNewAjaxRow')}}" >
    {{csrf_field()}}

    <input type="hidden" id="modalCloseId" value="{{$modal}}">
    <input type="hidden" name="type" value="computer">
    <div class="modal-body">
        <table>
            <thead>
            <tr>
                <th>Network Interface Card</th>
                <th>Port Number</th>
                <th>MAC Address</th>
                <th>IP Address</th>
                <th>SubNetMask</th>
                <th>Default Gateway</th>
{{--                <th>Connected To</th>--}}
                <th></th>
            </tr>
            </thead>
            <tbody>
            @php($rand = rand(10000,100000))
            <tr data-id="1" id="{{ $rand }}">
                <td><input type="text" name="nic" class="form-control"></td>
                <td><input type="text" name="number"
                           class="form-control"></td>
                <td><input type="text" name="mac_address"
                           class="form-control"></td>
                <td><input type="text" name="ip_address"
                           class="form-control"></td>
                <td><input type="text" name="sub_net_mask"
                           class="form-control"></td>
                <td><input type="text" name="default_gateway"
                           class="form-control"></td>
                @php($rand = rand(100000,1000000))
            </tr>
            <tr>
                <td>Number of rows</td>
                <td><input type="number" minlength="1" name="rows"  value="1" class="form-control"></td>
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
        $("#getBulckRows").submit(function(e) {
            e.preventDefault();
           var modal =  $('#modalCloseId').val();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "GET",
                url: url,
                data: form.serialize(),
                success: function(result)
                {
                    $('#'+modal).modal('hide');
                    $('#ports_table_row').append(result.html);
                }
            });
        });

</script>
