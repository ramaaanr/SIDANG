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
                      <h4 class="text-center text-5xl font-weight-bolder">Indikator Dinas</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah3">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_indikatorBidang" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="%">No</th>
                          <th width="%">Indikator Dinas</th>
                          <th width="25%">Divisi Indikator</th>
                          <th width="22%">Target Indikator</th>
                          <th width="8%">Triwulan 1</th>
                          <th width="8%">Triwulan 2</th>
                          <th width="8%">Triwulan 3</th>
                          <th width="8%">Triwulan 4</th>
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


        <!-- modal simpan / tambah indikator dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Indikator Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Indikator</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_Indikator">
                        <div class="mb-3">
                          <Label>
                            Indikator Dinas
                          </Label>
                          <input type="text" name="indikator_dinas" class="form-control" placeholder="Indikator Dinas" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Indikator
                          </Label>
                          <select class="form-select" name="divisi_indikator" aria-label="Divisi Dinas">
                            <option value="SEKRETARIAT">SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK" selected>DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA">KBKS
                            </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM</option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Indikator
                          </Label>
                          <input type="text" name="target_indikator" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 1
                          </Label>
                          <input type="text" name="triwulan_1" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 2
                          </Label>
                          <input type="text" name="triwulan_2" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 3
                          </Label>
                          <input type="text" name="triwulan_3" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 4
                          </Label>
                          <input type="text" name="triwulan_4" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataIndikator()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_Indikator')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal ubah indikator dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Indikator Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Indikator</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_Indikator">
                        <div class="mb-3">
                          <Label>
                            Indikator Dinas
                          </Label>
                          <input type="text" name="indikator_dinas" class="form-control" placeholder="Indikator Dinas" aria-label="Nama" id="indikator_dinas">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Indikator
                          </Label>
                          <select class="form-select" name="divisi_indikator" aria-label="Divisi Dinas" id="divisi_indikator">
                            <option value="SEKRETARIAT">SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK" selected>DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA">KBKS
                            </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM</option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Indikator
                          </Label>
                          <input type="text" name="target_indikator" id="target_indikator" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 1
                          </Label>
                          <input type="text" name="triwulan_1" id="triwulan_1" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 2
                          </Label>
                          <input type="text" name="triwulan_2" id="triwulan_2" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 3
                          </Label>
                          <input type="text" name="triwulan_3" id="triwulan_3" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 4
                          </Label>
                          <input type="text" name="triwulan_4" id="triwulan_4" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahIndikator()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_Indikator')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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