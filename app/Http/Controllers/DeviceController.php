<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return response()->json($devices, 200);
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
            'imei_code'         => 'required|max:15|string',
            'bt_code_ph'        => 'required|string',
            'bt_code_mt'        => 'required|string',
            'number_moto'       => 'required|max:10|string',
            'membresia'         => 'nullable'
            
        ]);

        $user=$request->user()->id;

        $device = Device::create([
            'imei_code' => $fields['imei_code'],
            'bt_code_ph' => $fields['bt_code_ph'],
            'bt_code_mt' => $fields['bt_code_mt'],
            'number_moto' => $fields['number_moto'],
            'membresia' => $fields['membresia'],
            'user_id' => $user,
        ]);

        return response([
            'message' => 'Device registrado'
        ]);
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
