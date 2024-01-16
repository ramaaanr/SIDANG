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
                      <h4 class="text-center text-5xl font-weight-bolder">Profil Bidang</h4>
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

    </div>
  </div>
</div>