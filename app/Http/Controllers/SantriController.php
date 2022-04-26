<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Hafalan;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.santri.index',
        [
            'title' => 'Daftar Santri',
            'santri' => Santri::where('user_id', '=', auth()->user()->id)->get(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.santri.create',
        [
            'title' => 'Tambah Santri',
            'months' => array('','January','February','March','April','May',
                'June','July','August', 'September','October','November','December'),
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
        $awal_bergabung = $request->tahun.'/'.$request->bulan.'/'.$request->hari_tanggal;

        $validate = $request->validate([
            'id_santri' => 'required|unique:santris',
            'nama' => 'required|min:3',
            'user_id' => 'required',
            'asal' => 'required',
            'kelas' => '',
            'semester' => '',
            'tahun_ajaran' => '',
            'awal_bergabung' => '',
            'target_bulanan' => 'numeric',
            'target_semester' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('public/images');
        }

        $validate['awal_bergabung'] = $awal_bergabung;

        Santri::create($validate);

        return redirect('/santri')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        $total_ziyadah  = Hafalan::where('santri_id', '=', $santri->id)->
                                    where('kode_setoran', '=', 'ziyadah')->
                                    whereMonth('created_at', '=', Carbon::parse(now())->month)->count();
        $total_ziyadah_bulan_lalu  = Hafalan::where('santri_id', '=', $santri->id)->
                                    where('kode_setoran', '=', 'ziyadah')->
                                    whereMonth('created_at', '=', Carbon::parse(now()->subMonth())->month)->count();

        $absensi = Absensi::where('santri_id', '=', $santri->id)->whereMonth('created_at', '=', Carbon::parse(now())->month)->get();

        $hadir = $absensi->where('id_hadir', '=', 'hadir')->count();
        $izin = $absensi->where('id_hadir', '=', 'izin')->count();
        $sakit = $absensi->where('id_hadir', '=', 'sakit')->count();
        $absen = $absensi->where('id_hadir', '=', 'absen')->count();
        $telat = $absensi->where('id_hadir', '=', 'telat')->count();
        $piket = $absensi->where('id_hadir', '=', 'piket')->count();

        $total_absensi = Absensi::where('santri_id', '=', $santri->id)->whereMonth('created_at', '=', Carbon::parse(now())->month)->count();

        return view('dashboard.santri.index_detail',
        [

            'title' => 'Detail Santri',
            'santri' => $santri,

            // Bagian Hafalan

            'hafalan' => Hafalan::where('santri_id', '=', $santri->id)->
                                    where('halaman', '=', '20')->
                                    where('kode_setoran', '=', 'ziyadah')->get(),
            'bulan' => Carbon::parse(now())->monthName,
            'bulan_1' => Carbon::parse(now()->subMonth())->monthName,
            'total_ziyadah' => $total_ziyadah,
            'total_ziyadah_bulan_lalu' => $total_ziyadah_bulan_lalu,
            'persentase_ziyadah' => ($santri->target_bulanan == 0) ? 0 : ($total_ziyadah / $santri->target_bulanan) * 100,
            'persentase_ziyadah_1' => ($santri->target_bulanan == 0) ? 0 : ($total_ziyadah_bulan_lalu / $santri->target_bulanan) * 100,

            // Bagian Absensi

            'hadir' => $hadir,
            'izin' => $izin,
            'sakit' => $sakit,
            'absen' => $absen,
            'telat' => $telat,
            'piket' => $piket,

            'total_absensi' => $total_absensi,

            'persentase_hadir' => ($total_absensi == 0) ? 0 : ($hadir / $total_absensi) * 100,
            'persentase_izin' => ($total_absensi == 0) ? 0 : ($izin / $total_absensi) * 100,
            'persentase_sakit' => ($total_absensi == 0) ? 0 : ($sakit / $total_absensi) * 100,
            'persentase_absen' => ($total_absensi == 0) ? 0 : ($absen / $total_absensi) * 100,
            'persentase_telat' => ($total_absensi == 0) ? 0 : ($telat / $total_absensi) * 100,
            'persentase_piket' => ($total_absensi == 0) ? 0 : ($piket / $total_absensi) * 100,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        return view('dashboard.santri.edit',
        [
            'title' => 'Edit Santri',
            'santri' => $santri,
            'months' => array('','January','February','March','April','May',
                'June','July','August', 'September','October','November','December'),

                $tanggal = Carbon::parse($santri->awal_bergabung),
                'tanggal' => $tanggal->day,
                'bulan' => $tanggal->month,
                'tahun' => $tanggal->year,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $awal_bergabung = $request->tahun.'/'.$request->bulan.'/'.$request->hari_tanggal;

        $validate = $request->validate([
            'nama' => 'required|min:3',
            'user_id' => 'required',
            'asal' => 'required',
            'status' => '',
            'kelas' => '',
            'semester' => '',
            'tahun_ajaran' => '',
            'awal_bergabung' => '',
            'target_bulanan' => 'numeric',
            'target_semester' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->id_santri != $santri->id_santri) {
            $validate['id_santri'] = $request->id_santri;
        }

        if ($request->hasFile('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validate['image'] = $request->file('image')->store('public/images');
        }

        $validate['awal_bergabung'] = $awal_bergabung;

        Santri::where('id', '=', $santri['id'])->update($validate);

        return redirect('/santri')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {

        if ($santri->image) {
            Storage::delete($santri->image);
        }

        Santri::destroy($santri->id);

        return redirect('santri')->with('success', 'Data berhasil dihapus');
    }
}
