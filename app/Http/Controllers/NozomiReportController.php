<?php

namespace App\Http\Controllers;

use App\Reports\BothDevicesReport;
use App\Reports\NozomiReport;
use App\Reports\OtcmDevicesReport;
use Illuminate\Http\Request;

class NozomiReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = app(NozomiReport::class)->generate();
        return $report;
    }

    public function otcm_devices()
    {
        $report = app(OtcmDevicesReport::class)->generate();
        return $report;
    }

    public function otcm_nozomi_devices()
    {
        $report = app(BothDevicesReport::class)->generate();
        return $report;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $report = app(NozomiReport::class)->generate(true);

        return $report->download('nozomi_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
