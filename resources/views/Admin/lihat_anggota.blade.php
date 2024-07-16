@extends('layouts.main')

@section('title')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Data Anggota')

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
                                <th>id anggota</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($anggota as $anggota)
                            <tr>
                                <td>{{ $anggota -> id}}</td>
                                <td>{{ $anggota -> nama_lengkap }}</td>
                                <td>{{ $anggota -> alamat }}</td>
                                <td>{{ $anggota -> tanggal_lahir }}</td>
                                <td>{{ $anggota -> no_hp }}</td>
                                <td>{{ $anggota -> email }}</td>

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
<!-- [Page Specific JS] start -->
<script src="{{ URL::asset('build/js/plugins/simple-datatables.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
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