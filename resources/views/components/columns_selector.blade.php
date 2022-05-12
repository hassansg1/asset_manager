<div>
    <fieldset>
        <legend>Toggle column:</legend>
        @foreach($columns as $key => $label)
            <a class="column_slctr"
               onclick="showHideColumns('{{ $key }}','{{ $data['request']['url'] ?? '' }}','{{ $route }}')"
               href="javascript:void(0)">{{ $label }}</a>
            @if (!$loop->last)
                -
            @endif
        @endforeach
    </fieldset>
</div>
<div>
    @include('components.columns_filter')
</div>
@section('script')
    <script>
        function getNewRowForFilter() {
            $.ajax({
                type: "GET",
                url: '{{ url('getColumnSearchRow') }}',
                data: {
                    'repo': '{{ $repo }}'
                },
                success: function (result) {
                    $('.search_div_sl').append(result);
                },
            });
        }

        function deleteFilterRow(index) {
            $('.' + index).remove();
        }
    </script>
@endsection