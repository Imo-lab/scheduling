@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Data Agen: {{ $employee->nama }} ({{ $employee->nik }})</h4>
        </div>
        <div class="card-body">
            {{-- Menampilkan semua pesan error validasi (jika ada) --}}
            @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employee.update', $employee->nik) }}" method="POST">
                @csrf
                @method('PUT') {{-- Penting untuk metode PUT/PATCH --}}

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $employee->nik }}" disabled>
                    <small class="form-text text-muted">NIK tidak bisa diubah setelah dibuat.</small>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Employee <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $employee->nama) }}" placeholder="Masukkan Nama Lengkap" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role Baru<span class="text-danger">*</span></label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="">Pilih Role Baru</option>
                        @foreach($role as $roleOption)
                        <option value="{{$roleOption}}" {{ old('role',$employee->role) == $roleOption ? 'selected' : '' }}>{{$roleOption}}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan Baru <span class="text-danger">*</span></label>
                    <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required>
                        <option value="">Pilih jabatan</option>
                        @foreach($jabatan as $jabatanOption)
                        <option value="{{$jabatanOption}}" {{ old('jabatan',$employee->jabatan) == $jabatanOption ? 'selected' : '' }}>{{$jabatanOption}}</option>
                        @endforeach
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fungsi" class="form-label">Fungsi Baru <span class="text-danger">*</span></label>
                    <select class="form-select @error('fungsi') is-invalid @enderror" id="fungsi" name="fungsi" required>
                        <option value="">Pilih fungsi</option>
                        @foreach($fungsi as $fungsiOption)
                        <option value="{{$fungsiOption}}" {{ old('fungsi',$employee->fungsi) == $fungsiOption ? 'selected' : '' }}>{{$fungsiOption}}</option>
                        @endforeach
                    </select>
                    @error('fungsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_mulai_efektif" class="form-label">Tanggal Mulai Efektif Role Baru <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_mulai_efektif') is-invalid @enderror" id="tanggal_mulai_efektif" name="tanggal_mulai_efektif" value="{{ old('tanggal_mulai_efektif', date('Y-m-d')) }}" required>
                    <small class="form-text text-muted">Isi tanggal ini adalah kapan role baru tersebut mulai berlaku.</small>
                    @error('tanggal_mulai_efektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update Agen</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection