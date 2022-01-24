<button title="View Patch Approval(s)" type="button"
        onclick="viewSoftwarePatchApprovals('{{ $item->id }}','{{$item->full_name}}')"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-eye"></i>
</button>
<button title="Edit Patch Approval(s)" type="button"
        onclick="editSoftwarePatchApprovals('{{ $item->id }}','{{$item->full_name}}')"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-edit"></i>
</button>
<button title="Add Patch Approval(s)" type="button"
        onclick="softwarePatchApprovals('{{ $item->id }}','{{$item->full_name}}')"
        class="btn btn-light btn-form btn-no-color dropdown-toggle"
        aria-expanded="false">
    <i class="fas fa-plus"></i>
</button>
