@extends('template')
@section('judul_halaman','')
@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('listrik.update', $listrik->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode', $listrik->kode) }}" placeholder="Masukkan Judul listrik">
                            @error('kode')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">golongan</label>
                            <input type="text" class="form-control @error('gol') is-invalid @enderror" name="gol" value="{{ old('gol', $listrik->gol ) 
                            }}" placeholder="Masukkan golongan">
                             @error('gol')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                    <div class="form-group">
                            <label class="font-weight-bold">Daya</label>
                            <input type="text" class="form-control @error('daya') is-invalid @enderror" name="daya" value="{{ old('daya', $listrik->daya) }}" placeholder="Masukkan daya listrik">
                            @error('daya')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">tarifKWh</label>
                            <input type="text" class="form-control @error('tarif') is-invalid @enderror" name="tarif" value="{{ old('tarif', $listrik->tarif) }}" placeholder="Masukkan tarif listrik">
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
