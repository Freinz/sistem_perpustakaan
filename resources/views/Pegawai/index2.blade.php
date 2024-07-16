@extends('pegawai.main')

@section('title', 'Calendar')
@section('breadcrumb-item', 'Application')

@section('breadcrumb-item-active', 'Calendar')

@section('css')
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body position-relative">
                    <div id="calendar" class="calendar"></div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->

    <div class="modal fade" id="calendar-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="calendar-modal-title f-w-600 text-truncate">Nama Kegiatan</h3>
                    <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>

                <div class="modal-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-secondary">
                                <i class="ti ti-heading f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Nama Kegiatan</b></h5>
                            <p class="pc-event-title text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-secondary">
                                <i class="ti ti-heading f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Jenis Kegiatan</b></h5>
                            <p class="pc-event-kegiatan text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-secondary">
                                <i class="ti ti-heading f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Berkas Pelaksanaan</b></h5>
                            <p class="pc-event-documents text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-secondary">
                                <i class="ti ti-heading f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Kelengkapan Pelaksanaan</b></h5>
                            <p class="pc-event-equipment text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-secondary">
                                <i class="ti ti-heading f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Pelaksana Kegiatan</b></h5>
                            <p class="pc-event-organizer text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-warning">
                                <i class="ti ti-map-pin f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Tempat Pelaksanaan</b></h5>
                            <p class="pc-event-venue text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-danger">
                                <i class="ti ti-calendar-event f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Tanggal Pelaksanaan</b></h5>
                            <p class="pc-event-date text-muted"></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-xs bg-light-primary">
                                <i class="ti ti-file-text f-20"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><b>Catatan</b></h5>
                            <p class="pc-event-description text-muted"></p>
                        </div>
                    </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <ul class="list-inline me-auto mb-0">
                        <li class="list-inline-item align-bottom">
                            <a href="#" id="pc_event_remove"
                                class="avtar avtar-s btn-link-danger btn-pc-default w-sm-auto" data-bs-toggle="tooltip"
                                title="Delete">
                                <i class="ti ti-trash f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom">
                            <a href="#" id="pc_event_edit" class="avtar avtar-s btn-link-success btn-pc-default"
                                data-bs-toggle="tooltip" title="Edit">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end cal-event-offcanvas" tabindex="-1" id="calendar-add_edit_event">

        
    </div>

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
