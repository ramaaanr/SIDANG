<aside style="background-color: #ffffff;" class="sidenav bg-white z-index-3 navbar navbar-vertical d-flex navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main" data-color="dark">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#" target="_blank">
      <img src="<?= base_url() ?>/assets/img/logo.png" style=" position: absolute; top: 5%;  left: 50%; transform: translate(-50%, -50%) scale(1.7)" />
    </a>
  </div>
  <hr class="horizontal dark mt-0" />
  <div class="collapse navbar-collapse w-auto h-75 overflow-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Home">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm "></i>
          </div>
          <span class="ms-1 ">Profile Bidang</span>
        </a>
        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
          <li class="w-100">
            <a class="nav-link " href="<?= base_url() ?>BidangSEKRE">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Sekretariat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url() ?>BidangDalduk">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Dalduk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url() ?>BidangKBKS">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">KB & KS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url() ?>BidangPM">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">PM</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>BidangPPPA">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">PPPA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>BidangPPHA">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">PPHA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>BidangUPTD">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">UPTD</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" id="nav-tabel-master">
        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="ms-1 ">Tabel Master</span>
        </a>
        <ul class="collapse nav show flex-column ms-1" id="submenu2" data-bs-parent="#menu">
          <li class="w-100">
            <a class="nav-link " href="<?= base_url() ?>AnggaranBidang">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Anggaran Bidang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url() ?>AnggaranDinas">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Anggaran Dinas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>IndikatorDinas">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Indikator Dinas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url() ?>KinerjaDinas">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Kinerja Dinas</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="<?= base_url() ?>DataPegawai">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Data Pegawai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>ProfilBidang">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Profil Bidang</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>DataBidang">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-building text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Bidang</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="nav-item d-flex align-items-end justify-content-center  w-100">
    <a href="<?= base_url() ?>/Login/Logout" class="nav-link text-black font-weight-bold px-0">
      <i class="fa fa-user me-sm-1"></i>
      <span class="d-sm-inline d-none">Logout</span>
    </a>
  </div>
</aside>