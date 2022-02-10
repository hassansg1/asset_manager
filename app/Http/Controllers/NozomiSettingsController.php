<?php

namespace App\Http\Controllers;

use App\Models\NozomiSettings;
use Illuminate\Http\Request;

class NozomiSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nozomi = NozomiSettings::first();

        return view('nozomi_settings.index')->with(compact('nozomi'));
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

    public function saveSettings(Request $request)
    {
        if (!$request->id) $settings = new NozomiSettings();
        else $settings = NozomiSettings::first();
        $settings->path = $request->path;
        $settings->username = $request->username;
        $settings->password = $request->password;
        $settings->save();

        return response()->json([
            'status' => true,
            'id' => $settings->id
        ]);
    }
}
