<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirewallImport extends Model
{
    use HasFactory;
    protected $table = 'firewall_managments';

    public $rules =
        [
            'source_zone' => 'required',
            'source_location' => 'required',
            'source_asset' => 'required',
            'destination_zone' => 'required',
            'destination_location' => 'required',
            'destination_asset' => 'required',
            'applicatin_port' => 'required',
            'condition' => 'required',
            'approved_by' => 'required',
        ];

    public function saveFormData($item, $request)
    {
        if (isset($request->source_zone)) $item->source_zone = $request->source_zone;
        if (isset($request->source_location)) $item->source_location = $request->source_location;
        if (isset($request->source_asset)) $item->source_asset = "[".json_encode($request->source_asset)."]";
        if (isset($request->destination_zone)) $item->destination_zone = $request->destination_zone;
        if (isset($request->destination_location)) $item->destination_location = $request->destination_location;
        if (isset($request->destination_asset)) $item->destination_asset = "[".json_encode($request->destination_asset)."]";
        if (isset($request->applicatin_port)) $item->applicatin_port = $request->applicatin_port;
        if (isset($request->port)) $item->port = $request->port;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->condition)) $item->condition = $request->condition;
        if (isset($request->approvel_expirey_date)) $item->approvel_expirey_date = $request->approvel_expirey_date;
        if (isset($request->approved_by)) $item->approved_by = $request->approved_by;
        $item->save();
        return $item;
    }
}
