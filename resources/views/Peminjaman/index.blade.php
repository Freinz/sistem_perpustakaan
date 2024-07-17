@extends('anggota.main')

@section('title', 'Daftar Buku')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Daftar Buku')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <div class="table-responsive dt-responsive">
                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Id buku</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah Buku Tersedia</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($buku as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->judul_buku }}</td>
                                <td>{{ $item->nama_penulis }}</td>
                                <td>{{ $item->nama_penerbit }}</td>
                                <td>{{ $item->tahun_terbit }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <a href="{{ url('pinjam_buku', $item->id) }}" class="btn btn-success">Pinjam</a>
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
<!-- SweetAlert -->
<!-- datatable Js -->
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
            title: "Apakah Kamu Yakin Menghapus Data Ini?",
            text: "Kamu tidak bisa mengembalikan data ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        var table = $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Buku"
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
