<div class="container-fluid">
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class=" mb-xl-0">
        <div class="card">
          <div class="card-body p-5">
            <div class="numbers">

              <div class="card mb-3 shadow-none" style="max-width: 100%;">
                <div class="row g-0 ">
                  <div class="col-md-3">
                    <img id="gambarBidang" class="img-fluid rounded" alt="profil-bidang">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body flex flex-column justify-content-center align-content-center">
                      <div class="card-title ">
                        <div class="mb-4 text-uppercase text-uppercase  font-weight-bolder h3">Bidang
                          <h3 id="namaBidang" class="text-center mb-4 text-uppercase font-weight-bolder h3" style="display: inline;">
                          </h3>
                        </div>
                      </div>
                      <!-- <div class="card-text">
                        <p class="mb-4 mt-3 text-uppercase ">profile bidang</p>
                      </div> -->
                      <div class="row">
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#pejabat-bidang">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Pejabat
                              Bidang</button>
                          </a>
                        </div>
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#pagu-anggaran">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Pagu
                              Anggaran</button>
                          </a>
                        </div>
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#realisasi-anggaran">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Realisasi
                              Anggaran</button>
                          </a>
                        </div>
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#tabel-kinerja">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Table
                              Kinerja</button>
                          </a>
                        </div>
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#bagan-persentase">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Bagan
                              Persentase</button>
                          </a>
                        </div>
                        <div class="col-lg-4 col-6 py-2 px-1">
                          <a class="h-100 d-block" href="#tabel-kegiatan">
                            <button type="button" class="btn btn-outline-primary btn-sm text-xs w-100 h-100 py-0">Tabel
                              Kegiatan</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text text-justify mt-4">
                <p id="deskBidang" style="text-indent: 50px;">Deskripsi</p>
                <h4 id="pejabat-bidang" class="text-center mb-4 mt-4 text-uppercase font-weight-bold">pejabat bidang
                </h4>
                <hr class="horizontal dark my-3">
                <table id="tabel_dataPegawaiBidang" style="width: 100%" class="table table-hover align-items-center">
                  <thead>
                    <tr>
                      <th width="30%">Jabatan</th>
                      <th width="70%">Nama</th>
                    </tr>
                  </thead>
                  <!--json datasource's consumed here-->
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('profiles-pagu.php') ?>

    <?php include('profiles-tambahan.php') ?>

  </div>
</div>