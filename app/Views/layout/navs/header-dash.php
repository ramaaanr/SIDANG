<style>
/* CSS umum untuk semua ukuran layar */
.app-title {
  font-size: 36px;
  /* Ukuran teks default */
}

/* Media query untuk layar dengan lebar maksimal 767px (ukuran handphone) */
@media only screen and (max-width: 767px) {
  .app-title {
    font-size: 14px;
    /* Ukuran teks untuk layar handphone */
  }
}
</style>


<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
  data-scroll="false">
  <div class="container w-100 py-1 px-3 mt-3 ">
    <nav aria-label="breadcrumb" class="w-100">
      <div class="row w-100 d-flex">
        <div class="col-10">
          <div class="d-flex align-items-center">
            <img style="width: 35px;height: 45px;" class="me-1"
              src="<?= base_url() ?>/assets/img/logo-pemko/logo-pemko.png" alt="">
            <h1 class="app-title breadcrumb-item text-white active font-weight-bold">SISTEM INFORMASI DATA
              BIDANG</h1>
          </div>
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Dashboard
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
          <img style="width: 75px; height: 75px;" src=" <?= base_url() ?>/assets/img/logo-pemko/logo-bjb-juara.png"
            alt="">
          <li class="nav-item me-2 d-xl-none  d-flex align-items-center ">
            <a href="javascript:;" class="nav-link text-white rounded-2 p-2 border border-2 border-light"
              id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner ">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
        </div>
      </div>
    </nav>
  </div>
</nav>