<?php

namespace App\Http\Controllers;

use App\Models\InstalledPatch;
use App\Models\Patch;
use App\Models\PatchPolicy;
use Illuminate\Http\Request;

class PatchSoftwareApprovalController extends Controller
{
    //
    public function softwarePatchApproval(Request $request)
    {
        $softwareId = $request->softwareId;
        $patches = Patch::where('software_id', '!=', $softwareId)->get();
        dd($patches);
    }

    public function softwarePatchApprovalSave(Request $request)
    {
        $softwareId = $request->softwareId;
        if (!$softwareId)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Software Selected...!!!'
            ]);
        $patches = $request->patches;
        if (count($patches) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Patches Selected...!!!'
            ]);

        foreach ($patches as $patch) {
            PatchPolicy::create([
                'software_id' => $softwareId,
                'patch_id' => $patch,
                'approved' => 1
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Saved Successfully...!!!'
        ]);

    }

    public function softwarePatchApprovalDelete(Request $request)
    {
        $softwareId = $request->softwareId;
        if (!$softwareId)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Software Selected...!!!'
            ]);
        $patches = $request->patches;
        if (count($patches) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Patches Selected...!!!'
            ]);

        foreach ($patches as $patch) {
            $pol = PatchPolicy::find($patch);
            $pol->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully...!!!'
        ]);

    }

    public function patchSoftwareApprovalSave(Request $request)
    {
        $patchIds = $request->patch_ids;
        if (!$patchIds)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Patch Selected...!!!'
            ]);
        $softwares = $request->softwares;
        if (count($softwares) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Softwares Selected...!!!'
            ]);

        $softwares = array_unique($softwares);
        foreach ($softwares as $software) {
            if ($software != "undefined") {
                foreach ($patchIds as $patchId) {
                    PatchPolicy::updateOrCreate(
                        [
                            'software_id' => $software,
                            'patch_id' => $patchId,
                        ],
                        ['approved' => 1]
                    );
                }
            }

        }

        return response()->json([
            'status' => true,
            'message' => 'Data Saved Successfully...!!!'
        ]);

    }

    public function patchAssetInstallSave(Request $request)
    {
        $patchIds = $request->patch_ids;
        if (!$patchIds)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Patch Selected...!!!'
            ]);
        $assets = $request->asset_ids;
        if (count($assets) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Assets Selected...!!!'
            ]);

        foreach ($assets as $asset) {
            foreach ($patchIds as $patchId)
                InstalledPatch::create([
                    'asset_id' => $asset,
                    'patch_id' => $patchId,
                ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Saved Successfully...!!!'
        ]);

    }

    public function assetPatchInstallSave(Request $request)
    {
        $assetId = $request->assetId;
        if (!$assetId)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Asset Selected...!!!'
            ]);
        $patches = $request->patch_ids;
        if (count($patches) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Patches Selected...!!!'
            ]);

        foreach ($patches as $patch) {
            InstalledPatch::create([
                'asset_id' => $assetId,
                'patch_id' => $patch,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Saved Successfully...!!!'
        ]);

    }

    public function patchPolicyDelete(Request $request)
    {
        $items = $request->patchPolicyId;
        if (count($items) < 1)
            return response()->json([
                'status' => false,
                'message' => 'Error.No Items Selected...!!!'
            ]);

        foreach ($items as $item) {
            $pol = PatchPolicy::find($item);
            if ($pol)
                $pol->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully...!!!'
        ]);
    }
}
