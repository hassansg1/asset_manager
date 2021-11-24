@php($rand = rand(10000,100000))
<tr @if($level > 2)
    style="display: none"
    @endif
    data-hierarchy="{{ $class }}">
    <td>
        @for($var = 0;$var<=$level*2;$var++)
            &nbsp;&nbsp;
        @endfor
        <input data-rand="{{ $rand }}"
               class="form-check-input location_check {{ $class }}" name="location[]"
               value="{{ $parent->combine_name }}"
               type="checkbox" id="formCheck{{ $rand }}">
        <label class="form-check-label" for="formCheck{{ $rand }}">

            {{$parent->getSelfName()}}
        </label>
    </td>
    @foreach(getAllPossibleChildTablesOfParent($parent->childable_type) as $objType)
        @php($permission = str_replace(" ","",$objType.$parent->childable_type.$parent->childable_id))
        <td>
            <input data-rand="{{ $rand }}" data-type="View{{$objType}}" class="View{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}" name="permissions[]"
                   type="checkbox"
                   value="{{ 'view'.$permission }}"
                {{--                        {{ permissionExist('view'.$permission) && $item->hasPermissionTo('view'.$permission) ? 'checked' :'' }}--}}
            >
            <label class="form-check-label">View</label>

            <input data-rand="{{ $rand }}" data-type="Create{{$objType}}" class="Create{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}" name="permissions[]" type="checkbox"
                   {{--                           {{ permissionExist('create'.$permission) && $item->hasPermissionTo('create'.$permission) ? 'checked' :'' }}--}}
                   value="{{ 'create'.$permission }}">
            <label class="form-check-label">Create</label>

            <input data-rand="{{ $rand }}" data-type="Edit{{$objType}}" class="Edit{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}" name="permissions[]" type="checkbox"
                   {{--                           {{ permissionExist('edit'.$permission) && $item->hasPermissionTo('edit'.$permission) ? 'checked' :'' }}--}}
                   value="{{ 'edit'.$permission }}">
            <label class="form-check-label">Edit</label>

            <input data-rand="{{ $rand }}" data-type="Delete{{$objType}}" class="Delete{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}" name="permissions[]" type="checkbox"
                   {{--                           {{ permissionExist('delete'.$permission) && $item->hasPermissionTo('delete'.$permission) ? 'checked' :'' }}--}}
                   value="{{ 'delete'.$permission }}">
            <label class="form-check-label">Delete</label>
        </td>
    @endforeach
</tr>
@if (count($parent->noAssetChilds()) > 0)
    @foreach($parent->noAssetChilds() as $parent)
        @include('tree_files.tree_table', ['parent' => $parent,'level' => $level+1,'class' => $class.' level_'.$parent->combine_name])
    @endforeach
@endif
