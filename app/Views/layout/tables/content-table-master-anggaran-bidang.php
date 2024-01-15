<div class="container-fluid">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="card mb-4 p-3">
          <h4 class="text text-center">DATA ANGGARAN BIDANG</h1>
        </div>
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Anggaran Bidang</h4>
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
                          <th width="10%">Tahun</th>
                          <th width="10%">Triwulan</th>
                          <th width="20%">Pagu</th>
                          <th width="20%">Realisasi</th>
                          <th width="20%">Divisi Dinas</th>
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
                      <form id="simpan_anggaranBidang">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" max="2099" name="tahun_anggaran_bidang" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan Anggaran
                          </Label>
                          <select class="form-select" name="triwulan_anggaran_bidang" aria-label="Triwulan Anggaran">
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
                          <input type="text" name="pagu_anggaran_bidang" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Anggaran
                          </Label>
                          <input type="text" name="realisasi_anggaran_bidang" class="form-control" placeholder="Realisasi Anggaran" aria-label="realisasi">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Bidang </Label>
                          <select class="form-select" name="divisi_dinas" aria-label="divisi_dinas">
                            <option value="SEKRETARIAT" selected>SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK">DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA"> KB &
                              KS </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM </option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
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
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input type="number" min="2020" max="2099" name="tahun_anggaran_bidang" class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun" id="ubahTahunAnggaranBidang">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan Anggaran
                          </Label>
                          <select class="form-select" name="triwulan_anggaran_bidang" aria-label="Triwulan Anggaran" id="ubahTriwulanAnggaranBidang">
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
                          <input type="text" name="pagu_anggaran_bidang" class="form-control" placeholder="Pagu Anggaran" aria-label="pagu" id="ubahPaguAnggaranBidang">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Anggaran
                          </Label>
                          <input type="text" name="realisasi_anggaran_bidang" class="form-control" placeholder="Realisasi Anggaran" aria-label="realisasi" id="ubahRealisasiAnggaranBidang">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi Bidang </Label>
                          <select class="form-select" name="divisi_dinas" aria-label="divisi_dinas" id="divisi_dinas">
                            <option value="SEKRETARIAT" selected>SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK">DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA"> KB &
                              KS </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM </option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
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
        < </div>
      </div>
    </div>
  </div>