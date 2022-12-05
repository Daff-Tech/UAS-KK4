<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Mobil::all();

    //    return $data;
    return response()->json([
        "message" => "Mobil yang tersedia",
        "data" => $table
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Mobil();
        $table->merk = $request->merk ? $request->merk : $table->merk;
        $table->thn_keluar = $request->thn_keluar ? $request->thn_keluar : $table->thn_keluar;
        $table->biaya_sewa = $request->biaya_sewa? $request->biaya_sewa : $table->biaya_sewa;
        $table->no_plat = $request->no_plat ? $request->no_plat : $table->no_plat;
        $table->jenis = $request->jenis ? $request->jenis : $table->jenis;
        $table->save();

        // return $table;
        return response()->json([
            "message" => "Data berhasil ditambahkan",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Mobil::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
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
        $table = Mobil::find($id);
        if ($table){
            $table->merk = $request->merk ? $request->merk : $table->merk;
            $table->thn_keluar = $request->thn_keluar ? $request->thn_keluar : $table->thn_keluar;
            $table->biaya_sewa = $request->biaya_sewa? $request->biaya_sewa : $table->biaya_sewa;
            $table->no_plat = $request->no_plat ? $request->no_plat : $table->no_plat;
            $table->jenis = $request->jenis ? $request->jenis : $table->jenis;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Mobil::find($id);
        if ($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
