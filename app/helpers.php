<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Attachment;
use Illuminate\Support\Facades\DB;

if (!function_exists('getLang')) {
    function getLang($key)
    {
        $lang = __($key);

        if ($lang == $key)
            $lang = str_replace('_', '', $lang);
        return $lang;
    }
}

if (!function_exists('universalDateFormatter')) {
    function universalDateFormatter($date)
    {
        return $date ? $date->format('Y/m/d h:i:s') : '';
    }
}

if (!function_exists('flashSession')) {
    function flashSession($message, $type = 'success')
    {
        if (Session::get('approvalRequest') == 1) {
            $message = 'Change submitted for approval';
            Session::forget('approvalRequest');
        }
        Session::flash('message', $message);
        Session::flash('alert-class', $type);
    }
}

if (!function_exists('flashSuccess')) {
    function flashSuccess($message)
    {
        flashSession($message);
    }
}
if (!function_exists('flashError')) {
    function flashError($message)
    {
        flashSession($message, 'error');
    }
}
if (!function_exists('flashInfo')) {
    function flashInfo($message)
    {
        flashSession($message, 'info');
    }
}
if (!function_exists('flashWarning')) {
    function flashWarning($message)
    {
        flashSession($message, 'warning');
    }
}
if (!function_exists('getUnit')) {
    function getUnit()
    {
        return \App\Models\Unit::all();
    }
}
if (!function_exists('getStatus')) {
    /**
     * return status array
     */
    function getStatus()
    {
      return [
        '1' => 'Active',
        '0' => 'InActive',
      ];
    }
}
if (!function_exists('getDepartments')) {
    function getDepartments()
    {
        return \App\Models\Department::all();
    }
}
if (!function_exists('getRights')) {
    function getRights()
    {
        return \App\Models\Right::all();
    }
}
if (!function_exists('getComputerAssets')) {
    function getComputerAssets()
    {
        return DB::table('locations')->get();
    }
}
if (!function_exists('getAssociatIds')) {
    function getAssociatIds()
    {
        return \App\Models\UserId::all();
    }
}
if (!function_exists('getSystems')) {
    function getSystems()
    {
        return \App\Models\System::all();
    }
}

if (!function_exists('getDesignations')) {
    function getDesignations()
    {
        return \App\Models\Designation::all();
    }
}
if (!function_exists('getCompanies')) {
    function getCompanies()
    {
        return \App\Models\Company::all();
    }
}
if (!function_exists('getProducts')) {
    function getProducts()
    {
        return \App\Models\Product::all();
    }
}
if (!function_exists('getServices')) {
    function getServices()
    {
        return \App\Models\Service::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('getBranches')) {
    function getBranches()
    {
        return \App\Models\Branch::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('lgUId')) {
    function lgUId(): int
    {
        return \Illuminate\Support\Facades\Auth::user()->id ?? 0;
    }
}
if (!function_exists('getGroupedPermissions')) {
    function getGroupedPermissions()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        return $permissions->mapToGroups(function ($item, $key) {
            return [$item['group'] => $item['name']];
        });

    }
}
if (!function_exists('permissionExist')) {
    function permissionExist($name)
    {
        return \Spatie\Permission\Models\Permission::where('name', $name)->first();

    }
}

if (!function_exists('doUserHasPermission')) {
    function doUserHasPermission($name, $user = null)
    {
        $user = $user ?? \Illuminate\Support\Facades\Auth::user();
        return \Spatie\Permission\Models\Permission::where('name', $name)->first() && $user->hasPermissionTo($name);

    }
}


if (!function_exists('checkIfSuperAdmin')) {
    function checkIfSuperAdmin($user = null)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        return $user->hasRole('Super Admin');

    }
}

if (!function_exists('getAllPossibleChildTablesOfParent')) {
    function getAllPossibleChildTablesOfParent()
    {
        return ['hierarcy', 'assets', 'l01 assets', 'network assets'];
    }
}


if (!function_exists('getHelpSectionText')) {
    function getHelpSectionText()
    {
        $help = \App\Models\HelpSection::where(['route_name' => str_replace('\\', '', \Illuminate\Support\Facades\Route::currentRouteAction())])->first();
        if ($help)
            return $help->help_content;

        return '';
    }
}


if (!function_exists('rec_id_replacer')) {
    function rec_id_replacer($error)
    {
        return str_replace('rec id', 'id', $error);
    }
}


if (!function_exists('currentUserId')) {
    function currentUserId()
    {
        return Auth::user()->id ?? null;
    }
}

if (!function_exists('csvToArray')) {
    function csvToArray($filename = '', $delimiter = ',', $includeHeader = false)
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $rowString = implode("", $row);
                if (trim($rowString) != "") {
                    if (!$header)
                        $header = $row;
                    else {
                        if ($includeHeader)
                            $data[] = $row;
                        else
                            $data[] = array_combine($header, $row);
                    }
                }
            }
            fclose($handle);
        }

        if ($includeHeader) {
            $data[] = $header;
        }

        return ['header' => $header, 'data' => $data];
    }

}


if (!function_exists('getNotifications')) {
    function getNotifications($limited = false)
    {
        $notifications = Auth::user()->userNotifications;
        return $notifications;
    }
}


if (!function_exists('getThreeNotifications')) {
    function getThreeNotifications($limited = false)
    {
        $notifications = Auth::user()->userFirstThreeNotifications;
        return $notifications;
    }
}

if (!function_exists('formatFieldsForFrontEnd')) {
    function formatFieldsForFrontEnd($obj)
    {
        $object = new stdClass();
        if ($obj) {
            foreach ($obj as $item => $value) {

                $object->{ucwords(str_replace('_', '', $item))} = $value;
            }
        }
        return $object;
    }
}

if (!function_exists('getClauseData')) {
    function getClauseData($id)
    {
        return \App\Models\ClauseData::where('clause_id', $id)->first();

    }
}


if (!function_exists('shortClassName')) {
    function shortClassName($name)
    {
        $exp = explode('\\', $name);
        return $exp[count($exp) - 1];
    }
}

if (!function_exists('sanitizeInput')) {
    function sanitizeInput($value)
    {
        return utf8_encode($value);
    }
}

if (!function_exists('assetCondition')) {
    function assetCondition($model)
    {
        $modelClass = get_class($model);
        return $modelClass == "App\Models\Computer" || $modelClass == "App\Models\NetworkAsset" || $modelClass == "App\Models\LoneAsset";
    }
}

if (!function_exists('assetCondition')) {
    function assetCondition($model)
    {
        $modelClass = get_class($model);
        return $modelClass == "App\Models\Computer" || $modelClass == "App\Models\NetworkAsset" || $modelClass == "App\Models\LoneAsset";
    }
}

if (!function_exists('tableColumnsMapping')) {
    function tableColumnsMapping($table, $method, $column = null)
    {
        $mappingArray = [
            'units' => [
                'rec_id' => 'Unit ID',
                'short_name' => 'Unit Name',
                'long_name' => 'Unit Long Name',
                'contact_person' => 'Contact Person',
            ],
            'sites' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Site ID',
                'name' => 'Site Name',
                'arabic_name' => 'Site Name(Arabic)',
                'description' => 'Site Description',
                'descriptive_location' => 'Site Location(Descriptive)',
                'location_dec_coordinate' => 'Site Location(Coordinates - Dec)',
                'location_deg_coordinate' => 'Site Location(Coordinates - Deg)',
                'location_google_link' => 'Site Location(Google Link)',
                'main_process_equipment' => 'Main Process / Equipment',
            ],
            'sub_sites' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'SubSite ID',
                'name' => 'SubSite Name',
                'arabic_name' => 'SubSite Name(Arabic)',
                'description' => 'SubSite Description',
                'descriptive_location' => 'SubSite Location(Descriptive)',
                'location_dec_coordinate' => 'SubSite Location(Coordinates - Dec)',
                'location_deg_coordinate' => 'SubSite Location(Coordinates - Deg)',
                'location_google_link' => 'SubSite Location(Google Link)',
                'main_process_equipment' => 'Main Process / Equipment',
            ],
            'buildings' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Building ID',
                'name' => 'Building Name',
            ],
            'rooms' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Room ID',
                'name' => 'Room Name',
            ],
            'cabinets' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Cabinet ID',
                'name' => 'Cabinet Name',
            ],
            'computer_assets' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Asset ID',
                'name' => 'Asset Name',
                'description' => 'Asset Description',
                'function' => 'Asset Function',
                'make' => 'Asset Make',
                'model' => 'Asset Model',
                'part_number' => 'Asset Part Number',
                'serial_number' => 'Asset Serial Number',
                'security_zone' => 'Security Zone',
                'operating_system' => 'Operating System',
                'vm_host' => 'VM Host',
                'connected_scada_server' => 'Connected SCADA Server',
                'contact' => 'Asset Contact Person',
                'comment' => 'Comments',
            ],
            'network_assets' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Asset ID',
                'name' => 'Asset Name',
                'description' => 'Asset Description',
                'function' => 'Asset Function',
                'make' => 'Asset Make',
                'model' => 'Asset Model',
                'part_number' => 'Asset Part Number',
                'serial_number' => 'Asset Serial Number',
                'security_zone' => 'Security Zone',
                'asset_firmware' => 'Asset Firmware',
                'redundant_pair_id' => 'Redundant Asset Pair ID (If Applicable)',
                'asset_contact_person' => 'Asset Contact Person',
                'comment' => 'Comments',
            ],
            'lone_assets' => [
                'parent_type' => 'Parent Type',
                'parent_id' => 'Parent ID',
                'rec_id' => 'Asset ID',
                'name' => 'Asset Name',
                'description' => 'Asset Description',
                'function' => 'Asset Function',
                'make' => 'Asset Make',
                'model' => 'Asset Model',
                'part_number' => 'Asset Part Number',
                'serial_number' => 'Asset Serial Number',
                'security_zone' => 'Security Zone',
                'asset_firmware' => 'Asset Firmware',
                'redundant_pair_id' => 'Redundant Asset Pair ID (If Applicable)',
                'connected_scada_server' => 'Connected SCADA Server',
                'owner_contact' => 'Asset Contact Person',
                'asset_parent_code' => 'Asset Parent ID',
                'comment' => 'Comments',
            ],
            'clauses' => [
                'number' => 'Clause Number',
                'title' => 'Clause Title',
                'description' => 'Clause Description',
            ],
            'attachments' => [
                'documentNumber' => 'Document Number',
                'version' => 'Document Version',
                'date' => 'Document Date',
                'title' => 'Document Title',
                'description' => 'Document Description',
                'category' => 'Document Category',
                'subCategory' => 'Document Subcategory',
            ],

        ];

        $tableMap = $mappingArray[$table];
        if ($method == "export")
            return array_values($tableMap);
        if ($method == "import")
            return array_search($column, $tableMap);
    }
}

if (!function_exists('tableNamesMapping')) {
    function tableNamesMapping($table, $method)
    {
        $mappingArray = [
            'companies' => 'Company',
            'units' => 'Unit',
            'sites' => 'Site',
            'sub_sites' => 'SubSite',
            'buildings' => 'Building',
            'rooms' => 'Room',
            'cabinets' => 'Cabinet',
            'computer_assets' => 'Asset Computer',
            'network_assets' => 'Asset Network',
            'lone_assets' => 'Asset L01',
            'attachments' => 'Attachment',
        ];

        if ($method == "export")
            return $mappingArray[$table];
        if ($method == "import")
            return array_search($table, $mappingArray);
    }
}
if (!function_exists('attachments')) {
    function attachments()
    {
        $attachments = Attachment::get();
        return $attachments;
    }
}


if (!function_exists('getComplianceStatus')) {
    function getComplianceStatus($version, $id, $location)
    {

        $data = \App\Models\ComplianceVersionItem::where([
            'compliance_version_id' => $version,
            'compliance_data_id' => $id,
            'location_id' => $location,
        ])->first();

        return $data;
    }
}


if (!function_exists('getAllParents')) {
    function getAllParents()
    {
        return \App\Models\Parentable::getAllParents();
    }
}

if (!function_exists('getAncestorsForLocation')) {
    function getAncestorsForLocation($locationId)
    {
        return \App\Models\Location::ancestorsAndSelf($locationId);
    }
}
if (!function_exists('getAncestors')) {
    function getAncestors($locationId)
    {
        return \App\Models\Location::ancestorsOf($locationId);

    }
}

function buildTree(array $elements, $parentId = 0)
{
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['nodes'] = $children;
            }
            $element['href'] = route('view/assets', $element['id']);
            $branch[] = (object)$element;
        }
    }

    return $branch;
}
