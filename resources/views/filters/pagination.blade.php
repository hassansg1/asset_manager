@if(isset($data))
    <span class="mr-5">
  <span class="btn-group" role="group">
      <input type="hidden" value="{{ $data['items_per_page'] ?? 10 }}" name="per_page" id="per_page">
      <button id="paginate_count" type="button" class="btn btn-light btn-filter dropdown-toggle btn_padding5"
              data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
          {{ ($data['items_per_page'] == "all" ? 'All' : $data['items_per_page']) ?? 10 }}
          <i class="mdi mdi-chevron-down"></i>
      </button>
      <span class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
          <a onclick="changePerPage(10)" class="dropdown-item" href="javascript:void(0)">10</a>
          <a onclick="changePerPage(25)" class="dropdown-item" href="javascript:void(0)">25</a>
          <a onclick="changePerPage(50)" class="dropdown-item" href="javascript:void(0)">50</a>
          <a onclick="changePerPage(100)" class="dropdown-item" href="javascript:void(0)">100</a>
          <a onclick="changePerPage('all')" class="dropdown-item" href="javascript:void(0)">All</a>
      </span>
  </span>
     <button id="paginate_text" type="button" class="btn btn-light btn-filter dropdown-toggle btn_padding5" data-bs-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
         @if($data['items_per_page'] == "all")
             1 - {{ $items->count() ?? 0 }} of {{ $items->count() ?? 0 }}
         @else
             {{ $items->firstItem() ?? 0 }} - {{ $items->lastItem() ?? 0 }} of {{ $items->total() ?? 0 }}
         @endif
      </button>
</span>
@endif
<script>
    function changePerPage(val) {
        $('#per_page').val(val);
        if(val == "all")
            val = "All";
        $('#paginate_count').text(val);
        $('#paginate_count').append('<i class="mdi mdi-chevron-down"></i>');
        loadTableData('{{ $data['request']['url'] ?? '' }}','{{ $route }}')
    }
</script>
