@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->name }}</td>
        <td>{{ $item->designation_id }}</td>
        <td>{{ $item->department_id }}</td>
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
                    url: "{{url('employee/detail')}}/" + view_id,
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
