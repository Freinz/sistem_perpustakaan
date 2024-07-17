@extends('layouts.main')

@section('title', 'Daftar Peminjaman')
@section('breadcrumb-item', 'Daftar Peminjaman')
@section('breadcrumb-item-active', 'Daftar Peminjaman')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
<!-- Stylesheet -->
<style>
    .hidden {
        display: none;
    }
</style>
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <!-- Row Grouping table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive dt-responsive">
                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID Peminjaman</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $peminjaman_item)
                            <tr>
                                <td>{{ $peminjaman_item->id }}</td>
                                <td>{{ $peminjaman_item->user->anggota->nama_lengkap }}</td>
                                <td>
                                    @if ($peminjaman_item->buku)
                                        {{ $peminjaman_item->buku->judul_buku }}
                                    @else
                                        Buku tidak ditemukan
                                    @endif
                                </td>
                                <td>{{ $peminjaman_item->status }}</td>
                                <td>
                                    @if ($peminjaman_item->status == 'Menunggu Validasi')
                                    <a href="{{ url('validasi_pinjam', $peminjaman_item->id) }}" class="btn btn-primary">Validasi</a>
                                    <a href="{{ url('tolak_pinjam', $peminjaman_item->id) }}" class="btn btn-danger">Tolak</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<!-- datatable Js -->
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        var table = $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Peminjaman"
            },
            "paging": false, // Disable pagination
        });

        // Move the search input to span the full width
        $('#multi-table_filter').addClass('full-width');
    });
</script>
<!-- [Page Specific JS] end -->
@endsection
