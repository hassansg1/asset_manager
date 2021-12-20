<div class="tab-pane" id="settings" role="tabpanel">
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Select Role(s)</label>
                <select name="roles[]" class="select2 form-control select2-multiple"
                        multiple="multiple"
                        data-placeholder="Choose ...">
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                        <option
                            {{ isset($item) && $item->hasRole($role) ? 'selected' : '' }}
                            value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Select Permission(s) - Other than the
                    role's permissions</label>
                <select name="permissions[]"
                        class="select2 form-control select2-multiple"
                        multiple="multiple"
                        data-placeholder="Choose ...">
                    @foreach(getGroupedPermissions() as $permissionGroup => $permissions)
                        <optgroup label="{{ ucwords($permissionGroup) }}">
                            @foreach($permissions as $id => $permission)
                                <option
                                    {{ isset($item) && $item->hasPermissionTo($permission) ? 'selected' : '' }}
                                    value="{{ $permission }}">{{ ucwords($permission) }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
        </div>
    </div>

</div>
