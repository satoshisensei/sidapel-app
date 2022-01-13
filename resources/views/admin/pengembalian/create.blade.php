@extends('admin.layouts.app')

@section('container')
    <div class="container container-fluid mb-3 d-flex justify-content-center">
        <h2 class="h3 text-uppercase">Create Data</h2>
    </div>
    <div class="container container-fluid d-flex justify-content-center">
        <div class="col-md-8 ">
            <div class="portlet light bordered">
                    <div class="form-body">
                        <form action="/pengembalian" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pinjam Buku</label>
                            <input type="date" class="form-control @error('tanggal')
                                is-invalid
                            @enderror" id="tanggal" name="tanggal" placeholder="Masukan tanggal..." autofocus required value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Member yang meminjam</label>
                            <select class="form-select" name="member_id">
                                @foreach($members as $member)
                                    @if(old('member_id') == $member->id)
                                        <option value="{{ $member->id }}" selected>{!! $member->nama !!}</option>
                                    @else
                                        <option value="{{ $member->id }}">{!! $member->nama !!}</option>
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
                            <label for="koleksi_id" class="form-label">Koleksi yang dipinjam</label>
                            <select class="form-select" name="koleksi_id">
                                @foreach($koleksis as $koleksi)
                                    @if(old('koleksi_id') == $koleksi->id)
                                        <option value="{{ $koleksi->id }}" selected>{!! $koleksi->nama !!}</option>
                                    @else
                                        <option value="{{ $koleksi->id }}">{!! $koleksi->nama !!}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('pekerjaan_id')
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