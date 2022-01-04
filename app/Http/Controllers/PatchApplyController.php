<?php

namespace App\Http\Controllers;

use App\Models\Patch;
use Illuminate\Http\Request;

class PatchApplyController extends Controller
{
    //
    public function bulkApplyPatches(Request $request)
    {
        $patches = Patch::whereIn('id', $request->elements)->where('is_required', 1)->get();

        return response()->json(
            [
                'status' => true,
                'html' => view('patch_apply.patch_apply')->with([
                    'items' => $patches,
                ])->render(),
            ]
        );
    }
}
