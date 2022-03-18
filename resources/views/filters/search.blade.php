<label><input style="padding: 6.5px"
              value="{{ $data['request']['search_keyword'] ?? '' }}"
              type="search"
              data-id="{{ $route }}"
              class="form-control form-control-sm search_universal" id="ser{{ $route }}" placeholder="Search"
              aria-controls="datatable-buttons">
</label>
<label for="">
    <button
        id="ser{{ $route }}keyword_search_btn"
        title="Search" type="button" class="btn btn-light btn-filter dropdown-toggle btn_padding8"
        data-bs-toggle="dropdown"
        onclick="loadTableData('{{ $data['request']['url'] ?? '' }}','{{ $route }}')"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"></i>
    </button>
</label>
