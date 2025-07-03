@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Employee Baru</h4>
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

            <form action="{{ route('employee.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" required>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="">Pilih Role</option>
                        @foreach($role as $roleOption)
                        <option value="{{$roleOption}}" {{ old('role') == $roleOption ? 'selected' : '' }}>{{$roleOption}}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                    <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required>
                        <option value="">Pilih jabatan</option>
                        @foreach($jabatan as $jabatanOption)
                        <option value="{{$jabatanOption}}" {{ old('jabatan') == $jabatanOption ? 'selected' : '' }}>{{$jabatanOption}}</option>
                        @endforeach
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fungsi" class="form-label">Fungsi <span class="text-danger">*</span></label>
                    <select class="form-select @error('fungsi') is-invalid @enderror" id="fungsi" name="fungsi" required>
                        <option value="">Pilih fungsi</option>
                        @foreach($fungsi as $fungsiOption)
                        <option value="{{$fungsiOption}}" {{ old('fungsi') == $fungsiOption ? 'selected' : '' }}>{{$fungsiOption}}</option>
                        @endforeach
                    </select>
                    @error('fungsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_mulai_efektif" class="form-label">Tanggal Mulai Efektif <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_mulai_efektif') is-invalid @enderror" id="tanggal_mulai_efektif" name="tanggal_mulai_efektif" value="{{ old('tanggal_mulai_efektif', date('Y-m-d')) }}" required>
                    @error('tanggal_mulai_efektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection