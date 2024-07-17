@extends('layouts.main')

@section('title', 'Lihat Laporan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lihat Laporan</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Laporan</th>
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $laporan_item)
                                    <tr>
                                        <td>{{ $laporan_item->id }}</td>
                                        <td>{{ $laporan_item->anggota->nama_lengkap }}</td>
                                        <td>{{ $laporan_item->buku->judul_buku }}</td>
                                        <td>{{ $laporan_item->peminjaman->created_at->format('d M Y') }}</td>
                                        <td>{{ $laporan_item->pengembalian->tanggal_pengembalian }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
