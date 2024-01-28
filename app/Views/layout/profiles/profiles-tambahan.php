<div id="tabel-kinerja" class="row mt-4">
  <div class="col-lg mb-lg-0 mb-4">
    <div class="card p-2">
      <div class="card-header pb-0 p-3">
        <div class="text text-center">
          <h6 class="text-uppercase text-lg mb-3">Tabel Kinerja Indikator</h6>
          <hr class="horizontal dark my-1">
        </div>
      </div>
      <div id="tabel-indikator-container" class="table-responsive p-3">
        <table id="tabel_dataIndikatorBidang" style="width: 100%" class="table tabel-hover align-items-center ">
          <thead>
            <tr>
              <th>
                <div>No</div>
              </th>
              <th>
                <div class="text-center">Nama Indikator</div>
              </th>
              <th>
                <div class="text-center">Target</div>
              </th>
              <th>
                <div class="text-center">Tw. I</div>
              </th>
              <th>
                <div class="text-center">Tw. II</div>
              </th>
              <th>
                <div class="text-center">Tw. III</div>
              </th>
              <th>
                <div class="text-center">Tw. IV</div>
              </th>
              <th>
                <div class="text-center">Capaian Kinerja</div>
              </th>
              <th>
                <div class="text-center">Keterangan</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- Json_encode data indikator consumed here-->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="bagan-persentase" class="row mt-4">
  <div class="col-lg mb-lb-0 mb-4">
    <div class="card p-2">
      <div class="card-header pb-0 p-3">
        <div class="text text-center">
          <h6 class="text-uppercase text-lg mb-3">Bagan Persentase Indikator</h6>
          <hr class="horizontal dark my-1">
        </div>
      </div>
      <div id="chart-indikator-body" class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="250"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="tabel-kegiatan" class="row mt-4">
  <div class="col-lg mb-lb-0 mb-4">
    <div class="card p-2">
      <div class="card-header pb-0 p-3">
        <div class="text text-center">
          <h6 class="text-uppercase text-lg mb-3">Tabel Data Bidang</h6>
          <hr class="horizontal dark my-1">
        </div>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive p-4">
          <table id="tabelDataBidang" style="width: 100%"
            class="table table-hover table-striped align-items-center mb-">
            <thead>
              <tr>
                <th width="10%">ID Data Bidang</th>
                <th width="10%">Nama Bidang</th>
                <th width="20%">Desk Data</th>
                <th width="20%">Target</th>
                <th width="20%">Realisasi</th>
                <th width="20%">Lampiran</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <!--json datasource's consumed here-->
          </table>
        </div>
      </div>
    </div>
  </div>

</div>