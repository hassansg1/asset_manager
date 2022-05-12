@php($rand = rand(10000000,100000000))
<div id="fieldset-search" class="{{ $rand }}">
    <div>
        <select class="column_search_select" name="where[]">
            <option value="" selected>Select Column</option>
            @foreach($columns as $key => $label)
                <option
                        {{ isset($index) && isset($request->where[$index]) && $request->where[$index] == $key ? 'selected' : '' }}
                        value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
        <select name="op[]">
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "=" ? 'selected' : '' }}>
                =
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "<" ? 'selected' : '' }} value="<">
                &lt;
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == ">" ? 'selected' : '' }} value=">">
                &gt;
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "<=" ? 'selected' : '' }} value="<=">
                &lt;=
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == ">=" ? 'selected' : '' }} value=">=">
                &gt;=
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "!=" ? 'selected' : '' }} value="!=">
                !=
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "LIKE %%" ? 'selected' : '' }} value="LIKE %%">
                LIKE %%
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "IN" ? 'selected' : '' }} value="IN">
                IN
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "IS NULL" ? 'selected' : '' }} value="IS NULL">
                IS NULL
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "NOT IN" ? 'selected' : '' }} value="NOT IN">
                NOT IN
            </option>
            <option {{ isset($index) && isset($request->op[$index]) && $request->op[$index] == "<" ? 'selected' : '' }} value="IS NOT NULL">
                IS NOT NULL
            </option>
        </select>
        <input type="search" name="val[]" placeholder="Enter keyword here"
               value="{{ isset($index) && isset($request->op[$index]) ? $request->val[$index] : '' }}">
        <button onclick="deleteFilterRow('{{ $rand }}')" title="Delete"
                type="button" style="display: inline"
                class="btn btn-light btn-form btn-no-color dropdown-toggle btn_delete_row" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</div>
