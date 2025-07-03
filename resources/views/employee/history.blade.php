@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Riwayat Role Agen: {{ $employeeHistory->first()->nama ?? 'N/A' }} ({{ $employeeHistory->first()->nik ?? 'N/A' }})</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Role</th>
                            <th>Jabatan</th>
                            <th>Fungsi</th>
                            <th>Mulai Efektif</th>
                            <th>Berakhir Efektif</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employeeHistory as $history)
                            <tr>
                                <td>{{ $history->role }}</td>
                                <td>{{ $history->jabatan }}</td>
                                <td>{{ $history->fungsi }}</td>
                                <td>{{ $history->tanggal_mulai_efektif->format('d-m-Y') }}</td>
                                <td>
                                    @if ($history->tanggal_akhir_efektif->format('Y-m-d') == '9999-12-31')
                                        **None**
                                    @else
                                        {{ $history->tanggal_akhir_efektif->format('d-m-Y') }}
                                    @endif
                                </td>
                                <td>
                                    @if ($history->current_flag)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-info">Historis</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada riwayat untuk agen ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary mt-3">Kembali ke Daftar Agen</a>
        </div>
    </div>
@endsection