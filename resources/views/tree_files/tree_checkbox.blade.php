@php($rand = rand(10000,100000))
<li class="">
    <div class="form-check form_check_location mb-3">
        <div class="form-check  form-check-inline">
            <input
{{--                {{ in_array($parent->combine_name,$item->locationsArray())? 'checked' : '' }}--}}
                class="form-check-input location_check" name="location[]"
                value="{{ $parent->combine_name }}"
                type="checkbox" id="formCheck{{ $rand }}">
            <label class="form-check-label" for="formCheck{{ $rand }}">
                {{$parent->getSelfName()}}
            </label>


        </div>
        @foreach(getAllPossibleChildTablesOfParent($parent->childable_type) as $objType)
            <div style="float: right;margin-left: 30px">
                @php($permission = $objType.$parent->childable_type.$parent->childable_id)
                <div class="form-check form-check-inline">
                    <input class="form-check-input permission_check" name="permissions[]" type="checkbox"
                           value="{{ 'view'.$permission }}"
{{--                        {{ permissionExist('view'.$permission) && $item->hasPermissionTo('view'.$permission) ? 'checked' :'' }}--}}
                    >
                    <label class="form-check-label">View</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input permission_check" name="permissions[]" type="checkbox"
{{--                           {{ permissionExist('create'.$permission) && $item->hasPermissionTo('create'.$permission) ? 'checked' :'' }}--}}
                           value="{{ 'create'.$permission }}">
                    <label class="form-check-label">Create</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input permission_check" name="permissions[]" type="checkbox"
{{--                           {{ permissionExist('edit'.$permission) && $item->hasPermissionTo('edit'.$permission) ? 'checked' :'' }}--}}
                           value="{{ 'edit'.$permission }}">
                    <label class="form-check-label">Edit</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input permission_check" name="permissions[]" type="checkbox"
{{--                           {{ permissionExist('delete'.$permission) && $item->hasPermissionTo('delete'.$permission) ? 'checked' :'' }}--}}
                           value="{{ 'delete'.$permission }}">
                    <label class="form-check-label">Delete</label>
                </div>
            </div>
        @endforeach
        </div>
{{--        <a class="collapsed float-end" data-bs-toggle="collapse" href="#collapse{{ $rand }}" aria-expanded="false"--}}
{{--           aria-controls="collapse{{ $rand }}">--}}
{{--            <i class="fas fa-edit" style="color: #556ee6"></i>--}}
{{--        </a>--}}
{{--        <div class="collapse" id="collapse{{ $rand }}" style="">--}}
{{--            <div class="card shadow-none card-body text-muted mb-0">--}}


{{--        </div>--}}
    </div>
    <hr>
    @if (count($parent->noAssetChilds()) > 0)
        <ul class="tree_ul_b">
            @foreach($parent->noAssetChilds() as $parent)
                @include('tree_files.tree_checkbox', $parent)
            @endforeach
        </ul>
    @endif
</li>
