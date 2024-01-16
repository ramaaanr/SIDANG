<div class="container-fluid">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="card mb-4 p-3">
          <h4 class="text text-center">DATA BIDANG</h1>
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


        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Indikator Dinas</h4>
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

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Kinerja Dinas</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah4">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_kinerjaDinas" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
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


        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Data Pegawai</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#exampleModalTambah5">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_pegawaiDinas" style="width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="%">Nama</th>
                          <th width="20%">NIP</th>
                          <th width="30%">Jabatan</th>
                          <th width="30%">Divisi</th>
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

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4>Profil Bidang</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_profileBidang" style=" width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="%">Nama Bidang</th>
                          <th width="70%">Deksripsi Bidang</th>
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

        <!-- modal simpan / tambah kinerja dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <input type="text" name="nama_pencapaian" class="form-control" placeholder="Nama Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deksripsi Pencapaian
                          </Label>
                          <input type="text" name="deskripsi_pencapaian" class="form-control" placeholder="Deskripsi Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Nilai Pencapaian
                          </Label>
                          <input type="text" name="nilai_pencapaian" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Tahun Pencapaian
                          </Label>
                          <input type="text" name="tahun_pencapaian" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataKinerja()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_Kinerja')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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
          <div class="modal fade" id="modalUbahKinerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <input type="text" name="nama_pencapaian" id="nama_pencapaian" class="form-control" placeholder="Nama Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deksripsi Pencapaian
                          </Label>
                          <input type="text" name="deskripsi_pencapaian" id="deskripsi_pencapaian" class="form-control" placeholder="Deskripsi Pencapaian" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Nilai Pencapaian
                          </Label>
                          <input type="text" name="nilai_pencapaian" id="nilai_pencapaian" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Tahun Pencapaian
                          </Label>
                          <input type="text" name="tahun_pencapaian" id="tahun_pencapaian" class="form-control" placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahKinerja()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_Kinerja')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal simpan / tambah data pegawai dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Pegawai Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Pegawai</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_ProfilePegawai">
                        <div class="mb-3">
                          <Label>
                            Nama
                          </Label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            NIP
                          </Label>
                          <input type="text" name="nip" class="form-control" placeholder="NIP" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Jabatan
                          </Label>
                          <select class="form-select" name="jabatan" aria-label="Jabatan">
                            <option value="KEPALA DINAS">Kepala Dinas</option>
                            <option value="KEPALA BIDANG" selected>Kepala Bidang</option>
                            <option value="KEPALA SUB BAGIAN">Kepala Sub Bagian</option>
                            <option value="KEPALA SEKSI">Kepala Seksi</option>
                            <option value="STAFF">Staff</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi
                          </Label>
                          <select class="form-select" name="divisi" aria-label="Divisi Pegawai">
                            <option value="SEKRETARIAT">SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK" selected>DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA">KBKS
                            </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM</option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataProfilePegawai()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_ProfilePegawai')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal ubah data pegawai dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahProfilePegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Pegawai Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Pegawai</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_ProfilePegawai">
                        <div class="mb-3">
                          <Label>
                            Nama
                          </Label>
                          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            NIP
                          </Label>
                          <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Jabatan
                          </Label>
                          <select class="form-select" name="jabatan" id="jabatan" aria-label="Jabatan">
                            <option value="KEPALA DINAS">Kepala Dinas</option>
                            <option value="KEPALA BIDANG" selected>Kepala Bidang</option>
                            <option value="KEPALA SUB BAGIAN">Kepala Sub Bagian</option>
                            <option value="KEPALA SEKSI">Kepala Seksi</option>
                            <option value="STAFF">Staff</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi
                          </Label>
                          <select class="form-select" name="divisi" id="divisi" aria-label="Divisi Pegawai">
                            <option value="SEKRETARIAT">SEKRETARIAT</option>
                            <option value="PENGENDALIAN PENDUDUK" selected>DALDUK</option>
                            <option value="KELUARGA BERENCANA DAN KELUARGA SEJAHTERA">KBKS
                            </option>
                            <option value="PEMBERDAYAAN MASYARAKAT">PM</option>
                            <option value="PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">
                              PPPA</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahProfilePegawai()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_ProfilePegawai')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal simpan Profil Dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Profil Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Profil Dinas</label>
                    </div>
                    <div class="card-body">
                      <form id="simpan_Profile">
                        <div class="mb-3">
                          <Label>
                            Nama Bidang
                          </Label>
                          <input type="text" name="nama_bidang" class="form-control" placeholder="Nama Bidang" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deskripsi Bidang
                          </Label>
                          <input type="text" name="deskripsi_bidang" class="form-control" placeholder="Deskripsi Bidang" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan_dataProfile()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#simpan_Profile')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal ubah Profil Dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Profil Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah Profil Dinas</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_Profile">
                        <div class="mb-3">
                          <Label>
                            Nama Bidang
                          </Label>
                          <input type="text" name="nama_bidang" id="nama_bidang" class="form-control" placeholder="Nama Bidang" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Deskripsi Bidang
                          </Label>
                          <input type="text" name="deskripsi_bidang" id="deskripsi_bidang" class="form-control" placeholder="Deskripsi Bidang" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahProfile()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_Profile')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- modal simpan / tambah User dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="exampleModalTambah7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">User Dinas
                        Baru
                      </h3>
                      <label>Isi kolom untuk menambah User Dinas</label>
                    </div>
                    <div class="card-body">
                      <form id="form-simpan">
                        <div class="mb-3">
                          <Label>
                            Username
                          </Label>
                          <input type="text" name="usernameBaru" class="form-control" placeholder="Username" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Password
                          </Label>
                          <input type="text" name="passwordBaru" class="form-control" placeholder="Password" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#form-simpan')[0].reset();" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
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