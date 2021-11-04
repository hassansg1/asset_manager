@if(isset($data))
<span class="mr-5">
  <span class="btn-group" role="group">
      <input type="hidden" value="10" name="per_page" id="per_page">
      <button id="paginate_count" type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
          10
          <i class="mdi mdi-chevron-down"></i>
      </button>
      <span class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
          <a onclick="changePerPage(10)" class="dropdown-item" href="javascript:void(0)">10</a>
          <a onclick="changePerPage(25)" class="dropdown-item" href="javascript:void(0)">25</a>
          <a onclick="changePerPage(50)" class="dropdown-item" href="javascript:void(0)">50</a>
          <a onclick="changePerPage(100)" class="dropdown-item" href="javascript:void(0)">100</a>
      </span>
  </span>
     <button id="paginate_text" type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
         {{ $data['start'] }} - {{$data['end'] }} of {{ $data['totalItems'] }}
      </button>
<button title="Previous"  type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-angle-left"></i>
</button>
<button title="Next" style="margin-left: -3px"  type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-angle-right"></i>
</button>
</span>
@endif
<script>
    function changePerPage(val)
    {
        $('#per_page').val(val);
        $('#paginate_count').text(val);
        filterDataTable();
    }
</script>
