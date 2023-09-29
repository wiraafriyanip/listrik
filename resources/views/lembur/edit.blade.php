@extends('template')
@section('judul_halaman','')
@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('lembur.update', $lembur->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold">nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $lembur->nama) }}" placeholder="Masukkan Judul lembur">
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">tgl</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{ old('tgl', $lembur->tgl ) 
                            }}" placeholder="Masukkan tgl">
                             @error('tgl')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                   
                        <div class="form-group">
                            <label class="font-weight-bold">total</label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total', $lembur->total) }}" placeholder="Masukkan total">
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
