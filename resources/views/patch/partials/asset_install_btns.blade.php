<button title="View Assets" type="button"
        onclick="viewPatchAssetInstalls('{{ $item->id }}')"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-eye"></i>
</button>
<button title="Edit Software Approval(s)" type="button"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-edit"></i>
</button>
<button title="Install On Asset" type="button"
        onclick="patchAssetInstalls('{{ $item->software_id }}','{{ $item->id }}')"
        class="btn btn-light btn-form btn-no-color dropdown-toggle"
        aria-expanded="false">
    <i class="fas fa-plus"></i>
</button>
