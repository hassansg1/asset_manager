@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @if(in_array('parent',$selectedColumns))
            <td>{{ $item->parentName }}</td>
        @endif
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
            <td>{{ $item->assetFunction->name ?? '' }}</td>
        @endif
        @if(in_array('asset_make',$selectedColumns))
            <td>{{ $item->assetMake->name ?? '' }}</td>
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
            <td>{{ $item->assetSecurityZone->name ?? '' }}</td>
        @endif
        @if(in_array('vm_host',$selectedColumns))
            <td>{{ $item->vm_host }}</td>
        @endif
        @if(in_array('operating_system',$selectedColumns))
            <td>{{ $item->operatingSystem->name ?? '' }}</td>
        @endif
        @if(in_array('asset_firmware',$selectedColumns))
            <td>{{ $item->asset_firmware ?? '' }}</td>
        @endif
        @if(in_array('connected_scada_server',$selectedColumns))
            <td>{{ $item->connected_scada_server ?? '' }}</td>
        @endif
        @if(in_array('hardware_legacy',$selectedColumns))
            <td>{{ isset($item->hardware_legacy) ?  ($item->hardware_legacy == 1 ? 'Active' : 'Obsolete') : '' }}</td>
        @endif
        @if(in_array('software_legacy',$selectedColumns))
            <td>{{ isset($item->software_legacy) ?  ($item->software_legacy == 1 ? 'Active' : 'Obsolete') : '' }}</td>
        @endif
        @if(in_array('single_point_of_failure',$selectedColumns))
            <td>{{ isset($item->single_point_of_failure) ?  ($item->single_point_of_failure == 1 ? 'Yes' : 'No') : '' }}</td>
        @endif
        @if(in_array('criticality',$selectedColumns))
            <td>
                @if(isset($item->criticality) && $item->criticality == 1)
                    High
                @elseif($item->criticality == 2)
                    Medium
                @elseif($item->criticality == 3)
                    Low
                @endif
            </td>
        @endif
        @if(in_array('contact',$selectedColumns))
            <td>{{ $item->contact ?? '' }}</td>
        @endif
    </tr>
@endforeach
