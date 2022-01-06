<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    public $rules =
        [
            'firewall_asset_id' => 'required',
            'name' => 'required',
            'firewall_zone_id' => 'required',
            'firewall_address_group_id' => 'required',
            'firewall_destination_zone_id' => 'required',
            'firewall_destination_address_group_id' => 'required',
        ];

    public function ip_address(){
        return $this->belongsTo(FirewallIpAddress::class, 'firewall_ip_address_id');
    }
    public function asset(){
        return $this->belongsTo(Location::class,'firewall_asset_id');
    }
    public function zone_source(){
        return $this->belongsTo(FirewallZoon::class,'firewall_zone_id');
    }
    public function zone_destination(){
        return $this->belongsTo(FirewallZoon::class,'firewall_destination_zone_id');
    }
    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->firewall_asset_id)) $item->firewall_asset_id = $request->firewall_asset_id;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->firewall_zone_id)) $item->firewall_zone_id = $request->firewall_zone_id;
        if (isset($request->firewall_address_group_id)) $item->firewall_address_group_id = $request->firewall_address_group_id;
        if (isset($request->firewall_destination_zone_id)) $item->firewall_destination_zone_id = $request->firewall_destination_zone_id;
        if (isset($request->firewall_destination_address_group_id)) $item->firewall_destination_address_group_id = $request->firewall_destination_address_group_id;
        if (isset($request->destination)) $item->destination = $request->destination;
        if (isset($request->service)) $item->service = $request->service;
        if (isset($request->action)) $item->action = $request->action;
        if (isset($request->profile)) $item->profile = $request->profile;
        if (isset($request->options)) $item->options = $request->options;
        if (isset($request->target)) $item->target = $request->target;
        if (isset($request->rule_usage)) $item->rule_usage = $request->rule_usage;
        if (isset($request->rule_usage_app_screen)) $item->rule_usage_app_screen = $request->rule_usage_app_screen;
        if (isset($request->days_with_no_new_app)) $item->days_with_no_new_app = $request->days_with_no_new_app;
        $item->save();
        return $item;
    }
}
