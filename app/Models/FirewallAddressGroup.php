<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirewallAddressGroup extends Model
{
    use HasFactory;

    public $rules =
        [
            'name' => 'required',
            'firewall_asset_id' => 'required',
        ];

    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->firewall_asset_id)) $item->firewall_asset_id = $request->firewall_asset_id;
        $item->save();
        return $item;
    }
}
