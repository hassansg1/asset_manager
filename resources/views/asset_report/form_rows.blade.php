@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @if(in_array('rec_id',$selectedColumns))
            <td>{{ $item->rec_id }}</td>
        @endif
        @if(in_array('name',$selectedColumns))
            <td>{{ $item->name }}</td>
        @endif
        @if(in_array('description',$selectedColumns))
            <td>{{ $item->description }}</td>
        @endif
        @if(in_array('asset_function',$selectedColumns))
            <td>{{ $item->assetFunction->name }}</td>
        @endif
        @if(in_array('asset_make',$selectedColumns))
            <td>{{ $item->assetMake->name }}</td>
        @endif
        @if(in_array('model',$selectedColumns))
            <td>{{ $item->model }}</td>
        @endif
        @if(in_array('port_number',$selectedColumns))
            <td>{{ $item->port_number }}</td>
        @endif
        @if(in_array('serial_number',$selectedColumns))
            <td>{{ $item->serial_number }}</td>
        @endif
        @if(in_array('comments',$selectedColumns))
            <td>{{ $item->comments }}</td>
        @endif
        @if(in_array('asset_security_zone',$selectedColumns))
            <td>{{ $item->assetSecurityZone->name }}</td>
        @endif
    </tr>
@endforeach
