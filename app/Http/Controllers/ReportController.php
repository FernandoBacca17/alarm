<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Device;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reports = Report::all();
        return response()->json($reports, 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'state_switch'          => 'required|string',
            'state_sys'             => 'required|string',
            'latitude'              => 'required|string',
            'longitude'             => 'required|string',
            'speed'                 => 'required|string',
            'imei_code'             => 'required|max:15'
            
        ]);

        if(Device::where('imei_code', $fields['imei_code'])->exists()){

            $id_device=Device::where('imei_code', $fields['imei_code'])->first()->id;

            $report = Report::create([
                'state_switch' => $fields['state_switch'],
                'state_sys' => $fields['state_sys'],
                'latitude' => $fields['latitude'],
                'longitude' => $fields['longitude'],
                'speed' => $fields['speed'],
                'device_id' => $id_device
            ]);
    
            return response([
                'message' => 'Report registrado'
            ]);

        }else{

            return response([
                'message' => 'Error, no se puede registrar el report'
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
