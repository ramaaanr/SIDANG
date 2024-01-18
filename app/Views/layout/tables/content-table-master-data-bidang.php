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
                      <h4 class="text-center text-uppercase font-weight-bolder text-5xl">Data Bidang</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_dataBidang" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="10%">ID Data Bidang</th>
                          <th width="10%">Nama Bidang</th>
                          <th width="20%">Desk Data</th>
                          <th width="20%">Target</th>
                          <th width="20%">Realisasi</th>
                          <th width="20%">Lampiran</th>
                          <th width="20%">Aksi</th>
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
        </div>

        <!-- modal simpan / tambah anggaran bidang-->

        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Anggaran Bidang
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_dataBidang">
                        <div class="mb-3">
                          <Label>
                            Deskripsi data
                          </Label>
                          <input type="text" id='desk_data' name="desk_data" class="form-control" placeholder="Deskripsi Data" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Bidang
                          </Label>
                          <input type="number" min="0" max="100" name="target_bidang" class="form-control" placeholder="Target Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Bidang
                          </Label>
                          <input type="number" min="0" max="100" name="realisasi_bidang" class="form-control" placeholder="Realisasi Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Lampiran Bidang
                          </Label>
                          <input type="file" name="lampiran_bidang" id="lampiran_bidang" required>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataDataBidang()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_dataBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ubah anggaran bidang -->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahDataBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Anggaran Bidang
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_dataBidang">
                        <input id="ubahIdBidang" type="hidden" name="id_bidang">
                        <div class="mb-3">
                          <Label>
                            Deskripsi data
                          </Label>
                          <input id="ubahDeskData" type="text" name="desk_data" class="form-control" placeholder="Deskripsi Data" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Bidang
                          </Label>
                          <input id="ubahTargetBidang" type="number" min="0" max="100" name="target_bidang" class="form-control" placeholder="Target Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Bidang
                          </Label>
                          <input id="ubahRealisasiBidang" type="number" min="0" max="100" name="realisasi_bidang" class="form-control" placeholder="Realisasi Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Lampiran Bidang
                          </Label>
                          <a class="link-info" id="urlLampiran">Lampiran Sebelumnya</a>
                          <input id="newUbahLampiranBidang" type="file" name="new_lampiran_bidang" id="lampiran_bidang">
                          <input id="oldUbahLampiranBidang" type="hidden" name="old_lampiran_bidang" id="lampiran_bidang" required>
                          <div class="alert alert-success d-flex mt-2 align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div class="text-bold text-white">
                              Biarkan Input File Kosong Jika Tidak Ada Perubahan
                            </div>
                          </div>
                        </div>
                      </form>

                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahDataBidang()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_dataBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        < </div>
      </div>
    </div>
  </div>