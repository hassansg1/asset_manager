@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>
            {{ $item->name }}
        </td>
        <td>
            <button style="margin-left: 5px;
                display: {{ isset($item) && $item->applicable == 1 ? 'inline':'none'  }};
                " class="btn btn-primary  app_action_btns{{ $item->id }}">
                <a style="color: white" href="{{ route('standards.applicable_clause.index',$item->id) }}">Applicable
                    Clauses</a>
            </button>
        </td>
    </tr>
@endforeach
<script>
    function changeApplicableStatus(id) {
        $.ajax({
            type: "POST",
            url: '{{ route('standard.changeApplicableStatus') }}',
            data: {
                id: id,
                value: $('#app_switch' + id).is(":checked"),
                '_token': '{{ csrf_token() }}'
            },
            success: function (result) {
                if (result.status) {
                    doSuccessToast('Success...!!!');
                    $('.app_action_btns' + id).css('display', 'none');
                    if ($('#app_switch' + id).is(":checked") == true) {
                        $('.app_action_btns' + id).css('display', 'inline');
                    }
                }
            },
        });
    }
</script>
@section('script')
@endsection
