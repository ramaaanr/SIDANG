<div class="container-fluid">
  <div class="container-fluid py-4 py-4  px-0 px-md-2 px-lg-4">
    <div class="row">
      <div class="col-12">

        <div class="container-fluid py-4 py-4  px-0 px-md-2 px-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="w-100">
                      <h4 class="text-center text-uppercase font-weight-bolder text-5xl">Anggaran Dinas</h4>
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
                          <th width="15%">Pagu Anggaran</th>
                          <th width="15%">
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 1</p>
                          </th>
                          <th width="15%">
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 2</p>
                          </th>
                          <th width="15%">
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 3</p>
                          </th>
                          <th width="15%">
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 4</p>
                          </th>
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
                          <input type="number" min="2020" id="tahun_ag_dinas" max="2099" name="tahun_ag_dinas" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Pagu Dinas
                          </Label>
                          <input type="number" min="0" name="pagu_dinas" id="pagu_dinas" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 1
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw1" id="realisasi_dinas_tw1" class="form-control" placeholder="Realisasi Triwulan 1" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 2
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw2" id="realisasi_dinas_tw2" class="form-control" placeholder="Realisasi Triwulan 2" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 3
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw3" id="realisasi_dinas_tw3" class="form-control" placeholder="Realisasi Triwulan 3" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 4
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw4" id="realisasi_dinas_tw4" class="form-control" placeholder="Realisasi Triwulan 4" aria-label="realisasi_dinas-triwulan">
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
                          <input type="number" min="2020" id="ubah_tahun_ag_dinas" max="2099" name="tahun_ag_dinas" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Pagu Dinas
                          </Label>
                          <input type="number" min="0" name="pagu_dinas" id="ubah_pagu_dinas" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 1
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw1" id="ubah_realisasi_dinas_tw1" class="form-control" placeholder="Realisasi Triwulan 1" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 2
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw2" id="ubah_realisasi_dinas_tw2" class="form-control" placeholder="Realisasi Triwulan 2" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 3
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw3" id="ubah_realisasi_dinas_tw3" class="form-control" placeholder="Realisasi Triwulan 3" aria-label="realisasi_dinas-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 4
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_dinas_tw4" id="ubah_realisasi_dinas_tw4" class="form-control" placeholder="Realisasi Triwulan 4" aria-label="realisasi_dinas-triwulan">
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