<div class="container-fluid">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="card mb-4 p-3">
          <h4 class="text text-center">DATA ANGGARAN DINAS</h1>
        </div>
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Anggaran Dinas</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah2">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_anggaranDinas" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="%">Tahun Anggaran</th>
                          <th width="25%">Triwulan Anggaran</th>
                          <th width="22%">Pagu Anggaran</th>
                          <th width="32%">Realisasi Anggaran</th>
                          <th width="20%">Aksi</th>
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


        <!-- modal simpan / tambah anggaran Dinas -->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Anggaran Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_anggaranDinas">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" max="2099" name="tahun_anggaran" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan Anggaran
                          </Label>
                          <select class="form-select" name="triwulan_anggaran" aria-label="Triwulan Anggaran">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Pagu Anggaran
                          </Label>
                          <input type="text" name="pagu_anggaran" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Anggaran
                          </Label>
                          <input type="text" name="realisasi_anggaran" class="form-control" placeholder="Realisasi Anggaran" aria-label="realisasi">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataAnggaranDinas()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_anggaranDinas')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal ubah / tambah anggaran dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahAnggaranDinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Ubah Anggaran
                        Dinas
                      </h3>
                      <label>Isi kolom untuk mengubah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_anggaranDinas">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" max="2099" id="ubahTahunAnggaranDinas" name="tahun_anggaran" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label> Triwulan Anggaran </Label>
                          <select class="form-select" id="ubahTriwulanAnggaranDinas" name="triwulan_anggaran" aria-label="Triwulan Anggaran">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label> Pagu Anggaran </Label>
                          <input type="number" id="ubahPaguAnggaranDinas" name="pagu_anggaran" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label> Realisasi Anggaran </Label>
                          <input type="number" id="ubahRealisasiAnggaranDinas" name="realisasi_anggaran" class="form-control" placeholder="Realisasi Anggaran" aria-label="realisasi">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahAnggaranDinas()" data-bs-dismiss="modal">Ubah</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_anggaranDinas')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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