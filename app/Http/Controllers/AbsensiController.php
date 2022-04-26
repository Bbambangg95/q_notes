<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.absensi.index', [

            $tanggal = Carbon::now(),
            'title' => 'Absensi',
            'santri' => Santri::where('user_id', '=', auth()->user()->id)->get(),
            'tanggal' => $tanggal->format('d-m-Y H:i:s'),
            'hari' => $tanggal->locale('id')->dayName,
            'cek1' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'pagi1')->get(),
            'cek2' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'sore1')->get(),
            'absensi' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->first(),
        ]);
    }

    public function view_absen(Request $request) {
        return view('dashboard.absensi.view_absen', [
            'title' => 'Edit Absensi',
            'request' => $request,
            'tanggal' => Carbon::now()->format('d-m-Y H:i:s'),
            'hari' => Carbon::now()->locale('id')->dayName,
            'absensi' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', $request->waktu_halaqoh)->get(),
        ]);
    }

    public function view_edit(Request $request) {
        return view('dashboard.absensi.edit', [
            'title' => 'Edit Absensi',
            'request' => $request,
            'tanggal' => Carbon::now()->format('d-m-Y H:i:s'),
            'hari' => Carbon::now()->locale('id')->dayName,
            'absensi' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', $request->waktu_halaqoh)->get(),
        ]);
    }

    public function view_create(Request $request)
    {
        return view('dashboard.absensi.create', [
            'title' => 'Absensi',
            'request' => $request,
            'santri' => Santri::where('user_id', '=', auth()->user()->id)->get(),
            'tanggal' => Carbon::now()->format('d-m-Y H:i:s'),
            'hari' => Carbon::now()->locale('id')->dayName,
            'cek1' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'pagi1')->get(),
            'cek2' => Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'sore1')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->waktu_halaqoh == 'pagi1') {
            $cek = Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'pagi1')->get();
            if(count($cek) > 0) {
                $message = 'Data sudah ada';
                return redirect('/absensi')->with('message', $message);
            } else {
                foreach ($request->id_hadir as $id => $value) {
                    $absensi = new Absensi;
                    $absensi->santri_id = $id;
                    $absensi->id_hadir = $value;
                    $absensi->waktu_halaqoh = $request->waktu_halaqoh;
                    $absensi->tanggal = Carbon::now()->format('Y-m-d');
                    $absensi->user_id = auth()->user()->id;
                    $absensi->save();
                }
                $message = 'Data berhasil ditambahkan';
                return redirect('/absensi')->with('message', $message);
            }
        } else {
            $cek = Absensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', Carbon::now()->format('Y-m-d'))->where('waktu_halaqoh', '=', 'sore1')->get();
            if(count($cek) > 0) {
                $message = 'Data sudah ada';
                return redirect('/absensi')->with('message', $message);
            } else {
                foreach ($request->id_hadir as $id => $value) {
                    $absensi = new Absensi;
                    $absensi->santri_id = $id;
                    $absensi->id_hadir = $value;
                    $absensi->waktu_halaqoh = $request->waktu_halaqoh;
                    $absensi->tanggal = Carbon::now()->format('Y-m-d');
                    $absensi->user_id = auth()->user()->id;
                    $absensi->save();
                }
                $message = 'Data berhasil ditambahkan';
                return redirect('/absensi')->with('message', $message);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($santri_id, $id)
    {
        return view('dashboard.absensi.edit', [
            'title' => 'Edit Absensi',
            'absensi' => Absensi::where('user_id', '=', auth()->user()->id)->
                                    where('santri_id', '=', $santri_id)->
                                    where('id', '=', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $validate = $request->validate([
            'santri_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required',
            'waktu_halaqoh' => '',
            'id_hadir' => '',
        ]);


        Absensi::where('id', '=', $request['id'])->update($validate);

        return redirect('/absensi')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
