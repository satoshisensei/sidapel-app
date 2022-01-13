@extends('admin.layouts.app')

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/pengembalian/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
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
                @foreach ($pengembalians as $pengembalian)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{!! $pengembalian->member->nama !!}</td>
                    <td>{!! $pengembalian->koleksi->nama !!}</td>
                    <td>{!! $pengembalian->tanggal !!}</td>
                    <td>
                        <a href="/pengembalian/{{ $pengembalian->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>|
                        <a href="/pengembalian/{{ $pengembalian->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>|
                        <form action="/pengembalian/{{ $pengembalian->id }}" method="post" class="d-inline">
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
            $('#pengembalians-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('pengunjung-data') !!}',
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