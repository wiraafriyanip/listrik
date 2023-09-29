@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('desa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> kode </label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode"value="{{ old('kode') }}" placeholder="Masukkan kode">

                                <!-- error message untuk title -->
                                @error('kode')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold"> nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"value="{{ old('nama') }}" placeholder="Masukkan nama">

                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="font-weight-bold"> kecamatan</label>
                                <input type="text" class="form-control @error('kec') is-invalid @enderror" name="kec"value="{{ old('kec') }}" placeholder="Masukkan kec">

                                <!-- error message untuk title -->
                                @error('kec')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                </div>
                               
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

