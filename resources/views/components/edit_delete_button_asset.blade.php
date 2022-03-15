@if(checkIfSuperAdmin() || (isset($item->can_view) && $item->can_view == 1))
    @include('components.btns.view')
@endif
@if(checkIfSuperAdmin() || (isset($item->can_edit) && $item->can_edit == 1))
    @include('components.btns.edit')
@endif
@if(checkIfSuperAdmin() || (isset($item->can_delete) && $item->can_delete == 1))
    @include('components.btns.delete')
@endif
