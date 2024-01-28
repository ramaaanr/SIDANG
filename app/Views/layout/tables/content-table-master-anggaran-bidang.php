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
                      <h4 class="text-center text-uppercase font-weight-bolder text-5xl">Anggaran Bidang</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_anggaranBidang" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th>Bidang</th>
                          <th>Tahun</th>
                          <th>Pagu</th>
                          <th>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 1</p>
                          </th>
                          <th>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 2</p>
                          </th>
                          <th>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 3</p>
                          </th>
                          <th>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Realisasi</p>
                            <p class="text-xs p-0 m-0 font-weight-bolder">Triwulan 4</p>
                          </th>
                          <th>Aksi</th>

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
                      <form id="simpan_anggaranBidang">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" id="tahun" max="2099" name="tahun" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Bidang </Label>
                          <select class="form-select" name="id_bidang" aria-label="divisi_dinas" id="id_bidang">

                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Pagu Bidang
                          </Label>
                          <input type="number" name="pagu_bidang" id="pagu_bidang" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 1
                          </Label>
                          <input value="0" type="number" name="realisasi_tw1" id="realisasi_tw1" class="form-control" placeholder="Realisasi Triwulan 1" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 2
                          </Label>
                          <input value="0" type="number" name="realisasi_tw2" id="realisasi_tw2" class="form-control" placeholder="Realisasi Triwulan 2" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 3
                          </Label>
                          <input value="0" type="number" name="realisasi_tw3" id="realisasi_tw3" class="form-control" placeholder="Realisasi Triwulan 3" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 4
                          </Label>
                          <input value="0" type="number" name="realisasi_tw4" id="realisasi_tw4" class="form-control" placeholder="Realisasi Triwulan 4" aria-label="realisasi-triwulan">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataAnggaranBidang()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_anggaranBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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
          <div class="modal fade" id="modalUbahAnggaranBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <form id="ubah_anggaranBidang">
                        <input type="hidden" id="ubah_id_ag">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" id="ubah_tahun" max="2099" name="tahun" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Bidang </Label>
                          <select class="form-select" name="id_bidang" aria-label="divisi_dinas" id="ubah_id_bidang">

                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Pagu Bidang
                          </Label>
                          <input type="number" name="pagu_bidang" id="ubah_pagu_bidang" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 1
                          </Label>
                          <input value="0" type="number" name="realisasi_tw1" id="ubah_realisasi_tw1" class="form-control" placeholder="Realisasi Triwulan 1" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 2
                          </Label>
                          <input value="0" type="number" name="realisasi_tw2" id="ubah_realisasi_tw2" class="form-control" placeholder="Realisasi Triwulan 2" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 3
                          </Label>
                          <input value="0" type="number" name="realisasi_tw3" id="ubah_realisasi_tw3" class="form-control" placeholder="Realisasi Triwulan 3" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 4
                          </Label>
                          <input value="0" type="number" name="realisasi_tw4" id="ubah_realisasi_tw4" class="form-control" placeholder="Realisasi Triwulan 4" aria-label="realisasi-triwulan">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahAnggaranBidang()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_anggaranBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <aside style="background-color: #ffffff;" class="sidenav bg-white z-index-3 navbar navbar-vertical d-flex
    </div>
  </div>
</div>