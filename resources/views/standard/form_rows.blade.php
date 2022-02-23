@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>
            {{ $item->name }}
        </td>
        <td>
            <button class="btn btn-primary">
                <a style="color: white" href="{{ url('standards/view/'.$item->id.'/clause') }}">View Clauses</a>
            </button>
            <button style="margin-left: 5px" class="btn btn-primary">
                <a style="color: white" href="{{ route('standards.clause.index',$item->id) }}">Edit Clauses</a>
            </button>
        </td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
