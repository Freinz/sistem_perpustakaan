<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') KEMENKUMHAM</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('image/kemenkumham.png') }}" type="image/png">

    @yield('css')

    @include('layouts.head-css')
</head>

<body class="layout-2" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">

    @include('layouts.loader')
    @include('pegawai.sidebar')
    @include('pegawai.topbar')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @if (View::hasSection('breadcrumb-item'))
                @include('layouts.breadcrumb')
            @endif

            @yield('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Lengkapi Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ url('kirim_edit_data', ['id' => $pegawai_data->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label class="form-label" for="nip">NIP</label>
                                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="Isi NIP" value="{{ $pegawai_data->nip }}">
                                            @error('nip')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="nama_pegawai">Nama</label>
                                            <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" id="nama_pegawai" value="{{ $pegawai_data->nama_pegawai }}">
                                            @error('nama_pegawai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Masukkan jabatan" value="{{ $pegawai_data->jabatan }}">
                                            @error('jabatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
</html>
