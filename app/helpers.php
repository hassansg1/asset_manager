<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Attachment;

if (!function_exists('getLang')) {
    function getLang($key)
    {
        $lang = __($key);

        if ($lang == $key)
            $lang = str_replace('_', ' ', $lang);
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
    function getAllPossibleChildTablesOfParent($parent)
    {
        return ['hierarcy', 'assets', 'l01 assets', 'network assets'];
        switch ($parent) {
            case 'App\Models\Company':
                return ['hierarcy', 'assets', 'sub_sites', 'assets'];
                break;
            case 'App\Models\Unit':
                return ['sites', 'sub_sites', 'assets'];
                break;
            case 'App\Models\Site':
                return ['sub_sites', 'assets'];
                break;
            case 'App\Models\SubSite':
                return ['assets'];
                break;
            default:
                return [];
        }
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
                if (!$header)
                    $header = $row;
                else {
                    if ($includeHeader)
                        $data[] = $row;
                    else
                        $data[] = array_combine($header, $row);
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

                $object->{ucwords(str_replace('_', ' ', $item))} = $value;
            }
        }
        return $object;
    }
}

if (!function_exists('checkIdComplianceIsApplicable')) {
    function checkIdComplianceIsApplicable($id)
    {
        $complianceData = \App\Models\ComplianceData::where('compliance_id', $id)->first();

        return $complianceData && $complianceData->applicable == 1;
    }
}


if (!function_exists('shortClassName')) {
    function shortClassName($name)
    {
        $exp = explode('\\', $name);
        return $exp[count($exp)-1];
    }
}
if (!function_exists('attachments')) {
    function attachments()
    {
        $attachments = Attachment::get();
        return $attachments;
    }
}

