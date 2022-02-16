<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function portable()
    {
        return $this->morphTo();
    }

    public static function updatePorts($model, $ports)
    {
        $model->ports()->delete();
        for ($count = 0; $count < count($ports['number']); $count++) {
            $model->ports()->create([
                'name' => $ports['name'][$count] ?? '',
                'number' => $ports['number'][$count] ?? '',
                'type' => $ports['type'][$count] ?? '',
                'speed' => $ports['speed'][$count] ?? '',
                'status' => isset($ports['status'][$count]) && $ports['status'][$count] && $ports['status'][$count] == 'on' ? 1 : 0,
                'ip_address' => $ports['ip_address'][$count] ?? '',
                'mac_address' => $ports['mac_address'][$count] ?? '',
                'nic' => $ports['nic'][$count] ?? '',
                'default_gateway' => $ports['default_gateway'][$count] ?? '',
                'network_id' => $ports['network'][$count] ?? '',
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
