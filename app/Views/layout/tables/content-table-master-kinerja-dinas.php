<div class="container-fluid">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="w-100">
                      <h4 class="text-center text-5xl font-weight-bolder">Kinerja Dinas</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalTambah4">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_kinerjaDinas" style="width: 100%"
                      class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="%">Nama Pencapaian</th>
                          <th width="30%">Deskripsi Pencapaian</th>
                          <th width="25%">Nilai Pencapaian</th>
                          <th width="22%">Tahun Pencapaian</th>
                          <th width="20%">Aksi</th>

                        </tr>
                      </thead>
                      <!--json datasource's consumed here-->
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal simpan / tambah kinerja dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah4" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Kinerja Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Kinerja</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_Kinerja">
                        <div class="mb-3">
                          <Label>
                            Nama Pencapaian
                          </Label>
                          <input type="text" name="nama_pencapaian" class="form-control" placeholder="Nama Pencapaian"
                            aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deksripsi Pencapaian
                          </Label>
                          <input type="text" name="deskripsi_pencapaian" class="form-control"
                            placeholder="Deskripsi Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Nilai Pencapaian
                          </Label>
                          <input type="text" name="nilai_pencapaian" class="form-control" placeholder="0"
                            aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Tahun Pencapaian
                          </Label>
                          <input type="text" name="tahun_pencapaian" class="form-control" placeholder="0"
                            aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2"
                          onclick="simpan_dataKinerja()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#simpan_Kinerja')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal ubah kinerja dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahKinerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Kinerja Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Kinerja</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_Kinerja">
                        <div class="mb-3">
                          <Label>
                            Nama Pencapaian
                          </Label>
                          <input type="text" name="nama_pencapaian" id="nama_pencapaian" class="form-control"
                            placeholder="Nama Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deksripsi Pencapaian
                          </Label>
                          <input type="text" name="deskripsi_pencapaian" id="deskripsi_pencapaian" class="form-control"
                            placeholder="Deskripsi Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Nilai Pencapaian
                          </Label>
                          <input type="text" name="nilai_pencapaian" id="nilai_pencapaian" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Tahun Pencapaian
                          </Label>
                          <input type="text" name="tahun_pencapaian" id="tahun_pencapaian" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahKinerja()"
                          data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#ubah_Kinerja')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>