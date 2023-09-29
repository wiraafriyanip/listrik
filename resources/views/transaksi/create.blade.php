@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> nomor </label>
                                <input type="number" class="form-control @error('nomor') is-invalid @enderror" name="nomor"value="{{ old('nomor') }}" placeholder="Masukkan nomor">

                                <!-- error message untuk title -->
                                @error('nomor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold"> tgl</label>
                                <input type="text" class="form-control @error('tgl') is-invalid @enderror" name="tgl"value="{{ old('tgl') }}" placeholder="Masukkan tgl">

                                <!-- error message untuk title -->
                                @error('tgl')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                <label class="font-weight-bold"> total</label>
                                <input type="text" class="form-control @error('total') is-invalid @enderror" name="total"value="{{ old('total') }}" placeholder="Masukkan total">

                                <!-- error message untuk title -->
                                @error('total')
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

