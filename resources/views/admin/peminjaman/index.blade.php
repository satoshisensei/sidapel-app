@extends('admin.layouts.app')

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/peminjaman/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
    </div>
        <div class="container container-fluid">
            <table class="table table-responsive table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Anggota</th>
                    <th scope="col">Koleksi</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($peminjamans as $peminjaman)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{!! $peminjaman->member->nama !!}</td>
                    <td>{!! $peminjaman->koleksi->nama !!}</td>
                    <td>{!! $peminjaman->tanggal !!}</td>
                    <td>
                        <a href="/peminjaman/{{ $peminjaman->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>|
                        <a href="/peminjaman/{{ $peminjaman->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>|
                        <form action="/peminjaman/{{ $peminjaman->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @push('scripts')
        <script>
        $(function() {
            $('#peminjamans-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('pinjam-data') !!}',
                columns: [
                    { data: 'member', name: 'member' },
                    { data: 'koleksi', name: 'koleksi' },
                    { data: 'tanggal', name: 'tanggal' },
                ]
            });
        });
        </script>
        @endpush
@endsection