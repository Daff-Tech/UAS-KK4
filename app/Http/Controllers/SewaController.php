<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Mobil;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Transaction::all();

    //    return $data;
    return response()->json([
        "message" => "pengguna yang melakukan sewa",
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
        $table = new Transaction();
        $table->merk_mobil = $request->merk_mobil ? $request->merk_mobil : $table->merk_mobil;
        $table->tgl_peminjaman = $request->tgl_peminjaman ? $request->tgl_peminjaman : $table->tgl_peminjaman;
        $table->tgl_kembalian = $request->tgl_kembalian ? $request->tgl_kembalian : $table->tgl_kembalian;
        $table->penanggung_jawab = $request->penanggung_jawab ? $request->penanggung_jawab : $table->penanggung_jawab;
        $table->no_tlp = $request->no_tlp ? $request->no_tlp : $table->no_tlp;
        $table->jmlh_hari = $request->jmlh_hari ? $request->jmlh_hari : $table->jmlh_hari;
        $table->total = $request->total ? $request->total : $table->total;
        $table->save();
      

        // return $table;
        return response()->json([
            "message" => "Data berhasil ditambahkan",
            "data" => $table
        ], 201);
    }

    public function show($id)
    {
        $table = Transaction::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    public function destroy($id)
    {
        $table = Transaction::find($id);
        if ($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }

    public function update(Request $request, $id)
    {
        $table = Transaction::find($id);
        if ($table){
            $table->merk_mobil = $request->merk_mobil ? $request->merk_mobil : $table->merk_mobil;
            $table->tgl_peminjaman = $request->tgl_peminjaman ? $request->tgl_peminjaman : $table->tgl_peminjaman;
            $table->tgl_kembalian = $request->tgl_kembalian? $request->tgl_kembalian : $table->tgl_kembalian;
            $table->penanggung_jawab = $request->penanggung_jawab ? $request->penanggung_jawab : $table->penanggung_jawab;
            $table->no_tlp = $request->no_tlp ? $request->no_tlp : $table->no_tlp;
            $table->jmlh_hari = $request->jmlh_hari ? $request->jmlh_hari : $table->jmlh_hari;
            $table->total = $request->total ? $request->total : $table->total;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

}