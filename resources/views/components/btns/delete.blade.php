@if(checkIfSuperAdmin() || (isset($item->can_delete) && $item->can_delete == 1))
    <button
        onclick="if(confirm('Are you sure you want to delete?')) deleteItem('{{ $item->combine_short ?? '' }}','{{ $item->id }}')"
        title="Delete" type="button"
        style="display: {{ isset($onlyView) && $onlyView == 1 ? 'none' : 'inline' }}"
        class="btn btn-light btn-form btn-no-color dropdown-toggle btn_delete_row" data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-trash-alt"></i>
    </button>
@endif
<form action="{{ route($route.".destroy",$item->id) }}" name="delete_{{ $item->id }}" id="delete_{{ $item->id }}"
      method="post">
    {{ csrf_field() }}
    @method('DELETE')
</form>
