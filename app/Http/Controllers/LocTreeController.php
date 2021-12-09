<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocTreeController extends Controller
{
    //
    public function sidebar_tree()
    {
        $locations = Role::locationsArray();
        $tree = [];
        foreach ($locations as $location) {
            $nodes = Location::descendantsAndSelf($location)->toFlatTree()->toArray();
            $subTree =  buildTree($nodes, $location);
            $parentNode = $nodes[0];
            $parentNode['href'] = route('view/assets',$nodes[0]['id']);
            $parentNode['nodes'] = $subTree;
            $nodeTree[0] = (object) $parentNode;
            $tree = array_merge($tree,$nodeTree );
        }

        return response()->json([
            'status' => true,
            'tree' => $tree
        ]);
    }
}
