<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $guarded = [];
    public static $repo = 'PortReportRepo';

    public function connectedPort()
    {
        return $this->belongsTo(Port::class, 'connected_port_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public static function updatePorts($model, $ports)
    {
        for ($count = 0; $count < count($ports['number']); $count++) {
            if (isset($ports['id'][$count])) $port = Port::find($ports['id'][$count]);
            else $port = Port::create([]);

            $networkId = $ports['network'][$count] ?? '';
            if (isset($ports['connected_port_id'][$count])) {
                $connectedPort = Port::find($ports['connected_port_id'][$count]);
                $networkId = $connectedPort->network_id ?? '';
            }

            if ($model->type == 'network'){
                $rand = $ports['rand'][$count];
                $status = isset($ports['status'][$rand]) && $ports['status'][$rand] && $ports['status'][$rand] == 'on' ? 0 : 1;
            }else{
                $status = isset($ports['status']) && $ports['status'] && $ports['status'] == 'on' ? 0 : 1;
            }
            $port->update([
                'location_id' => $model->id,
                'name' => $ports['name'][$count] ?? '',
                'number' => $ports['number'][$count] ?? '',
                'type' => $ports['type'][$count] ?? '',
                'speed' => $ports['speed'][$count] ?? '',
                'status' => $status,
                'ip_address' => $ports['ip_address'][$count] ?? '',
                'mac_address' => $ports['mac_address'][$count] ?? '',
                'nic' => $ports['nic'][$count] ?? '',
                'default_gateway' => $ports['default_gateway'][$count] ?? '',
                'network_id' => $networkId,
                'connected_port_id' => $ports['connected_port_id'][$count] ?? '',
                'sub_net_mask' => $ports['sub_net_mask'][$count] ?? '',
                'dhcp_server' => $ports['dhcp_server'][$count] ?? '',
            ]);
        }
    }

    public function network()
    {
        return $this->belongsTo(Networks::class);
    }
}
