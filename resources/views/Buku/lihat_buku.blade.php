@extends('layouts.main')

@section('title')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Data Buku')

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
    .add-book-button {
        margin-bottom: 15px;
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
                
                <!-- Add Book Button -->
                <a href="{{ url('tambah_buku') }}" class="btn btn-primary add-book-button">Tambahkan Buku</a>

                <div class="table-responsive dt-responsive">
                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Id buku</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($buku as $buku)
                            <tr>
                                <td>{{ $buku->id }}</td>
                                <td>{{ $buku->judul_buku }}</td>
                                <td>{{ $buku->nama_penulis }}</td>
                                <td>{{ $buku->nama_penerbit }}</td>
                                <td>{{ $buku->tahun_penerbit }}</td>
                                <td>{{ $buku->kategori }}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item m-0">
                                            <a href="{{ url('anggota_read', $anggota->id) }}" class="avtar avtar-s btn btn-primary">
                                                <i class="ti ti-pencil f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item m-0">
                                            <button class="btn btn-danger delete-button" data-id="{{ $anggota->id }}">
                                                <i class="ti ti-trash f-18"></i>
                                            </button>
                                        </li>
                                    </ul>
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
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 5
        });

        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Iya, Hapus saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/anggota_hapus/" + id;
                    }
                });
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        var table = $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Anggota"
            },
            "paging": false, // Disable pagination
        });

        // Move the search input to span the full width
        $('#multi-table_filter').addClass('full-width');
    });
</script>

@include('sweetalert::alert')
<!-- [Page Specific JS] end -->
@endsection
