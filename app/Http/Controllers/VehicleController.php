<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Device;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicles = Vehicle::all();
        return response()->json($vehicles, 200);

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
            'fabricante'        => 'required|string',
            'modelo'            => 'required|string',
            'descripcion'       => 'nullable',
            'imei_code'         => 'required|max:15'
            
        ]);

        if(Device::where('imei_code', $fields['imei_code'])->exists()){

            $id_device=Device::where('imei_code', $fields['imei_code'])->first()->id;

            $vehicle = Vehicle::create([
                'fabricante' => $fields['fabricante'],
                'modelo' => $fields['modelo'],
                'descripcion' => $fields['descripcion'],
                'device_id' => $id_device
            ]);
    
            return response([
                'message' => 'Vehicle registrado'
            ]);

        }else{

            return response([
                'message' => 'Imei de Device no esta registrado'
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
