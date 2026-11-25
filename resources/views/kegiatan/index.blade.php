@extends('layouts.master')

@section('title', 'Daftar Kegiatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Kegiatan</h4>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">+ Tambah Kegiatan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul Kegiatan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kegiatan->tanggal }}</td>
                            <td>{{ $kegiatan->judul_kegiatan }}</td>
                            <td>{{ $kegiatan->deskripsi }}</td>
                            <td>
                                <a href="{{ route('kegiatan.edit', $kegiatan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus kegiatan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada kegiatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection