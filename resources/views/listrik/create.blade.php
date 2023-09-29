@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('listrik.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> kode tarif</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode"value="{{ old('kode') }}" placeholder="Masukkan kode">

                                <!-- error message untuk title -->
                                @error('kode')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold"> golongan</label>
                                <input type="text" class="form-control @error('gol') is-invalid @enderror" name="gol"value="{{ old('gol') }}" placeholder="Masukkan golongan">

                                <!-- error message untuk title -->
                                @error('gol')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="font-weight-bold"> daya</label>
                                <input type="text" class="form-control @error('daya') is-invalid @enderror" name="daya"value="{{ old('daya') }}" placeholder="Masukkan daya">

                                <!-- error message untuk title -->
                                @error('daya')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="font-weight-bold"> TarifKWh</label>
                                <input type="text" class="form-control @error('tarif') is-invalid @enderror" name="tarif"value="{{ old('tarif') }}" placeholder="Masukkan tarif">

                                <!-- error message untuk title -->
                                @error('tarif')
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

