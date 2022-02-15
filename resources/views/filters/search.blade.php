<label><input style="padding: 6.5px"
              value="{{ $data['request']['search_keyword'] ?? '' }}"
              type="search"
              class="form-control form-control-sm" id="search_keyword" placeholder="Search"
              aria-controls="datatable-buttons">
</label>
<label for="">
    <button
        id="keyword_search_btn"
        title="Search" type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown"
            onclick="loadDataTableDynamically('{{ $route }}','{{ $route }}')"
            aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"></i>
    </button>
</label>
