<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">User ID : <b>{{$item->user_id}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h5>
        @if($item->parent == "asset")
            <i>AST:</i> {{ $item->user_id_assets->rec_id }}
        @elseif($item->parent == "system")
            <i>SYS:</i> {{ $item->user_id_systems->name }}
        @endif
    </h5>
    <h5>Assigned User</h5>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Unit</th>
                    <th>User</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $value)
                    <tr id="{{ $value->id }}">
                        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $value->id }}"--}}
                        {{--                               id="select_check_{{ $value->id }}" class="select_row"></td>--}}
                        @if($value->user_unit)
                            <td>{{ $value->user_unit->rec_id }}</td>
                        @else
                            <td></td>
                        @endif
                        <td>{{ $value->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
