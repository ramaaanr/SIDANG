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
                      <h4 class="text-5xl font-weight-bolder text-center">Data Pegawai</h4>
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
                          <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" aria-label="Jabatan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Divisi
                          </Label>
                          <select class="form-select" name="divisi" id="divisi" aria-label="Divisi Pegawai">
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
                      <h3 class="font-weight-bolder text-success text-gradient">Ubah Pegawai Dinas
                      </h3>
                      <label>Isi kolom untuk mengubah Pegawai</label>
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
                          <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" aria-label="Nama">
                        </div>

                        <div class="mb-3">
                          <Label>
                            Divisi
                          </Label>
                          <select class="form-select" name="divisi" id="ubah_divisi" aria-label="Divisi Pegawai">
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahProfilePegawai()" data-bs-dismiss="modal">Update</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_ProfilePegawai')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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