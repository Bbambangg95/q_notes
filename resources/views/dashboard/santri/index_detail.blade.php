@extends('dashboard.layouts.main')

@section('container')
<div class="container">

    <div class="my-3">
        <a class="btn btn-secondary" href="/santri">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-square-fill mb-1 me-1" viewBox="0 0 16 16">
                <path
                    d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
            Kembali ke daftar</a>
        <a class="btn btn-warning" href="/santri/{{$santri->id_santri}}/edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg></a>
        <form method="post" action="/santri/{{$santri->id_santri}}" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" type="submit"
                onclick="return confirm('Yakin ingin menghapus data?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
            </button>
        </form>
    </div>
    <!--Bagian Profil-------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="card shadow-sm p-4 p-md-5 mb-4 rounded bg-light d-flex gap-2 w-100 justify-content-between">
        <div class="col-lg-8">
            <h1 class="text-uppercase display-5 fw-bold py-2">{{$santri->nama}}</h1>
            <dl class="row px-1">
                <dt class="col-sm-3">Asal</dt>
                <dd class="col-sm-9">{{$santri->asal}}</dd>
                <dt class="col-sm-3">Kelas</dt>
                <dd class="col-sm-9">{{$santri->kelas}}</dd>
                <dt class="col-sm-3">Tahun Ajaran</dt>
                <dd class="col-sm-9">{{$santri->tahun_ajaran}}</dd>
                <dt class="col-sm-3">Semester</dt>
                <dd class="col-sm-9">{{$santri->semester}}</dd>
                <dt class="col-sm-3">Awal Masuk Takhossus</dt>
                <dd class="col-sm-9">{{$santri->awal_bergabung}}</dd>
                <dt class="col-sm-3">Pembimbing</dt>
                <dd class="col-sm-9">Ustadz/Dzah {{auth()->user()->name}}</dd>
            </dl>
        </div>
    </div>

    <!--Bagian Hafalan----------------------------------------------------------------------------------------------------------------------------------------------------->
    <!--Bagian Jumlah Hafalan---------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="card shadow-sm p-4 p-md-5 mb-4 rounded bg-light d-flex gap-2 w-100  justify-content-between">

        <div class="">
            <cite class="fw-bold">Jumlah Hafalan :</cite>
            <h1 class="fw-bold">{{count($hafalan)}} Juz</h1>
            <p> </br>
                @foreach ($hafalan as $hafal )
                <span class="badge bg-primary">{{$hafal->juz}}</span>

                @endforeach
            </p>
        </div>
    </div>
    <!--Bagian Progres Bulanan---------------------------------------------------------------------------------------------------------------------------------------->
    <div class="shadow p-4 p-md-5 mb-4 rounded bg-light gap-2 w-100  justify-content-between">
        <div class="">

            <cite class="fw-bold">Target Bulanan : </cite>
            <h2 class="fw-bold">{{($santri->target_bulanan == 0) ? 0 : $santri->target_bulanan }} Halaman</h2>

            <p class="mb-2"><cite>Progress Bulan : </cite> <strong>{{$bulan}}</strong> |
                <cite>Tercapai :</cite> <strong>{{$total_ziyadah}} Halaman</strong></p>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width:{{$persentase_ziyadah}}%;" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100">
                    {{$persentase_ziyadah}}%</div>
            </div>

            <p class="mt-3 mb-2"><cite>Progress Bulan : </cite> <strong>{{$bulan_1}}</strong>
                | <cite>Tercapai :</cite> <strong>{{$total_ziyadah_bulan_lalu}} Halaman</strong></p>
            <div class="progress ">
                <div class="progress-bar bg-success" role="progressbar" style="width:{{$persentase_ziyadah_1}}%;" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100">
                    {{$persentase_ziyadah_1}}%</div>
            </div>

        </div>
    </div>

    <!--Bagian Rekapitulkasi Kehadiran---------------------------------------------------------------------------------------------------------------------------------------->
    <div class="shadow p-4 p-md-5 mb-4 rounded bg-light gap-2 w-100  justify-content-between">
        <div class="">
            <cite class="fw-bold">Rekapitulasi Kehadiran :</cite>

            <div class="text-center">
                <p class="mb-2 mt-2">
                    <cite>Bulan :</cite> <strong>{{$bulan}}</strong> |
                    <cite>Total Absensi :</cite> <strong>{{$total_absensi}}x</strong></br>
                    <small>
                        Hadir : {{$hadir}}x
                    </small> <strong class="fw-bold">|</strong>
                    <small>
                        Telat : {{$telat}}x
                    </small> <strong class="fw-bold">|</strong>
                    <small>
                        Izin : {{$izin}}x
                    </small> <strong class="fw-bold">|</strong>
                    <small>
                        Alpa : {{$absen}}x
                    </small> <strong class="fw-bold">|</strong>
                    <small>
                        Sakit : {{$sakit}}x
                    </small> <strong class="fw-bold">|</strong>
                    <small>
                        Piket : {{$piket}}x
                    </small>
                </p>
                <div class="progress mt-0">
                    <div class="progress-bar bg-success" role="progressbar" style="width:{{$persentase_hadir}}%" aria-valuenow="15"
                        aria-valuemin="0" aria-valuemax="100">Hadir {{$persentase_hadir}}%
                    </div>
                    <div class="progress-bar bg-dark" role="progressbar" style="width:{{$persentase_telat}}%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100">Telat {{$persentase_telat}}%
                    </div>
                    <div class="progress-bar bg-info" role="progressbar" style="width:{{$persentase_izin}}%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">Izin {{$persentase_izin}}%
                    </div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width:{{$persentase_sakit}}%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">Sakit {{$persentase_sakit}}%
                    </div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width:{{$persentase_piket}}%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">Piket {{$persentase_piket}}%
                    </div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width:{{$persentase_absen}}%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">Alpa {{$persentase_absen}}%
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
