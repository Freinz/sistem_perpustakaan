<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('image/poliban.png') }}" type="image/png">

    @yield('css')

    @include('layouts.head-css')
</head>

<body class="layout-2" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
        data-pc-direction="ltr" data-pc-theme="light">

    @include('layouts.loader')
    @include('anggota.sidebar')
    @include('anggota.topbar')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @if (View::hasSection('breadcrumb-item'))
                @include('layouts.breadcrumb')
            @endif
            <!-- [ Main Content ] start -->
            @yield('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Pribadi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_lengkap">Nama</label>
                                        <p id="nama_lengkap" class="form-control-plaintext">{{ $anggota->nama_lengkap ?? 'N/A' }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <p id="alamat" class="form-control-plaintext">{{ $anggota->alamat ?? 'N/A' }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                        <p id="tanggal_lahir" class="form-control-plaintext">{{ $anggota->tanggal_lahir ?? 'N/A' }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="no_hp">Nomor Handphone</label>
                                        <p id="no_hp" class="form-control-plaintext">{{ $anggota->no_hp ?? 'N/A' }}</p>
                                    </div>
                                    

                                    <a href="{{ url('edit_data', ['anggota_id' => $anggota->id]) }}" class="btn btn-primary">Edit Data</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('layouts.footer')
    @include('layouts.customizer')

    @include('layouts.footerjs')
    <script>
        document.querySelector('.pc-sidebar .m-header .badge').classList.add('bg-dark');
        document.querySelector('.pc-sidebar .m-header .badge').classList.remove('bg-brand-color-2');
        layout_sidebar_change('dark');
        layout_caption_change('false');
        if (document.querySelector('.pc-sidebar .m-header .logo-lg')) {
            document.querySelector('.pc-sidebar .m-header .logo-lg').setAttribute('src', '/build/images/logo-white.svg');
            document.querySelector('.pc-sidebar .m-header').classList.add('bg-brand-color-2');
        }

        function changebrand(temp) {
            removeClassByPrefix(document.querySelector('.pc-sidebar .m-header'), "bg-");
            document.querySelector('.pc-sidebar .m-header').classList.add(temp);
        }
    </script>

    @include('sweetalert::alert')

    @yield('scripts')

</body>
<!-- [Body] end -->

</html>
