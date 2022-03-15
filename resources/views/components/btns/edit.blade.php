<button
    style="display: {{ isset($onlyView) && $onlyView == 1 ? 'none' : 'inline' }}"
    onclick="location.href='{{ route($route.".edit",$item->id) }}'" title="Edit" type="button"
    class="btn btn-light btn-form btn-no-color dropdown-toggle btn_edit_row" data-bs-toggle="dropdown"
    aria-haspopup="true"
    aria-expanded="false">
    <i class="fas fa-edit"></i>
</button>
