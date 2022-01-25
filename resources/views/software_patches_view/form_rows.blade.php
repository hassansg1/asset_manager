@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->patch->show_name }}</td>
        @if(!isset($request->software_id))
            <td>
                @php($ids = explode(',',$item->ids))
                <ul>
                    @foreach(explode(',',$item->softwares) as $software)
                        <li>
                            {{ $software }}
                        </li>
                    @endforeach
                </ul>
            </td>
        @endif
    </tr>
@endforeach
