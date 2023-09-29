@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pengunjung.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> nama </label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"value="{{ old('nama') }}" placeholder="Masukkan nama">

                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold"> Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"value="{{ old('alamat') }}" placeholder="Masukkan Alamat">

                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                <label class="font-weight-bold"> nohp </label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp"value="{{ old('nohp') }}" placeholder="Masukkan nohp">

                                <!-- error message untuk title -->
                                @error('nohp')
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

