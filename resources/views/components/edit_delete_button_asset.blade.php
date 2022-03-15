@if(checkIfSuperAdmin() || checkIfButtonAllowed($data['typeLocations'],$item,'view'))
    @include('components.btns.view')
@endif
@if(checkIfSuperAdmin() || checkIfButtonAllowed($data['typeLocations'],$item,'edit'))
    @include('components.btns.edit')
@endif
@if(checkIfSuperAdmin() || checkIfButtonAllowed($data['typeLocations'],$item,'delete'))
    @include('components.btns.delete')
@endif
