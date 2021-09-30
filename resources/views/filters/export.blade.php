@can('Export '.$route)
    <span class="mr-5">
      <button title="Copy"  onclick="$('.buttons-copy').click()" type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-copy"></i>
      </button>
      <button title="Export as PDF" onclick="$('.buttons-pdf').click()" type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-file-pdf"></i>
      </button>
      <button title="Export as EXCEL"  onclick="$('.buttons-excel').click()"  type="button" class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-file-excel"></i>
      </button>
</span>
@endcan
