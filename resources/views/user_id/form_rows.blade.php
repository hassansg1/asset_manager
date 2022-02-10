@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        <td>{{ $item->user_id }}</td>
        <td>
                @if($item->parent == "asset")
                    <i>AST:</i> {{ $item->user_id_assets->rec_id }}
                @elseif($item->parent == "system")
                    <i>SYS:</i> {{ $item->user_id_systems->name }}
                @endif
</td>
<td>{{ $item->user_rights_id->rights_name->name }}</td>
<td>
    @include('components.edit_delete_button')
</td>
</tr>
@endforeach
@section('script')
    <script type="text/javascript">
        $('.view_detail').on('click', function () {
            var view_id = this.id;
            if (view_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('user_id/detail')}}/" + view_id,
                    success: function (res) {
                        if (res) {
                            $('#viewDetailPopUpModal').modal("show");
                            $('#pageAdd').html(res);
                        }
                    }

                });
            }
        });
    </script>
@endsection
