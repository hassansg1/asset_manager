<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">User Name : <b>{{$item->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>Assigned ID's</h5>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>User Id</th>
                    <th>System/Asset</th>
                    <th>Right</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userIds as $value)
                    <tr id="{{ $value->id }}">
                        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $value->id }}"--}}
                        {{--                               id="select_check_{{ $value->id }}" class="select_row"></td>--}}
                        <td>{{ $value->user_id }}</td>
                        <td>
                            @if($value->parent == "asset")
                                <i>AST:</i> {{ $value->user_id_assets->rec_id }}
                            @elseif($value->parent == "system")
                                <i>SYS:</i> {{ $value->user_id_systems->name }}
                            @endif
                        </td>
                        <td>{{ $value->user_rights_id->rights_name->name }}</td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
