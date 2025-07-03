@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-light p-4 rounded-3">
        <p class="lead">Flow Key Performance Indicator :</p>
        <p>1. Unggah file Regular Update dengan format xlsx atau csv.</p>
        <p>2. Tekan tombol <span style="color: blue;">“Generate KPI Awal”</span> untuk menghasilkan nilai KPI awal.</p>
        <p>3. File nilai KPI awal dapat di akses pada laman SharePoint CSM dan berada pada folder Contact Center/KPI/verifikasi.</p>
        <p>4. Lakukan verifikasi pada nilai KPI awal.</p>
        <p>5. Tekan tombol <span style="color: blue;">“Generate KPI Akhir”</span> untuk menghasilkan nilai KPI akhir.</p>
        <p>6. Lakukan verifikasi pada rapor KPI yang dapat di akses pada laman SharePoint CSM dan berada pada folder Contact Center/KPI/Rapor.</p>
        <p>7. Tekan tombol <span style="color: blue;">“Kirim Hasil KPI”</span> untuk mengirimkan hasil KPI pada setiap employee.</p>
        <hr class="my-4">

        <div class="container mt-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Unggah File Regular Update</h5>
                </div>
                <div class="card-body">
                    {{-- Tampilkan pesan error --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kpi.uploadFile') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Token CSRF untuk keamanan --}}

                        <div class="mb-3">
                            <label for="file_upload" class="form-label">Pilih File (Excel/CSV)</label>
                            <input class="form-control" type="file" id="file_upload" name="file_upload" required>
                            <div class="form-text">Nama file: ru_cc_bulan_tahun</div>
                            <div class="form-text">Format yang didukung: .xlsx, .csv</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Unggah File</button>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-4">

        <a class="btn btn-primary" href="" role="button">Genereate KPI Awal</a>
        <a class="btn btn-primary" href="" role="button">Genereate KPI Akhir</a>
        <a class="btn btn-primary" href="" role="button">Kirim Hasil KPI</a>

        <p class="mt-2" style="color: Red;">Jangan Salah Tekan Tombol!</p>
        <!-- <a class="btn btn-primary btn-lg" href="{{ route('employee.index') }}" role="button">Lihat Daftar Agen</a>
        <a class="btn btn-primary btn-lg" href="{{ route('kpi.index') }}" role="button">Key Performance Indicator</a> -->
    </div>
@endsection