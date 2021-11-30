@include('components.btns.view')
@can('edit'.$assetString.$item->permission_string)
    @include('components.btns.edit')
@endcan
@can('delete'.$assetString.'assets'.$item->permission_string)
    @include('components.btns.delete')
@endcan
