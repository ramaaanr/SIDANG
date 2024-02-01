<div class="col-md-4">
  <div class="modal fade" id="exampleModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-2 pt-5 text-center">
              <h3 style="font-size: 20px;" class="font-weight-bolder text-success text-gradient">Survey Kepuasan
                Masyarakat</h3>
            </div>
            <div class="card-body">
              <form id="form-simpan">
                <div class="mb-3">
                  <div class="rating-box">
                    <header>Beri Nilai Kami ?</header>
                    <input type="hidden" id="skor" name="skor" value="0">
                    <div class="stars">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <Label>
                    Nama
                  </Label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                </div>
                <div class="mb-3">
                  <Label>
                    Kritik & Saran
                  </Label>
                  <textarea name="komentar" id="form-control" class="form-control" cols="30" rows="10"></textarea>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2" onclick="simpan()"
                  data-bs-dismiss="modal">Buat</button>
                <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                  onclick="$('#form-simpan')[0].reset();" data-bs-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="container-fluid py-4  px-0 px-md-2 px-lg-4">
    <div class="row mb-4">
      <div class=" mb-xl-0">
        <div class="card">
          <div class="card-body p-5">
            <div class="numbers">
              <hr class="horizontal dark my-3">
              <h4 class="text-center mb-4 mt-3 text-uppercase font-weight-bold">Survey
                Kepuasan Masyarakat
              </h4>
              <hr class="horizontal dark my-3">
              <div>
                <button class="btn btn-success" role="button" data-bs-toggle="modal"
                  data-bs-target="#exampleModalTambah">Tambah</button>
              </div>
              <table id="tabel" style="width: 100%" class="table table-hover align-items-center komen">
                <thead>
                  <tr>
                    <th width="10%">Nama</th>
                    <th width="70%">Komentar</th>
                    <th class="skor" width="20%">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-center">
              <h3 id="ratarata" style="font-size: 20px;" class="font-weight-bolder text-success text-gradient"></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>