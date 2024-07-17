@extends('layouts.main')

@section('title', 'Tambah Buku')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
<!-- Stylesheet -->
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Isi Data Buku Berikut</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('kirim_buku') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" name="judul_buku" id="judul_buku" placeholder="Masukkan Judul Buku" value="{{ old('judul_buku') }}">
                                @error('judul_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_penulis">Nama Penulis</label>
                                <input type="text" class="form-control @error('nama_penulis') is-invalid @enderror" name="nama_penulis" id="nama_penulis" placeholder="Masukkan Nama Penulis" value="{{ old('nama_penulis') }}">
                                @error('nama_penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_penerbit">Nama Penerbit</label>
                                <input type="text" class="form-control @error('nama_penerbit') is-invalid @enderror" name="nama_penerbit" id="nama_penerbit" placeholder="Masukkan Nama Penerbit" value="{{ old('nama_penerbit') }}">
                                @error('nama_penerbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="tahun_terbit">Tahun Penerbit</label>
                                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Penerbit" value="{{ old('tahun_terbit') }}">
                                @error('tahun_terbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="jumlah">Jumlah Buku</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" placeholder="Masukkan Tahun Penerbit" value="{{ old('jumlah') }}">
                                @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Masukkan Kategori" value="{{ old('kategori') }}">
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection

@section('scripts')
<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

@include('sweetalert::alert')
<!-- [Page Specific JS] end -->
@endsection
