@extends('admin.layouts.app')

@section('container')
    <div class="container container-fluid mb-3 d-flex justify-content-center">
        <h2 class="h3 text-uppercase">Edit Data</h2>
    </div>
    <div class="container container-fluid d-flex justify-content-center">
        <div class="col-md-8 ">
            <div class="portlet light bordered">
                    <div class="form-body">
                        <form action="/pengunjung/{{ $pengunjungs[0]->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama')
                                is-invalid
                            @enderror" id="nama" name="nama" placeholder="Enter Koleksi..." autofocus required value="{{ old('nama',$pengunjungs[0]->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor Pengunjung</label>
                            <input type="text" class="form-control @error('nomor')
                                is-invalid
                            @enderror" id="nomor" name="nomor" placeholder="Masukan Nomor..." autofocus required value="{{ old('nomor',$pengunjungs[0]->nomor) }}">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan Kunjungan</label>
                            <input type="text" class="form-control @error('tujuan')
                                is-invalid
                            @enderror" id="tujuan" name="tujuan" placeholder="Masukan Tujuan Kunjungan..." autofocus required value="{{ old('tujuan',$pengunjungs[0]->tujuan) }}">
                            @error('tujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category Pengunjung</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    @if(old('category_id',$pengunjungs[0]->category_id) == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->jenis }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->jenis }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_id" class="form-label">Pendidikan</label>
                            <select class="form-select" name="pendidikan_id">
                                @foreach($pendidikans as $pendidikan)
                                    @if(old('pendidikan_id',$pengunjungs[0]->pendidikan_id) == $pendidikan->id)
                                        <option value="{{ $pendidikan->id }}" selected>{{ $pendidikan->tingkat }}</option>
                                    @else
                                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->tingkat }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('pendidikan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                            <select class="form-select" name="pekerjaan_id">
                                @foreach($pekerjaans as $pekerjaan)
                                    @if(old('pekerjaan_id',$pengunjungs[0]->pekerjaan_id) == $pekerjaan->id)
                                        <option value="{{ $pekerjaan->id }}" selected>{{ $pekerjaan->nama }}</option>
                                    @else
                                        <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('pekerjaan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender_id" class="form-label">Kelamin</label>
                            <select class="form-select" name="gender_id">
                                @foreach($genders as $gender)
                                    @if(old('gender_id',$pengunjungs[0]->gender_id) == $gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->jenis }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->jenis }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('gender_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url()->previous() }}" class="btn btn-primary me-md-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
