<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	use HasFactory;

    public function rules($function = null)
    {
        return [
            'name' => 'required|unique:systems,name,NULL,id,function,' . $function
        ];
    }

    public function system_assets(){
        return $this->belongsTo(SystemAssets::class, 'id', 'system_id');
    }

    public function system_type(){
        return $this->hasOne(AssetFunction::class, 'id', 'function');
    }

    /**
     * @param $value
     */
    public function setFunctionAttribute($value)
    {
        if (!is_numeric($value) || AssetFunction::find($value) == null) {
            $value = AssetFunction::createNew($value);
        }
        $this->attributes['function'] = $value;
    }

	public function saveFormData($item, $request)
	{
		if (isset($request->name)) $item->name = $request->name;
        if (isset($request->function)) $item->function = $request->function;
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
        $result= SystemAssets::where('system_id',$item->id)->delete();
		$assests= $request->asset_id;
		if($item && $assests){
                foreach($assests as $value) {
                    $system_assets = new SystemAssets();
                    $system_assets->system_id = $item->id;
                    $system_assets->asset_id = $value;
                    $system_assets->save();
                }
		}
		return $item;
	}
}
