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
</div>
