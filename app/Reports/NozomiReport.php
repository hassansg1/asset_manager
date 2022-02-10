<?php

namespace App\Reports;

use App\Models\NozomiData;
use App\Models\Port;
use Barryvdh\DomPDF\Facade\Pdf;

class NozomiReport
{
    public function generate($pdf = false)
    {
        $nozomiData = NozomiData::all();
        if (count($nozomiData) == 0)
            return view('nozomi_report.no_data');

        $otcmPorts = Port::all();

        $nozomiDevices = $nozomiData->pluck('ip_address')->toArray();
        $otcmDevices = $otcmPorts->pluck('ip_address')->toArray();

        $existInNozomi = array_diff($nozomiDevices, $otcmDevices);
        $existInOTCM = array_diff($otcmDevices, $nozomiDevices);
        $commonDevices = array_intersect($otcmDevices, $nozomiDevices);


        $existInNozomi = $nozomiData->whereIn('ip_address', $existInNozomi);
        $existInOTCM = $otcmPorts->whereIn('ip_address', $existInOTCM);
        $existInBoth = [];

        foreach ($commonDevices as $commonDevice) {
            $otcm = $otcmPorts->where('ip_address', $commonDevice)->first();
            $nozomi = $nozomiData->where('ip_address', $commonDevice)->first();
            $difference = $this->getDifferences($otcm, $nozomi);
            if ($difference)
                $existInBoth[$commonDevice] = $difference;
        }

        if ($pdf) return Pdf::loadView('nozomi_report.content', compact('existInNozomi', 'existInOTCM', 'existInBoth'));

        return view('nozomi_report.index')->with(compact('existInNozomi', 'existInOTCM', 'existInBoth'));
    }

    public function getDifferences($otcm, $nozomi)
    {
        $difference = [];
        if ($nozomi->properties->mac_address != $otcm->mac_address) $difference['Mac Address'] = [$nozomi->properties->mac_address, $otcm->mac_address];
        if ($nozomi->properties->name != $otcm->portable->name) $difference['Name'] = [$nozomi->properties->name, $otcm->portable->name];
        if ($nozomi->properties->serial_number != $otcm->portable->serial_number) $difference['Serial Number'] = [$nozomi->properties->serial_number, $otcm->portable->serial_number];

        if (count($difference) == 0) return false;

        return $difference;
    }
}
