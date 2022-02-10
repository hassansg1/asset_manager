@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        @if($item->right_type)
            <td><i>{{$item->right_type->type}}:</i> {{ $item->right_type->name }}</td>
        @else
            <td></td>
        @endif
        <td>{{ $item->name }}</td>
        <td>
            @include('components.edit_delete_button_updated')
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
                    url: "{{url('right/detail')}}/" + view_id,
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
