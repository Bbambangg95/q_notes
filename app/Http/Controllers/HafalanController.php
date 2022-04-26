<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Santri;
use Illuminate\Http\Request;
Use Carbon\Carbon;

class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.hafalan.index', [
            'title' => 'Update Hafalan',
            'santri' => Santri::where('user_id' ,'=', auth()->user()->id)->orderBy('nama')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.hafalan.create', [
            'title' => 'Hafalan',
            'kode_setoran' => $request->kode_setoran,
            'santri_id' => $request->id_santri,
            'hafalan' => Hafalan::where('santri_id' ,'=', $request->id_santri)->orderBy('created_at', 'desc')->first(),
            'santri' => Santri::where('id' ,'=', $request->id_santri)->first(),
        ]);
    }

    public function riwayat(Request $request)
    {
        if($request->id_santri) {
            $santri_id = $request->id_santri;
        }
        else {

            $santri_id = session('santri_id');
        }
        if($request->kode_setoran) {
            $kode_setoran = $request->kode_setoran;
        }
        else {

            $kode_setoran = session('kode_setoran');
        }
        return view('dashboard.hafalan.riwayat',
        [
            'title' => 'Riwayat Hafalan',
            'santri_id' => $santri_id,
            'kode_setoran' => $kode_setoran,
            'santri' => Santri::where('user_id', '=', auth()->user()->id)->get(),
            'hafalan' => Hafalan::where('santri_id', '=', $santri_id)->
                                where('kode_setoran' ,'=', $kode_setoran)->
                                orderBy('created_at', 'desc')->offset(1)->limit(5)->get(),
            'hafal1' => Hafalan::where('santri_id', '=', $santri_id)->
                                where('kode_setoran' ,'=', $kode_setoran)->
                                orderBy('created_at', 'desc')->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekdupl = Hafalan::where('santri_id', '=', $request->santri_id)->
                            where('kode_setoran', '=', $request->kode_setoran)->
                            where('juz', '=', $request->juz)->
                            where('halaman', '=', $request->halaman)->first();

        $cekHlmSblm = Hafalan::where('santri_id', '=', $request->santri_id)->
                                where('kode_setoran', '=', $request->kode_setoran)->
                                where('juz', '=', $request->juz)->
                                where('halaman', '=', $request->halaman-1)->first();

        if ($cekdupl == null) {

            if ($request->halaman == '1' or $cekHlmSblm == !null) {

                $hafalan = new Hafalan;
                $hafalan->santri_id = $request->santri_id;
                $hafalan->kode_setoran = $request->kode_setoran;
                $hafalan->juz = $request->juz;
                $hafalan->halaman = $request->halaman;
                $hafalan->nilai = $request->nilai;
                $hafalan->tanggal = Carbon::now()->format('d-m-Y');
                $hafalan->save();

                $msg ="berhasil";

            }

            else {

                $msg = "gagal";

            }
        }

        else {
            $msg = "duplicate";
        }

        return redirect('/riwayat')->with('santri_id', $request->santri_id)->
                                    with('nama', $request->nama)->
                                    with('kode_setoran', $request->kode_setoran)->
                                    with('juz', $request->juz)->
                                    with('halaman', $request->halaman)->
                                    with('msg', $msg);
    }

    public function storeLama(Request $request)
    {
        $cekdupl = Hafalan::where('santri_id', '=', $request->santri_id)->
                            where('kode_setoran', '=', $request->kode_setoran)->
                            where('juz', '=', $request->juz)->
                            where('halaman', '=', $request->halaman)->first();

        if ($cekdupl == null) {

                $hafalan = new Hafalan;
                $hafalan->santri_id = $request->santri_id;
                $hafalan->kode_setoran = $request->kode_setoran;
                $hafalan->juz = $request->juz;
                $hafalan->halaman = $request->halaman;
                $hafalan->nilai = 'B';
                $hafalan->tanggal = Carbon::now()->format('d-m-Y');
                $hafalan->save();

                $msg ="berhasil";

            }

            else {

                $msg = "duplicate";

            }

        return redirect('/riwayat')->with('santri_id', $request->santri_id)->
                                    with('nama', $request->nama)->
                                    with('kode_setoran', $request->kode_setoran)->
                                    with('juz', $request->juz)->
                                    with('halaman', $request->halaman)->
                                    with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function show(Hafalan $hafalan)
    {
        return view('dashboard.hafalan.show', [
            'title' => 'Detail Hafalan',
            'hafalan' => $hafalan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Hafalan $hafalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hafalan $hafalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hafalan $hafalan)
    {
        //
    }
}
