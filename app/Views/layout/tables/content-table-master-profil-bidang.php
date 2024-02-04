<div class="container-fluid">
  <div class="container-fluid py-4 px-0 px-md-2 px-lg-4">
    <div class="row">
      <div class="col-12">

        <div class="container-fluid py-4 px-0 px-md-2 px-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="w-100">
                      <h4 class="text-center text-5xl font-weight-bolder">Profil Bidang</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_profileBidang" style=" width: 100%" class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="1%">Nama Bidang</th>
                          <th width="40%">Deksripsi Bidang</th>
                          <th width="30%">Foto</th>
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
      </div>

      <!-- modal ubah Profil Dinas-->
      <div class="col-md-4">
        <div class="modal fade" id="modalUbahProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card card-plain">
                  <div class="card-header pb-2 pt-5 text-center">
                    <h3 class="font-weight-bolder text-success text-gradient">Ubah Profil Dinas
                    </h3>
                    <label>Isi kolom untuk mengubah Profil Dinas</label>
                  </div>
                  <div class="card-body">
                    <form id="ubah_Profile">
                      <input type="hidden" name="id_bidang" id="id_bidang">
                      <div class="mb-3">
                        <Label>
                          Nama Bidang
                        </Label>
                        <input type="text" name="nama_bidang" id="nama_bid" class="form-control" placeholder="Nama Bidang" aria-label="Nama">
                      </div>
                      <div class="mb-3">
                        <Label>
                          Deskripsi Bidang
                        </Label>
                        <input type="text" name="deskripsi_bidang" id="desk" class="form-control" placeholder="Deskripsi Bidang" aria-label="Nama">
                      </div>
                      <div class="mb-3 mx-auto text-center">
                        <img id="gambarProfile" width="150px" class="mx-auto rounded" alt="gambar-profile">
                      </div>
                      <div class="mb-3">
                        <Label>
                          Input Gambar
                        </Label>
                        <input id="newFoto" type="file" name="new_foto" id="new_foto">
                        <input id="oldFoto" type="hidden" name="old_foto" id="old_foto" required>
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
                      <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="js_ubahProfile()" data-bs-dismiss="modal">Update</button>
                      <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2" onclick="$('#ubah_Profile')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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