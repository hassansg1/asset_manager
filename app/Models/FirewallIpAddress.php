<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirewallIpAddress extends Model
{
    use HasFactory;
    public $rules =
        [
            'asset_type' => 'required',
            'asset_id' => 'required',
            'asset_port' => 'required',
        ];

    public function saveFormData($item, $request)
    {
        if (isset($request->asset_type)) $item->asset_type = $request->asset_type;
        if (isset($request->asset_id)) $item->asset_id = $request->asset_id;
        if (isset($request->asset_nic)) $item->asset_nic = $request->asset_nic;
        if (isset($request->asset_port)) $item->asset_port = $request->asset_port;
        if (isset($request->default_gateway)) $item->default_gateway = $request->default_gateway;
        if (isset($request->ip_address)) $item->ip_address = $request->ip_address;
        if (isset($request->subnet_mask)) $item->subnet_mask = $request->subnet_mask;
        if (isset($request->connected_asset_type)) $item->connected_asset_type = $request->connected_asset_type;
        if (isset($request->connected_asset_id)) $item->connected_asset_id = $request->connected_asset_id;
        if (isset($request->connected_asset_nic)) $item->connected_asset_nic = $request->connected_asset_nic;
        if (isset($request->connected_asset_port)) $item->connected_asset_port = $request->connected_asset_port;
        if (isset($request->vlan_id)) $item->vlan_id = $request->vlan_id;
        if (isset($request->teaming_pair_id)) $item->teaming_pair_id = $request->teaming_pair_id;
        $item->save();
        return $item;
    }
}
