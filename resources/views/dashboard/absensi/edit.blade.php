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
        <a class="btn btn-success fs-6 fw-bold text-decoration-none">{{$absensi->santri->nama}} | @if ($absensi->waktu_halaqoh =='pagi1') Subuh
                @else Mahgrib @endif
        </a>
    </div>
    <div class="card shadow-sm p-4 mt-2 col-md-8 text-center">
        <form action="/absensi/{{$absensi->santri_id}}/id/{{$absensi->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-check ">
            <input type="radio" class="btn-check" name="id_hadir" id="hadir" autocomplete="off" value="hadir" @if($absensi->id_hadir == 'hadir') checked @endif>
            <label class="btn btn-outline-success" for="hadir">
                <i data-feather="check"></i>
            </label>
            <input type="radio" class="btn-check" name="id_hadir" id="telat" autocomplete="off" value="telat" @if($absensi->id_hadir == 'telat') checked @endif>
            <label class="btn btn-outline-secondary" for="telat">
                <i data-feather="clock"></i>
            </label>
            <input type="radio" class="btn-check" name="id_hadir" id="absen" autocomplete="off" value="absen" @if($absensi->id_hadir == 'absen') checked @endif>
            <label class="btn btn-outline-danger" for="absen">
                <i data-feather="x"></i>
            </label>
            <input type="radio" class="btn-check" name="id_hadir" id="sakit" autocomplete="off" value="sakit" @if($absensi->id_hadir == 'sakit') checked @endif>
            <label class="btn btn-outline-warning" for="sakit">
                <i data-feather="thermometer"></i>
            </label>
            <input type="radio" class="btn-check" name="id_hadir" id="piket" autocomplete="off" value="piket" @if($absensi->id_hadir == 'piket') checked @endif>
            <label class="btn btn-outline-primary" for="piket">
                <i data-feather="anchor"></i>
            </label>
            <input type="radio" class="btn-check" name="id_hadir" id="izin" autocomplete="off" value="izin" required @if($absensi->id_hadir == 'izin') checked @endif>
            <label class="btn btn-outline-info" for="izin">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index" viewBox="0 0 16 16">
                    <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                </svg>
            </label>

            <input type="hidden" value="{{$absensi->waktu_halaqoh}}" name="waktu_halaqoh">
            <input type="hidden" value="{{$absensi->santri_id}}" name="santri_id">
            <input type="hidden" value="{{$absensi->tanggal}}" name="tanggal">
            <input type="hidden" value="{{$absensi->user_id}}" name="user_id">
            <input type="hidden" value="{{$absensi->id}}" name="id">
            <button type="submit" name="absen" value="Save!" class="btn btn-primary w-100 mt-2">Ubah Data
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-send" viewBox="0 0 16 16">
                    <path
                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                </svg>
            </button>
        </div>

        </form>
    </div>
</div>
    @endsection
