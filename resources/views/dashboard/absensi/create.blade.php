@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <h1 class="fw-bold mt-3">Absensi Kehadiran</h1>
    <p class="ps-1">
        <h5>{{$hari}}, {{$tanggal}}</h5>
        <a class="btn btn-warning fs-6 fw-bold text-decoration-none">@if ($request->get('waktu_halaqoh')=='pagi1') Subuh @else Mahgrib @endif</a>
    </p>

<div class="col-lg-8">
            <form method="post" action="/absensi">
                @csrf
                <ul class="list-group shadow-sm">
                    @foreach ($santri as $santri)
                        <li class="list-group-item d-flex gap-2 w-100 justify-content-between">
                            <div class="mt-2">
                                <h6>{{ $loop->iteration }}. {{$santri->nama}} </h6>
                                <p>
                                    <small>Kelas : {{$santri->kelas}}</small>
                                </p>
                            </div>
                            <div class="form-check my-auto md-auto">
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="hadir[{{$santri->id}}]" autocomplete="off" value="hadir" required>
                                            <label class="btn btn-outline-success" for="hadir[{{$santri->id}}]">
                                                <i data-feather="check"></i>
                                            </label>
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="telat[{{$santri->id}}]" autocomplete="off" value="telat">
                                            <label class="btn btn-outline-secondary" for="telat[{{$santri->id}}]">
                                                <i data-feather="clock"></i>
                                            </label>
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="absen[{{$santri->id}}]" autocomplete="off" value="absen" >
                                            <label class="btn btn-outline-danger" for="absen[{{$santri->id}}]">
                                                <i data-feather="x"></i>
                                            </label>
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="sakit[{{$santri->id}}]" autocomplete="off" value="sakit">
                                            <label class="btn btn-outline-warning" for="sakit[{{$santri->id}}]">
                                                <i data-feather="thermometer"></i>
                                            </label>
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="piket[{{$santri->id}}]" autocomplete="off" value="piket">
                                            <label class="btn btn-outline-primary" for="piket[{{$santri->id}}]">
                                                <i data-feather="anchor"></i>
                                            </label>
                                            <input type="radio" class="btn-check" name="id_hadir[{{$santri->id}}]" id="izin[{{$santri->id}}]" autocomplete="off" value="izin" required>
                                             <label class="btn btn-outline-info" for="izin[{{$santri->id}}]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index" viewBox="0 0 16 16">
                                                    <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                                </svg>
                                            </label>
                            </div>

                        </li>
                        @endforeach
                      </ul>

                <div class="d-flex justify-content-between py-3">
                        <select name="waktu_halaqoh" class="form-select me-3" aria-label="Default select example"
                            required hidden>
                            <option value="{{$request->get('waktu_halaqoh')}}" selected>{{$request->get('waktu_halaqoh')}}</option>
                        </select>
                        <button type="submit" name="absen" value="Save!" class="btn btn-primary w-100 text-nowrap">Input Data
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg> </button>
                </div>
            </form>
    </div>
</div>
    @endsection
