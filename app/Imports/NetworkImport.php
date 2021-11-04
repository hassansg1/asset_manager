<?php

namespace App\Imports;

use App\Models\Networks;
use Maatwebsite\Excel\Concerns\ToModel;

class NetworkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Networks([
            //
        ]);
    }
}
