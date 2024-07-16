<!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
               
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
         <div class="mt-3">
            <button type="button" style="font-size: 18px;" class="btn btn-light-primary">Notifikasi</button>
         </div>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-bell"></i>
                        <span class="badge bg-success pc-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Notifications</h5>
                            <ul class="list-inline ms-auto mb-0">
                                <li class="list-inline-item">
                                    <a href="{{ url('application/mail') }}" class="avtar avtar-s btn-link-hover-primary">
                                        <i class="ti ti-link f-18"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative"
                            style="max-height: calc(100vh - 235px)">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="text-span">Today</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/user/avatar-3.jpg') }}"
                                                alt="user-image" class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Keefe Bond added new tags to �
                                                        Design system</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been
                                                    the industry's standard dummy text ever since the 1500s.</span></p>
                                            <span class="badge bg-light-primary border border-primary me-1 mt-1">web
                                                design</span>
                                            <span
                                                class="badge bg-light-warning border border-warning me-1 mt-1">Dashobard</span>
                                            <span class="badge bg-light-success border border-success me-1 mt-1">Design
                                                System</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-primary">
                                                <i class="ph-duotone ph-chats-teardrop f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Message</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">1 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been
                                                    the industry's standard dummy text ever since the 1500s.</span></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <p class="text-span">Yesterday</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-danger">
                                                <i class="ph-duotone ph-user f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Challenge invitation</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">12 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate"><strong> Jonny aber
                                                    </strong> invites to join the challenge</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-info">
                                                <i class="ph-duotone ph-notebook f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Forms</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply
                                                dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/user/avatar-3.jpg') }}"
                                                alt="user-image" class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Keefe Bond <span class="text-body">
                                                            added new tags to </span> 💪
                                                        Design system</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been
                                                    the industry's standard dummy text ever since the 1500s.</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-success">
                                                <i class="ph-duotone ph-shield-checkered f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Security</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">5 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply
                                                dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-footer">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-primary">Archive all</button></div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-outline-secondary">Mark all as
                                            read</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="mt-3">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</button>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a> -->
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"
                                            class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Logout</span>
                                            </span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>                                   
                      </div>
                 </div>
        </div>
    </div>
</header>
<!-- [ Header ] end -->
