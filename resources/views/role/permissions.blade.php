<div class="row">

    <div class="table-responsive">
        <table class="table mb-0">

            <thead>
            <tr>
                <th>Location</th>
                <th>Hierarchy</th>
                <th>Computer Asset</th>
                <th>L01 Asset</th>
                <th>Network Asset</th>
            </tr>
            </thead>
            <tbody>
            @include('tree_files.tree_table_test')
            </tbody>
        </table>
    </div>

    <div class="table-responsive table-bordered ">
        <table class="table mb-0">
            <thead>
            <tr>
                @foreach(getAllPermissions() as $permission)
                    <th>
                        <input
                            class=" form-check-input"
                            name="allow_permissions[]"
                            type="checkbox"
                            id="{{$permission->id}}"
                            value="{{$permission->name}}"
                            {{ isset($item) && in_array($permission->id,$assigned_permissions)  ? 'checked' : ''}}
                        >
                        <label class="form-check-label">{{$permission->name}}</label><br>
                    </th>
                @endforeach
            </tr>
            </thead>
        </table>
    </div>
</div>
