@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="">
        <a class="btn btn-secondary my-3" href="/absensi">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-square-fill mb-1 me-1" viewBox="0 0 16 16">
                <path
                    d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
            Kembali ke absensi</a>
        <a class="btn btn-success fs-6 fw-bold text-decoration-none">@if ($request->get('waktu_halaqoh')=='pagi1') Subuh
                @else Mahgrib @endif | {{$hari}}, {{$tanggal}}
        </a>
    </div>
    <div class="col-lg-8 mt-2">
        <form method="post" action="/absensi">
            @csrf
            <ul class="list-group shadow-sm">
                @foreach ($absensi as $absen)
                <li class="list-group-item d-flex gap-2 w-100 justify-content-between">
                    <div class="mt-2">
                        <h6>{{ $loop->iteration }}. {{$absen->santri->nama}} | <small>Kelas :
                                {{$absen->santri->kelas}}</small></h6>
                    </div>
                    <div class="mt-2">
                        @if ($absen->id_hadir == 'hadir')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="hadir[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-success" for="hadir[{{$absen->id}}]">
                            <i data-feather="check"></i> Hadir
                        </label>
                        @elseif ($absen->id_hadir == 'telat')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="telat[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-secondary" for="telat[{{$absen->id}}]">
                            <i data-feather="clock"></i> Telat
                        </label>
                        @elseif ($absen->id_hadir == 'absen')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="absen[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-danger" for="absen[{{$absen->id}}]">
                            <i data-feather="x"></i> Absen
                        </label>
                        @elseif ($absen->id_hadir == 'sakit')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="sakit[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-warning" for="sakit[{{$absen->id}}]">
                            <i data-feather="thermometer"></i> Sakit
                        </label>
                        @elseif ($absen->id_hadir == 'piket')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="piket[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-primary" for="piket[{{$absen->id}}]">
                            <i data-feather="anchor"></i> Piket
                        </label>
                        @elseif ($absen->id_hadir == 'izin')
                        <input type="radio" class="btn-check" name="id_hadir[{{$absen->id}}]" id="izin[{{$absen->id}}]"
                            checked>
                        <label class="btn btn-outline-info" for="izin[{{$absen->id}}]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-hand-index mb-1" viewBox="0 0 16 16">
                                <path
                                    d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                            </svg> Izin
                        </label>
                        @endif

                        <a class="btn btn-outline-warning" href="/absensi/{{$absen->santri_id}}/id/{{$absen->id}}/edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>

    </div>
</div>
@endsection
