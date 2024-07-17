@extends(auth()->user()->usertype == 'admin' ? 'layouts.main' : 'anggota.main')

@section('title', 'Daftar Pengembalian')
@section('breadcrumb-item', 'Daftar Pengembalian')
@section('breadcrumb-item-active', 'Daftar Pengembalian')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<style>
    .hidden {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="row">
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
                                <th>Waktu Dipinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalian as $pengembalian_item)
                            <tr>
                                <td>{{ $pengembalian_item->id }}</td>
                                <td>{{ $pengembalian_item->user->anggota->nama_lengkap }}</td>
                                <td>{{ $pengembalian_item->buku->judul_buku ?? 'Buku tidak ditemukan' }}</td>
                                <td>{{ $pengembalian_item->created_at }}</td>
                                <td>{{ $pengembalian_item->jatuh_tempo }}</td>
                                <td>
                                    @if (Carbon\Carbon::now()->gt(Carbon\Carbon::parse($pengembalian_item->jatuh_tempo)))
                                        <span class="badge bg-danger">Terlambat</span>
                                    @else
                                        <span class="badge bg-success">Tepat Waktu</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('selesai_peminjaman', $pengembalian_item->id) }}" class="btn btn-success selesaiBtn"
                                        data-confirm="Apakah Anda yakin ingin menandai peminjaman ini sebagai selesai?">Selesai</a>
                                    <a href="{{ route('tambah_jatuh_tempo', $pengembalian_item->id) }}" class="btn btn-warning">Tambah Jatuh Tempo</a>
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
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->
<script>
    $(document).ready(function() {
        $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Pengembalian"
            },
            "paging": false,
        });

        $('#multi-table_filter').addClass('full-width');

        // Konfirmasi sebelum menandai peminjaman sebagai selesai
        $('.selesaiBtn').on('click', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var confirmMessage = $(this).data('confirm');

            Swal.fire({
                title: 'Konfirmasi',
                text: confirmMessage,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Selesai',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
</script>

@include('sweetalert::alert')
<!-- [Page Specific JS] end -->
@endsection
