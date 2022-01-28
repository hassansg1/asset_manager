@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        <td>{{ $item->name }}</td>
        <td>{{ $item->designation_id }}</td>
        <td>{{ $item->department_id }}</td>
        <td>
            @include('components.edit_delete_button_updated')
        </td>
    </tr>
@endforeach
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="pageAdd">

        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $('.view_detail').on('click', function () {
            var view_id = this.id;
            if (view_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('employee/detail')}}/" + view_id,
                    success: function (res) {
                        if (res) {
                            $('#exampleModal').modal("show");
                            $('#pageAdd').html(res);
                        }
                    }

                });
            }
        });
    </script>
@endsection
