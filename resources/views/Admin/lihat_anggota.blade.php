@extends(auth()->user()->usertype == 'admin' ? 'layouts.main' : 'anggota.main')

@section('title', 'Data Anggota')

@section('css')
<!-- Stylesheet -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<style>
    .hidden {
        display: none;
    }
</style>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')
<div class="row">
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
                                @if (auth()->user()->usertype == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $anggota)
                            <tr>
                                <td>{{ $anggota->id }}</td>
                                <td>{{ $anggota->nama_lengkap }}</td>
                                <td>{{ $anggota->alamat }}</td>
                                <td>{{ $anggota->tanggal_lahir }}</td>
                                <td>{{ $anggota->no_hp }}</td>
                                <td>{{ $anggota->email }}</td>
                                @if (auth()->user()->usertype == 'admin')
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item m-0">
                                                <a href="{{ url('anggota_read', $anggota->id) }}" class="avtar avtar-s btn btn-primary">
                                                    <i class="ti ti-pencil f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item m-0">
                                                <a href="{{ url('anggota_hapus', $anggota->id) }}" class="btn btn-danger" onclick="confirmation(event)">Hapus</a>
                                            </li>
                                        </ul>
                                    </td>
                                @endif
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
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
            title:"Apakah Kamu Yakin Menghapus Data Ini?",
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

@include('sweetalert::alert')

<script>
    $(document).ready(function() {
        var table = $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Anggota"
            },
            "paging": false,
        });
        $('#multi-table_filter').addClass('full-width');
    });
</script>
@endsection
