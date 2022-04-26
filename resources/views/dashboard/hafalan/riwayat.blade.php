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
            Riwayat @if($kode_setoran == 'ziyadah') Ziyadah @elseif($kode_setoran == 'murojaah') Murojaah @else Tasmik @endif | {{$hafal1->santri->nama}}
        </a>
    </div>
    @if(session('msg'))
     @if (session('msg') == 'berhasil')
        <div class="alert alert-success col-lg-8 ">
            Berhasil, juz {{session('juz')}} halaman {{session('halaman')}} telah diupdate
        </div>
     @elseif (session('msg') == 'gagal')
        <div class="alert alert-warning col-lg-8 ">
            Gagal mengupdate halaman {{session('halaman')}}, halaman {{session('halaman')-1}} belum diisi
        </div>
     @else
        <div class="alert alert-danger col-lg-8 ">
            Gagal, juz {{session('juz')}} halaman {{session('halaman')}} sudah pernah diisi
        </div>
     @endif
    @endif
    <ul class="list-group col-lg-8 mt-3">
        <li class="list-group-item @if(session('msg') == 'berhasil') list-group-item-success @elseif(session('juz') == $hafal1->juz && session('halaman') == $hafal1->halaman) list-group-item-danger @else list-group-item-info @endif justify-content-between d-flex">
            <div>
                <small>{{$hafal1->created_at}} {{$hafal1->kode_setoran}}</small> | Juz : <h class="fw-bold">{{$hafal1->juz}}</h> | Hal : <h class="fw-bold">{{$hafal1->halaman}}</h> | <cite>Nilai : {{$hafal1->nilai}}</cite>

            </div>
            <div>
                <small>ziyadah terbaru</small>

            </div>
        </li>
        @foreach ($hafalan as $hafal )
        <li class="list-group-item @if(session('juz') == $hafal->juz && session('halaman') == $hafal->halaman) list-group-item-danger @endif "><small>{{$hafal->created_at}} {{$hafal->kode_setoran}}</small> | Juz : <h class="fw-bold">{{$hafal->juz}}</h> | Hal : <h class="fw-bold">{{$hafal->halaman}}</h> | <cite>Nilai : {{$hafal->nilai}}</cite>
        </li>

        @endforeach
      </ul>

</div>

@endsection
