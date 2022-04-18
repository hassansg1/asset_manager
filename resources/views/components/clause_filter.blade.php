<div class="col-md-3">
    <label for="clause_id_filter">Select Clause</label>
    <select onchange="loadTableData('{{ \Illuminate\Support\Facades\Request::url() }}','{{ $route ?? null }}')"
            class="form-control select2" name="clause_id_filter"
            id="clause_id_filter">
        <option value="">Search by Name</option>
        @if(isset($standardId))
            @foreach(getClauses($standardId) as $clause)
                <option
                        {{ isset($request->clause_id_filter) && $request->clause_id_filter == $clause->id ? 'selected' : '' }}
                        value="{{ $clause->id }}">{{ $clause->number }}</option>
            @endforeach
        @endif
    </select>
    <button class="btn btn-primary mt-2" onclick="runLoader()">Clear Filter</button>
</div>
@section('script')
    <script>
        {{--let clauses = '{{ getClauses($standardId,1,1) }}';--}}
        $(document).ready(function () {
            clauses = clauses.split(',');
            // loadClauses(0);
            // runLoader();
        });

        function runLoader() {
            $('#clause_id_filter').val('');
            $('#clause_id_filter').prop('disabled', true);
            for (let count = 0; count < clauses.length; count++) {
                loadClauses(count);
            }
        }

        function loadClauses(index) {
            $.ajax({
                type: "GET",
                url: '{{ route("clauses.smartLoad") }}',
                data: {
                    standardId: '{{ $standardId }}',
                    clauseId: clauses[index],
                    route: '{{ $route }}',
                },
                success: function (result) {
                    if (index == 0)
                        $('#table_content_div_body').html(result.html);
                    else
                        $('#table_content_div_body').append(result.html);
                    if (index == (clauses.length - 1)) {
                        $('#clause_id_filter').prop('disabled', false);
                    }
                },
            });
        }

        {{--function loadClausesAjaxLy(index) {--}}
        {{--    $.ajax({--}}
        {{--        type: "GET",--}}
        {{--        url: '{{ route("clauses.smartLoad") }}',--}}
        {{--        data: {--}}
        {{--            standardId: '{{ $standardId }}',--}}
        {{--            clauseId: clauses[index],--}}
        {{--        },--}}
        {{--        success: function (result) {--}}
        {{--            if (index == 0)--}}
        {{--                $('#table_content_div_body').html(result.html);--}}
        {{--            else--}}
        {{--                $('#table_content_div_body').append(result.html);--}}
        {{--            if (index + 1 <= clauses.length)--}}
        {{--                loadClauses(index + 1);--}}
        {{--        },--}}
        {{--    });--}}
        {{--}--}}
    </script>
@endsection