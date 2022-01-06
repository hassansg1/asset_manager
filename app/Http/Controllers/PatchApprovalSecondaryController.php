<?php

namespace App\Http\Controllers;

use App\Models\Patch;
use App\Models\PatchPolicy;
use App\Models\Software;
use Illuminate\Http\Request;

class PatchApprovalSecondaryController extends Controller
{
    //

    public function bulkApprove(Request $request)
    {
        $softwares = Software::all();
        $patchesId = $request->elements;
        $patches = Patch::whereIn('id', $patchesId)->get();

        return response()->json(
            [
                'status' => true,
                'html' => view('patch_approved.patch_software_approved')->with([
                    'items' => $patches,
                    'softwares' => $softwares
                ])->render(),
            ]
        );
    }

    public function bulkApproveSave(Request $request)
    {
        $patchesId = $request->patch_id;
        foreach ($patchesId as $key => $patchId) {
            PatchPolicy::where('patch_id', $patchId)->delete();
            $softwares = $request->software[$patchId] ?? [];
            foreach ($softwares as $software) {
                PatchPolicy::create([
                    'patch_id' => $patchId,
                    'software_id' => $software,
                    'approved' => 1
                ]);
            }
        }

        return response()->json(
            [
                'status' => true
            ]
        );
    }

    public function bulkApproveSoftware(Request $request)
    {
        $patches = Patch::all();
        $softwaresId = $request->elements;
        $softwares = Software::whereIn('id', $softwaresId)->get();

        return response()->json(
            [
                'status' => true,
                'html' => view('patch_approved.software_patch_approved')->with([
                    'items' => $softwares,
                    'patches' => $patches
                ])->render(),
            ]
        );
    }

    public function bulkApproveSoftwareSave(Request $request)
    {
        $softwares = $request->software;
        foreach ($softwares as $key => $software) {
            PatchPolicy::where('software_id', $software)->delete();
            $patches = $request->patch_id[$software] ?? [];
            foreach ($patches as $patch) {
                PatchPolicy::create([
                    'patch_id' => $patch,
                    'software_id' => $software,
                    'approved' => 1
                ]);
            }
        }

        return response()->json(
            [
                'status' => true
            ]
        );
    }

}
