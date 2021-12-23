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

     public function saveFormData($item, $request)
     {
       if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
       if (isset($request->first_name)) $item->first_name = $request->first_name;
       if (isset($request->last_name)) $item->last_name = $request->last_name;
       if (isset($request->email)) $item->email = $request->email;
       if (isset($request->username)) $item->username = $request->username;
       if (isset($request->designation_id)) $item->designation_id = $request->designation_id;
       if (isset($request->department_id)) $item->department_id = $request->department_id;
       if (isset($request->status)) $item->status = $request->status;
       if (isset($request->mobile_no)) $item->mobile_no = $request->mobile_no;
       $item->user_type = "OTCM-USERS";
       $item->save();

       $accounts= $request->account_id;
      if($item && $accounts){
        foreach ($accounts as $key=>$value) {
          $account = new UserAccount();
          $account->account_id = $value;
          $account->user_id = $item->id;
          $account->save();
        }
      }
   return $item;
}

}
