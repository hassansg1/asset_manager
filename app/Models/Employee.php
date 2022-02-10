<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	use HasFactory;
	public $table = 'users';

     /**
     * @return string
     */
     public function getNameAttribute(): string
     {
     	return $this->first_name . " " . $this->last_name;
     }
    public function rules($parentId = null)
    {
        return [
            'first_name' => 'required | max:255',
            'unit_id' => 'required',
            'email' => 'required',
        ];
    }

    public function designation(){
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

     public function saveFormData($item, $request)
     {
         $item->rec_id = 0;
       if (isset($request->first_name)) $item->first_name = $request->first_name;
       if (isset($request->last_name)) $item->last_name = $request->last_name;
       if (isset($request->email)) $item->email = $request->email;
       if (isset($request->designation_id)) $item->designation_id = $request->designation_id;
       if (isset($request->department_id)) $item->department_id = $request->department_id;
       if (isset($request->status)) $item->status = $request->status ?? 1;
       if (isset($request->mobile_no)) $item->mobile_no = $request->mobile_no;
       if (isset($request->unit_id)) $item->unit_id = $request->unit_id;
       $item->username = $request->first_name;
       $item->user_type = "OTCM-USERS";
       $item->save();

       $accounts= $request->account_id;
      if($item && $accounts){
        foreach ($accounts as $key=>$value)  {
            $assets_rights = new UserAccount();
            $assets_rights->account_id = $value;
            $assets_rights->user_id   = $item->id;
            $assets_rights->save();
        }
      }
   return $item;
}

}
