@extends('anggota.main')

@section('title', 'Buku yang Dipinjam')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buku yang Dipinjam</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $pinjam)
                                    <tr>
                                        <td>{{ $pinjam->user->anggota->nama_lengkap }}</td>
                                        <td>{{ $pinjam->buku->judul_buku }}</td>
                                        <td>{{ $pinjam->created_at->format('d M Y') }}</td>
                                        <td>{{ $pinjam->jatuh_tempo }}</td>
                                        <td>{{ $pinjam->status }}</td>
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
