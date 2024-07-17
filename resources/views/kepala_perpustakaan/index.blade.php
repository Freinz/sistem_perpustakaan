@extends('kepala_perpustakaan.main')

@section('title')
@section('breadcrumb-item', 'Application')

@section('breadcrumb-item-active', 'Dashboard')

@section('css')
@endsection

@section('content')
   <!-- [ Main Content ] start -->
   <div class="row">
    <div class="col-sm-6 col-md-6">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Anggota</h5>
                          
                        </div>

                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img"
                                class="img-fluid img-bg h-100">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0"><small
                                        class="text-muted"></small>{{ $totalAnggota }}</h3>
                                <span class="badge bg-light-success ms-2">Anggota Yang Terdata</span>
                            </div>
                          
                           
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Judul Buku</h5>
                           
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-2.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{$totalBuku}}</h3>
                                <span class="badge bg-light-primary ms-2">Judul Buku Yang Terdata</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Daftar Peminjaman</h5>
                            <div class="dropdown">
                          
                             
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0"> <small
                                        class="text-muted"></small>4</h3>
                                <span class="badge bg-light-danger ms-2">Daftar Peminjaman</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Daftar Pengembalian</h5>
                            <div class="dropdown">
                          
                             
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0"> <small
                                        class="text-muted"></small>3</h3>
                                <span class="badge bg-light-danger ms-2">Daftar Pengembalian</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
    </div>
    <!-- [ Main Content ] end -->

        
    <!-- [ Main Content ] end -->

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- [Page Specific JS] start -->
    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
                buttonClass: 'btn'
            });
        })();
    </script>
    <!-- calender js -->
    <script src="{{ URL::asset('build/js/plugins/index.global.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ URL::asset('build/js/plugins/sweetalert2.all.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/calendar.js') }}"></script>
    <!-- [Page Specific JS] end -->
@endsection
