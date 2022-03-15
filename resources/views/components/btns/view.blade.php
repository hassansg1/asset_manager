@if(checkIfSuperAdmin() || (isset($item->can_view) && $item->can_view == 1))
    <button id="attachment_view" onclick="showDetailPopup('{{ route($route.".show",$item->id) }}')"
            title="View" type="button"
            class="btn btn-light btn-form btn-no-color dropdown-toggle view_detail" data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        <i class="fas fa-eye"></i>
    </button>
@endif
