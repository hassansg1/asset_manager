@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>
            {{ $item->name }}
        </td>
        <td>
            {{ $item->standard->name ?? '' }}
        </td>
        <td>
            {{ $item->closed ? 'Closed' : 'Open' }}
        </td>
        <td>
            @if($item->closed)
                <button style="margin-left: 5px;
                " class="btn btn-primary  app_action_btns{{ $item->id }}">
                    <a style="color: white" href="{{ route('version.compliance.index',$item->id) }}">View
                        Compliance</a>
                </button>
                @if(checkIfSuperAdmin())
                    <button style="margin-left: 5px;
                " class="btn btn-primary  app_action_btns{{ $item->id }}">
                        <a style="color: white" href="{{ url('openCompliance/'.$item->id) }}">Re Open
                            Compliance</a>
                    </button>
                @endif
            @else
                <button {{ $item->closed ? 'disabled' : '' }} style="margin-left: 5px;
                " class="btn btn-primary  app_action_btns{{ $item->id }}">
                    <a style="color: white" href="{{ route('version.compliance.index',$item->id) }}">View/Update
                        Compliance</a>
                </button>
                <button {{ $item->closed ? 'disabled' : '' }} style="margin-left: 5px;
                " class="btn btn-primary  app_action_btns{{ $item->id }}">
                    <a style="color: white" href="{{ url('closeCompliance/'.$item->id) }}">Close
                        Compliance</a>
                </button>
            @endif
        </td>
        <td>
            @include('components.edit_delete_button')
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
