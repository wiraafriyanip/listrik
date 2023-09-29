@extends('template')
@section('judul_halaman','')
@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('tagihan.update', $tagihan->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold">no</label>
                            <input type="text" class="form-control @error('no') is-invalid @enderror" name="no" value="{{ old('no', $tagihan->no) }}" placeholder="Masukkan Judul tagihan">
                            @error('no')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" name="biaya" value="{{ old('biaya', $tagihan->biaya ) 
                            }}" placeholder="Masukkan biayaongan">
                             @error('biaya')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                    <div class="form-group">
                            <label class="font-weight-bold">tarif</label>
                            <input type="text" class="form-control @error('tarif') is-invalid @enderror" name="tarif" value="{{ old('tarif', $tagihan->tarif) }}" placeholder="Masukkan tarif tagihan">
                            @error('tarif')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">jumlah</label>
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah', $tagihan->jumlah) }}" placeholder="Masukkan jumlah tagihan">
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
