@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Employee Aktif</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-primary">Tambah Employee Baru</a>
    </div>

    {{-- Menampilkan semua pesan error validasi (jika ada) --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Jabatan</th>
                    <th>Fungsi</th>
                    <th>Mulai Efektif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employee as $employees)
                    <tr>
                        <td>{{ $employees->nik }}</td>
                        <td>{{ $employees->nama }}</td>
                        <td>{{ $employees->role }}</td>
                        <td>{{ $employees->jabatan }}</td>
                        <td>{{ $employees->fungsi }}</td>
                        <td>{{ $employees->tanggal_mulai_efektif->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('employee.edit', $employees->nik) }}" class="btn btn-sm btn-warning me-2" title="Edit Data Employee">Edit</a>
                            <a href="{{ route('employee.history', $employees->nik) }}" class="btn btn-sm btn-secondary" title="Lihat Riwayat Role">Riwayat</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada employee aktif yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Untuk Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $employee->links('pagination::bootstrap-5') }}
    </div>
@endsection