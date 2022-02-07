@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input
                {{ !$item->is_critical ? 'disabled' : '' }}
                data-type="{{ $route ?? '' }}"
                data-software="{{ $item->software->id ?? null }}"
                data-show_name="{{ $item->show_name ?? null }}"
                type="checkbox" name="select_row" value="{{ $item->id }}"
                id="select_check_{{ $item->id }}" class="select_row select_patch_cb"></td>
        <td>{{ $item->name ?? '' }}</td>
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->software->version ?? '' }}</td>
        <td>{{ $item->software->vendor->name ?? '' }}</td>
        <td>
            @include('components.edit_delete_button_updated')
        </td>
        <td>
            {{ $item->release_date ?? '' }}
        </td>
        <td>{{ $item->article ?? '' }}</td>
    </tr>
@endforeach
@section('script')
    <script type="text/javascript">
        $('.view_detail').on('click', function () {
            var view_id = this.id;
            if (view_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('patch/detail')}}/" + view_id,
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
