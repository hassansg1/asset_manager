<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->clause)) $item->clause = $request->clause;
        if (isset($request->section)) $item->section = $request->section;
        if (isset($request->objective)) $item->objective = $request->objective;
        if (isset($request->control)) $item->control = $request->control;
        if (isset($request->policies)) $item->policies = $request->policies;
        if (isset($request->policies_extended)) $item->policies_extended = $request->policies_extended;
        if (isset($request->nwc_applicable)) $item->nwc_applicable = $request->nwc_applicable;
        if (isset($request->action_item)) $item->action_item = $request->action_item;
        if (isset($request->compliant)) $item->compliant = $request->compliant;
        if (isset($request->proof)) $item->proof = $request->proof;

        $item->save();
        return $item;
    }
}
