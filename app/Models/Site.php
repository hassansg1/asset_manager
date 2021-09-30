<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
        ];

    protected $appends = ['show_name','parentable_type','parentable_id'];

    public function getShowNameAttribute()
    {
        return $this->name;
    }


    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->arabic_name)) $item->arabic_name = $request->arabic_name;
        if (isset($request->code)) $item->code = $request->code;
        if (isset($request->existing_code)) $item->existing_code = $request->existing_code;
        if (isset($request->descriptive_location)) $item->descriptive_location = $request->descriptive_location;
        if (isset($request->location_dec_coordinate)) $item->location_dec_coordinate = $request->location_dec_coordinate;
        if (isset($request->location_deg_coordinate)) $item->location_deg_coordinate = $request->location_deg_coordinate;
        if (isset($request->location_google_link)) $item->location_google_link = $request->location_google_link;
        if (isset($request->remote_site)) $item->remote_site = $request->remote_site;
        if (isset($request->operator_control_center_site)) $item->operator_control_center_site = $request->operator_control_center_site;
        if (isset($request->local_scada_site)) $item->local_scada_site = $request->local_scada_site;
        if (isset($request->central_scada_site)) $item->central_scada_site = $request->central_scada_site;
        if (isset($request->function)) $item->function = $request->function;

        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
