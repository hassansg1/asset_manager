<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    use HasFactory;
    public $rules =
        [
            'name' => 'required',
            'policy_id' => 'required',
            'firewall_asset_id' => 'required',
        ];

    public function ip_address(){
        return $this->belongsTo(FirewallIpAddress::class, 'firewall_ip_address_id');
    }
    public function policy(){
        return $this->belongsTo(Policy::class,'policy_id');
    }
    public function asset(){
        return $this->belongsTo(Location::class,'firewall_asset_id');
    }
    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->firewall_asset_id)) $item->firewall_asset_id = $request->firewall_asset_id;
        if (isset($request->policy_id)) $item->policy_id = $request->policy_id;
        if (isset($request->description)) $item->description = $request->description;
        $item->save();
        return $item;
    }
}
