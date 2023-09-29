@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('tagihan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> no </label>
                                <input type="text" class="form-control @error('no') is-invalid @enderror" name="no"value="{{ old('no') }}" placeholder="Masukkan no">

                                <!-- error message untuk title -->
                                @error('no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold"> biaya</label>
                                <input type="text" class="form-control @error('biaya') is-invalid @enderror" name="biaya"value="{{ old('biaya') }}" placeholder="Masukkan biayaongan">

                                <!-- error message untuk title -->
                                @error('biaya')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="font-weight-bold"> tarif</label>
                                <input type="text" class="form-control @error('tarif') is-invalid @enderror" name="tarif"value="{{ old('tarif') }}" placeholder="Masukkan tarif">

                                <!-- error message untuk title -->
                                @error('tarif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="font-weight-bold"> jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"value="{{ old('jumlah') }}" placeholder="Masukkan jumlah">

                                <!-- error message untuk title -->
                                @error('jumlah')
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

