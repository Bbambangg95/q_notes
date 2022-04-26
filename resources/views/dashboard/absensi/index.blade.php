@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <h1 class="fw-bold mt-3">Absensi Kehadiran
    </h1>
    <p class="ps-1">
        <cite>Ustadz/Ustadzah  : </cite><strong>{{auth()->user()->name}}</strong>
    </p>

    <div class="col-md-8">
        <div class="card shadow-sm p-4 p-md-5 mb-4 rounded bg-light d-flex gap-2 w-100">
            @if (session('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
            @endif
            <div>
                <h5 class="card-title"> {{$hari}}, {{$tanggal}}</h5>
            </div>
            <div>
                <a
                    class="btn @if(count($cek1)>0) btn-success @else btn-danger @endif fs-6 fw-bold text-decoration-none w-100">Subuh</a>
                @if(count($cek1)>0)
                <form method="post" action="/absensi/view_absen" class="mt-1">
                    @csrf
                    <input type="hidden" name="waktu_halaqoh" value="pagi1">
                    <button type="submit" class="btn btn-outline-success w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </button>
                </form>
                @else
                <form method="post" action="/absensi/create" class="mt-1">
                    @csrf
                    <input type="hidden" name="waktu_halaqoh" value="pagi1">
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                </form>
                @endif
            </div>
            <div>
                <a
                    class="btn @if(count($cek2)>0) btn-success @else btn-danger @endif fs-6 fw-bold text-decoration-none w-100">Maghrib</a>
                @if(count($cek2)>0)
                <form method="post" action="/absensi/view_absen" class="mt-1">
                    @csrf
                    <input type="hidden" name="waktu_halaqoh" value="sore1">
                    <button type="submit" class="btn btn-outline-success w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </button>
                </form>
                @else
                <form method="post" action="/absensi/create" class="mt-1">
                    @csrf
                    <input type="hidden" name="waktu_halaqoh" value="sore1">
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                </form>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
