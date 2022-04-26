@extends('dashboard.layouts.main')
@section('container')
<div class="container py-3">
    <div class="col-lg-8">
        <form method="post" action="/santri" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_santri" class="form-label">No ID Takhossus</label>
                <input type="text" name="id_santri" class="form-control @error("id_santri") is-invalid @enderror" id="id_santri" value="{{uniqid("idsantri")}}">
                @error("id_santri")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label ">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control @error("nama") is-invalid @enderror" id="nama" value="{{old("nama")}}" required>
                @error("nama")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="asal" class="form-label ">Asal</label>
                <input type="text" name="asal" class="form-control @error("asal") is-invalid @enderror" id="asal" value="{{old("asal")}}" required>
                @error("asal")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        
            <div class="row mb-3 ">
                <div class="col">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="kelas" class="form-select" required>
                        <option value="{{old("kelas")}}">{{old("kelas")}}</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col">
                    <label for="semester" class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="{{old("semester")}}">{{old("semester")}}</option>
                        <option value="GENAP">GENAP</option>
                        <option value="GANJIL">GANJIL</option>
                    </select></div>
            </div>
            <div class="mb-3">
        
                <label for="exampleInputEmail1" class="form-label">Tahun Ajaran</label>
                <select name=tahun_ajaran class=form-select required>
                    <option value="{{old("tahun_ajaran")}}">{{old("tahun_ajaran")}}</option>;
                    @for($i=0;$i<=3;$i++) 
                    <option value='{{date('Y')+$i}}/{{date('Y')+$i}}'>{{date('Y')+$i-1}}/{{date('Y')+$i}}</option>;
                    @endfor
                </select> 
            </div>
        
            <div class="row mb-3">
                <label for="exampleInputEmail1" class="form-label">Awal Masuk Takhossus</label>
                <div class="col">
                    <select name=hari_tanggal class=form-select required>
                        <option value=""><cite >Tanggal</cite></option>
                        @for ($x = 1; $x <= 31; $x++)
                        @if (old("hari_tanggal")==$x)
                        <option value='{{$x}}' selected>{{$x}}</option>
                        @else
                        <option value='{{$x}}'>{{$x}}</option>
                        @endif
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name=bulan class=form-select required>
                        <option value="">Bulan</option>   
                        @for($i=1;$i<=12;$i++)
                        @if (old("bulan")==$i)
                        <option value='{{$i}}' selected>{{$months[$i]}}</option>
                        @else 
                        <option value='{{$i}}'>{{$months[$i]}}</option>
                        @endif
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name=tahun class=form-select required>
                        <option value="" >Tahun</option>  
                        @for($i=date("Y")-6; $i<=date("Y"); $i++)
                        @if (old("tahun")==$i)
                        <option value='{{$i}}' selected>{{$i}}</option>
                        @else 
                        <option value='{{$i}}'>{{$i}}</option>
                        @endif
                        @endfor
                    </select>
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col">
                    <label for="target_bulanan" class="form-label">Target Capaian Bulanan</label>
                    <input type="text" name="target_bulanan" class="form-control @error("target_bulanan") is-invalid @enderror" id="target_bulanan" placeholder="Halaman" value="{{old("target_bulanan")}}" required>
                    @error("target_bulanan")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="target_semester" class="form-label">Target Capaian Semester</label>
                    <input type="text" name="target_semester" class="form-control @error("target_semester") is-invalid @enderror" id="target_semester" placeholder="Juz" value="{{old("target_semester")}}" required>
                    @error("target_semester")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label  @error("image") is-invalid @enderror">Upload Foto Santri</label>
                <img class="previewImage img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                @error("image")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Pembimbing</label>
                  <select name="user_id" class="form-select" required>
                    <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                </select>
            </div>
        
            <div class="mb-3">
                <small class="text-muted mb-2">Mohon pastikan semua data terisi dengan benar.</small>
                <button type="submit" class="w-100 btn btn-lg rounded-4 btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Daftar</button>
            </div>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.previewImage');

        imagePreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imagePreview.src = oFREvent.target.result;
        };
    }
    
</script>
@endsection