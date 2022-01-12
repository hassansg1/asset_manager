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

     public $rules =
     [
     	'first_name' => 'required | max:255',
         'email' => 'required | email',
     ];

    public function designation(){
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function userAccount(){
        return $this->belongsTo(UserAccount::class, 'id', 'user_id');
    }

     public function saveFormData($item, $request)
     {
         $item->rec_id = 0;
       if (isset($request->first_name)) $item->first_name = $request->first_name;
       if (isset($request->last_name)) $item->last_name = $request->last_name;
       if (isset($request->email)) $item->email = $request->email;
       if (isset($request->designation_id)) $item->designation_id = $request->designation_id;
       if (isset($request->department_id)) $item->department_id = $request->department_id;
       if (isset($request->status)) $item->status = $request->status;
       if (isset($request->mobile_no)) $item->mobile_no = $request->mobile_no;
       if (isset($request->unit_id)) $item->unit_id = $request->unit_id;
       if (isset($request->site_id)) $item->site_id = $request->site_id;
       if (isset($request->sub_site_id)) $item->sub_site_id = $request->sub_site_id;
       $item->user_type = "OTCM-USERS";
       $item->save();

       UserAccount::where('user_id', $item->id)->delete();
       $accounts= $request->account_id;
      if($item && $accounts){
        foreach ($accounts as $key=>$value)  {
            $assets_rights = UserAccount::updateOrCreate(
                [
                    'user_id'   => $item->id,
                    'account_id'   => $value,
                ],
            );
        }
      }
   return $item;
}

}
