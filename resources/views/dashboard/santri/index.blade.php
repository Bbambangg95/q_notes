@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="fw-bold mt-3">Daftar Anggota <a class="btn btn-success" href="santri/create">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-person-plus-fill mb-1" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            <path fill-rule="evenodd"
                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg> Tambah Anggota
    </a></h1>
    <p class="ps-1">
        <cite>Ustadz/Ustadzah  : </cite><strong>{{auth()->user()->name}}</strong> | <cite>Anggota : </cite><strong>{{$santri->count()}} Orang</strong>
    </p>
    @if (session('success'))
    <div class="alert alert-success col-lg-8 mt-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8 shadow-sm list-group py-2">
        @foreach($santri as $santri)
        <div class="list-group-item list-group-item-action d-flex gap-3 py-2" aria-current="true">
            <h6 class="mt-1 fw-bold">{{ $loop->iteration }}</h6>
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">{{$santri->nama}} <small><span class="badge bg-{{($santri->status == 'ziyadah') ? 'success' : 'warning'}}"><a href="/santri/{{$santri->id_santri}}/edit" class="text-decoration-none text-white">{{($santri->status == 'ziyadah') ? 'Ziyadah' : 'Murojaah'}}</a></span></small></h6>
                    <p class="mb-0 opacity-75"> Kelas : <strong>{{$santri->kelas}}</strong> | Hafalan :
                        <strong>{{$santri->user->name}}</strong></p>
                </div>

                <div>
                    <a class='btn btn-outline-success btn-sm my-2' href="/santri/{{$santri->id_santri}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg>
                    </a>
                    <form method="post" action="santri/{{$santri->id_santri}}" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm my-2" type="submit"
                            onclick="return confirm('Yakin ingin menghapus data?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
