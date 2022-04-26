@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="fw-bold mt-3">Update hafalan</h1>
    <p class="ps-1">
        <cite>Ustadz/Ustadzah  : </cite><strong>{{auth()->user()->name}}</strong>
    </p>

    @if (session('success'))
    <div class="alert alert-success col-lg-8 mt-3">
        {{ session('success') }}
    </div>
    @endif

    <div class="col-lg-8 shadow-sm list-group py-2">
        @foreach($santri as $santri)
        <div class="list-group-item list-group-item-action d-flex gap-3 py-2" aria-current="true">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">{{ $loop->iteration }} - {{$santri->nama}} | <strong>{{$santri->kelas}}</strong></h6>
                </div>

                <div>
                    <div class="dropdown">

                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Update
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li>
                            <form method="post" action="/hafalan/create">
                                @csrf
                                <input type="hidden" name="id_santri" value="{{$santri->id}}">
                                <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                <input type="hidden" name="kode_setoran" value="ziyadah">
                                <button type="submit" class="dropdown-item">Ziyadah
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                      </svg>
                                </button>
                            </form>
                          </li>
                          <li>
                            <form method="post" action="/hafalan/create">
                                @csrf
                                <input type="hidden" name="id_santri" value="{{$santri->id}}">
                                <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                <input type="hidden" name="kode_setoran" value="murojaah">
                                <button type="submit" class="dropdown-item">Murojaah
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                      </svg>
                                </button>
                            </form>
                          </li>
                          <li>
                            <form method="post" action="/hafalan/create">
                                @csrf
                                <input type="hidden" name="id_santri" value="{{$santri->id}}">
                                <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                <button type="submit" class="dropdown-item"> Hafalan Lama
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                      </svg>
                                </button>
                            </form>
                          </li>

                        </ul>
                      </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
