<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class FirewallAddressGroupMembers extends Model
{
    use HasFactory;

    public $rules =
        [
            'firwall_group_id' => 'required',
            'firewall_ip_address_id' => 'required',
        ];
    public function firewall_group(){
        return $this->belongsTo(FirewallAddressGroup::class, 'firewall_address_group_id', 'id');
    }

    public function saveFormData($item, $request)
    {
        $firewall_ip_address_id = $request->firewall_ip_address_id;
        if($item && $firewall_ip_address_id){
            foreach($firewall_ip_address_id as $key=>$value){
                $item->firewall_address_group_id = $request->firwall_group_id;
                $item->firewall_ip_address_id = $value;
                $item->save();
            }
        }

        return $item;
    }
}
