@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="">
        <a class="btn btn-secondary my-3" href="/hafalan">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-square-fill mb-1 me-1" viewBox="0 0 16 16">
                <path
                    d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
            Kembali ke daftar</a>
        <a class="btn btn-warning" disabled>
            @if($kode_setoran == 'ziyadah') ZIYADAH @elseif($kode_setoran == 'murojaah') MUROJA'AH @else TASMIK @endif | @if(session('nama')) {{session('nama')}} @else {{$santri->nama}} @endif
        </a>

    </div>
    @if($kode_setoran == 'ziyadah')
    <div class="card col-md-8 mt-2">
        <div class="card-header d-flex justify-content-between">
            <div>
                <cite class="card-title">Ziyadah Sebelumnya : @if($hafalan) {{$hafalan->juz}} {{$hafalan->halaman}}@else blm ada data @endif</cite>
            </div>
            <div>
                @if($hafalan)
                <form action="/riwayat" method="get">
                    @csrf
                    <input type="hidden" name="id_santri" value="{{$santri->id}}">
                    <input type="hidden" name="kode_setoran" value="ziyadah">
                    <button class="btn btn-primary btn-sm" type="submit">Riwayat Ziyadah
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                          </svg>
                    </button>

                </form>
                @endif
            </div>
        </div>

        <div class="card-body">

            <form name="ziyadah" action="/hafalan" method="post">
                @csrf
                <input type="hidden" name="santri_id" value= @if(session('santri_id')) "{{session('santri_id')}}" @else "{{$santri_id}}" @endif>
                <input type="hidden" name="kode_setoran" value="ziyadah">
                <input type="hidden" name="nama" value="@if(session('nama')) {{session('nama')}} @else {{old("nama", $santri->nama)}} @endif">
                <div  class="form-floating mb-2">
                    <select name="juz" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                        <option value="">Juz</option>
                        @for($i = 1; $i <= 30; $i++) <option value='{{$i}}'>{{$i}}</option>";
                            @endfor
                    </select>
                    <label for="floatingSelect">Pilih Juz</label>
                </div>
                <div class="form-floating mb-2">
                    <select name="halaman" class="form-select" id="pilihHalaman" aria-label="" required="">
                        <option value="">Halaman</option>
                        @for ($i = 1; $i <= 20; $i++) <option value='{{$i}}'>{{$i}}</option>
                            @endfor
                    </select>
                    <label for="pilihHalaman">Pilih Halaman</label>
                </div>
                <div class="form-floating mb-2">
                    <select name="nilai" class="form-select" id="nilai" required="">
                        <option value="">Nilai</option>
                        <option value="A">A (Sangat Lancar)</option>
                        <option value="B">B (Lancar)</option>
                        <option value="C">C (Kurang Lancar)</option>
                        <option value="D">D (Tidak Lancar)</option>

                    </select>
                    <label for="nilai">Masukkan Nilai</label>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Update
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                          </svg>
                    </button>

                </div>
            </form>
        </div>
    </div>
    @elseif ($kode_setoran == 'murojaah')
    <div class="card col-md-8 mt-2">
        <div class="card-header d-flex justify-content-between">
            <div>
                <cite class="card-title">Murojaah Sebelumnya : @if($hafalan) {{$hafalan->juz}} {{$hafalan->halaman}}@else blm ada data @endif</cite>
            </div>
            <div>
                @if($hafalan)
                <form action="/riwayat" method="get">
                    @csrf
                    <input type="hidden" name="id_santri" value="{{$santri->id}}">
                    <input type="hidden" name="kode_setoran" value="murojaah">
                    <button class="btn btn-primary btn-sm" type="submit">Riwayat Murojaah
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                          </svg>
                    </button>

                </form>
                @endif
            </div>
        </div>

        <div class="card-body">

            <form name="ziyadah" action="/hafalan" method="post">
                @csrf
                <input type="hidden" name="santri_id" value= @if(session('santri_id')) "{{session('santri_id')}}" @else "{{$santri_id}}" @endif>
                <input type="hidden" name="kode_setoran" value="murojaah">
                <input type="hidden" name="nama" value="@if(session('nama')) {{session('nama')}} @else {{old("nama", $santri->nama)}} @endif">
                <div  class="form-floating mb-2">
                    <select name="juz" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                        <option value="">Juz</option>
                        @for($i = 1; $i <= 30; $i++) <option value='{{$i}}'>{{$i}}</option>";
                            @endfor
                    </select>
                    <label for="floatingSelect">Pilih Juz</label>
                </div>
                <div class="form-floating mb-2">
                    <select name="halaman" class="form-select" id="pilihHalaman" aria-label="" required="">
                        <option value="">Halaman</option>
                        @for ($i = 1; $i <= 20; $i++) <option value='{{$i}}'>{{$i}}</option>
                            @endfor
                    </select>
                    <label for="pilihHalaman">Pilih Halaman</label>
                </div>
                <div class="form-floating mb-2">
                    <select name="nilai" class="form-select" id="nilai" required="">
                        <option value="">Nilai</option>
                        <option value="A">A (Sangat Lancar)</option>
                        <option value="B">B (Lancar)</option>
                        <option value="C">C (Kurang Lancar)</option>
                        <option value="D">D (Tidak Lancar)</option>

                    </select>
                    <label for="nilai">Masukkan Nilai</label>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Update
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                          </svg>
                    </button>

                </div>
            </form>
        </div>
    </div>
    @else
    TASMIK
    <div class="card col-md-8 mt-2">
        <div class="card-header d-flex justify-content-between">
            <div>
                <cite class="card-title">Hafalan Lama</cite>
            </div>
            <div>
                @if($hafalan)
                <form action="/riwayat" method="get">
                    @csrf
                    <input type="hidden" name="id" value="{{$santri->id}}">
                    <button class="btn btn-primary btn-sm" type="submit">Riwayat Ziyadah
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                          </svg>
                    </button>

                </form>
                @endif
            </div>
        </div>

        <div class="card-body">

            <form name="ziyadah" action="/hafalan/storeLama" method="post">
                @csrf
                <input type="hidden" name="santri_id" value= @if(session('santri_id')) "{{session('santri_id')}}" @else "{{$santri_id}}" @endif>
                <input type="hidden" name="kode_setoran" value="ziyadah">
                <input type="hidden" name="nama" value="@if(session('nama')) {{session('nama')}} @else {{old("nama", $santri->nama)}} @endif">
                <div  class="form-floating mb-2">
                    <select name="juz" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                        <option value="">Juz</option>
                        @for($i = 1; $i <= 30; $i++) <option value='{{$i}}'>{{$i}}</option>";
                            @endfor
                    </select>
                    <label for="floatingSelect">Pilih Juz</label>
                </div>
                <div class="form-floating mb-2" hidden>
                    <select name="halaman" class="form-select" id="pilihHalaman" >
                        <option value="20" selected>20</option>
                    </select>
                    <label for="pilihHalaman">Pilih Halaman</label>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Update
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                          </svg>
                    </button>

                </div>
            </form>
        </div>
    </div>
    @endif
</div>

@endsection
