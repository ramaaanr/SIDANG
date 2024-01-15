<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main" data-color="dark">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://google.com " target="_blank">
            <img src="<?= base_url() ?>/assets/img/logo.png"
                style=" position: absolute; top: 5%;  left: 50%; transform: translate(-50%, -50%) scale(1.7)" />
        </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url() ?>Home">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="ms-1 d-none d-sm-inline">Profile Bidang</span>
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a class="nav-link " href="<?= base_url() ?>BidangSEKRE">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            </div>
                            <span class="nav-link-text ms-1">Sekretariat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() ?>BidangDalduk">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            </div>
                            <span class="nav-link-text ms-1">Dalduk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() ?>BidangKBKS">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            </div>
                            <span class="nav-link-text ms-1">KB & KS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() ?>BidangPM">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            </div>
                            <span class="nav-link-text ms-1">PM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>BidangPPPA">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            </div>
                            <span class="nav-link-text ms-1">PPPA</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>TabelMaster">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tabel Master</span>
                </a>
            </li>
        </ul>
    </div>
</aside>