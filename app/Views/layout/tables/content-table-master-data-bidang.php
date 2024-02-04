<div class="container-fluid px-md-2 px-lg-4">
  <div class="container-fluid py-1 px-0 px-md-2 px-lg-4">
    <div class="row">
      <div class="col-12">
        <div class="container-fluid py-1 px-0 px-md-2 px-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex flex-column justify-content-end align-items-end">
                    <div class="w-100">
                      <h4 class="text-center text-uppercase font-weight-bolder text-5xl">Data Bidang</h4>
                    </div>
                    <div>
                      <button class="btn btn-success" role="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalTambah">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_dataBidang" style="width: 100%"
                      class="table table-hover table-striped align-items-center mb-">
                      <thead>
                        <tr>
                          <th width="10%">Nama Bidang</th>
                          <th width="20%">Desk Data</th>
                          <th width="20%">Target</th>
                          <th width="20%">Realisasi</th>
                          <th width="20%">Lampiran</th>
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
          <div class="modal fade" id="exampleModalTambah" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <form id="simpan_dataBidang">
                        <div class="mb-3">
                          <Label>
                            Deskripsi data
                          </Label>
                          <input type="text" id='desk_data' name="desk_data" class="form-control"
                            placeholder="Deskripsi Data" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Bidang
                          </Label>
                          <input type="number" min="0" max="100" name="target_bidang" class="form-control"
                            placeholder="Target Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Bidang
                          </Label>
                          <input type="number" min="0" max="100" name="realisasi_bidang" class="form-control"
                            placeholder="Realisasi Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Lampiran Bidang
                          </Label>
                          <input type="file" name="lampiran_bidang" id="lampiran_bidang" required>
                          <label style="font-size: 12px;" class=" font-weight-light text-warning pl-2">
                            Format yang didukung: .JPG .JPEG .PNG .DOC .DOCX .PDF .XLS .XLSX .PPT .PPTX .MP4 .WAV
                            Mohon memberikan nama file lampiran yang tepat dan benar, tidak menggunakan unsur (titik),
                            (koma), symbol (!@#$%^&* ( ) ) dan maksimal 1 file
                          </label>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2"
                          onclick="simpan_dataDataBidang()" data-bs-dismiss="modal">Buat</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#simpan_dataBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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
          <div class="modal fade" id="modalUbahDataBidang" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Ubah Anggaran Bidang
                      </h3>
                      <label>Isi kolom untuk mengubah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_dataBidang">
                        <input id="ubahIdBidang" type="hidden" name="id_bidang">
                        <div class="mb-3">
                          <Label>
                            Deskripsi data
                          </Label>
                          <input id="ubahDeskData" type="text" name="desk_data" class="form-control"
                            placeholder="Deskripsi Data" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Target Bidang
                          </Label>
                          <input id="ubahTargetBidang" type="number" min="0" max="100" name="target_bidang"
                            class="form-control" placeholder="Target Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Bidang
                          </Label>
                          <input id="ubahRealisasiBidang" type="number" min="0" max="100" name="realisasi_bidang"
                            class="form-control" placeholder="Realisasi Bidang" aria-label="Tahun">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Lampiran Bidang
                          </Label>
                          <a class="link-info" id="urlLampiran">Lampiran Sebelumnya</a>
                          <input id="newUbahLampiranBidang" type="file" name="new_lampiran_bidang" id="lampiran_bidang">
                          <input id="oldUbahLampiranBidang" type="hidden" name="old_lampiran_bidang"
                            id="lampiran_bidang" required>
                          <label style="font-size: 12px;" class="font-weight-light text-warning pl-2">
                            Format yang didukung: .JPG .JPEG .PNG .DOC .DOCX .PDF .XLS .XLSX .PPT .PPTX .MP4 .WAV
                            Mohon memberikan nama file lampiran yang tepat dan benar, tidak menggunakan unsur (titik),
                            (koma), symbol (!@#$%^&* ( ) ) dan maksimal 1 file
                          </label>
                          <div class="alert alert-success d-flex mt-2 align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"
                              class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                              aria-label="Warning:">
                              <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
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
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2"
                          onclick="js_ubahDataBidang()" data-bs-dismiss="modal">Update</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#ubah_dataBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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

<div class="container-fluid px-2 px-md-2 px-lg-4">
  <div class="container-fluid px-2 px-md-2 px-lg-4">
    <div class="row">
      <div class="col-12">
        <div class="container-fluid py-1 px-2 px-md-2 px-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="w-100">
                      <h4 class="text-center text-uppercase font-weight-bolder text-5xl">Anggaran Bidang</h4>
                    </div>

                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_anggaranBidang" style="width: 100%"
                      class="table table-hover table-striped align-items-center mb-">
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


        <!-- ubah anggaran bidang -->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahAnggaranBidang" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Ubah Anggaran Bidang

                      </h3>
                      <label>Isi kolom untuk mengubah Anggaran</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_anggaranBidang">
                        <input type="hidden" id="ubah_id_ag">
                        <div class="mb-3">
                          <Label>
                            Tahun Anggaran
                          </Label>
                          <input readonly type="number" min="2020" id="ubah_tahun" max="2099" name="tahun"
                            class="form-control" placeholder="Tahun Anggaran" aria-label="Tahun">
                        </div>

                        <input type="hidden" name="id_bidang" id="ubah_id_bidang" class="form-control"
                          placeholder="Pagu Anggaran" aria-label="pagu">
                        <div class="mb-3">
                          <Label>
                            Pagu Bidang
                          </Label>
                          <input readonly type="number" name="pagu_bidang" id="ubah_pagu_bidang" class="form-control"
                            placeholder="Pagu Anggaran" aria-label="pagu">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 1
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_tw1" id="ubah_realisasi_tw1"
                            class="form-control" placeholder="Realisasi Triwulan 1" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 2
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_tw2" id="ubah_realisasi_tw2"
                            class="form-control" placeholder="Realisasi Triwulan 2" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 3
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_tw3" id="ubah_realisasi_tw3"
                            class="form-control" placeholder="Realisasi Triwulan 3" aria-label="realisasi-triwulan">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Realisasi Triwulan 4
                          </Label>
                          <input value="0" type="number" min="0" name="realisasi_tw4" id="ubah_realisasi_tw4"
                            class="form-control" placeholder="Realisasi Triwulan 4" aria-label="realisasi-triwulan">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2"
                          onclick="js_ubahAnggaranBidang()" data-bs-dismiss="modal">Update</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#ubah_anggaranBidang')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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

<div class="container-fluid px-0 px-md-2 px-lg-4">
  <div class="container-fluid py-1 px-md-2 px-lg-4">
    <div class="row">
      <div class="col-12">


        <div class="container-fluid py-1 px-1 px-md-2 px-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="w-100">
                      <h4 class="text-center text-5xl font-weight-bolder">Indikator Dinas</h4>
                    </div>
                    <div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-4">
                    <table id="master_indikatorBidang" style="width: 100%"
                      class="table table-hover table-striped align-items-center mb-">
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



        <!-- modal ubah indikator dinas-->
        <div class="col-md-4">
          <div class="modal fade" id="modalUbahIndikator" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-2 pt-5 text-center">
                      <h3 class="font-weight-bolder text-success text-gradient">Ubah Indikator Dinas
                      </h3>
                      <label>Isi kolom untuk mengubah Indikator</label>
                    </div>
                    <div class="card-body">
                      <form id="ubah_Indikator">
                        <div class="mb-3">
                          <Label>
                            Indikator Dinas
                          </Label>
                          <input readonly type="text" name="indikator_dinas" class="form-control"
                            placeholder="Indikator Dinas" aria-label="Nama" id="indikator_dinas">
                        </div>

                        <input type="hidden" class="form-select" name="divisi_indikator" aria-label="Divisi Dinas"
                          id="ubah_divisi_indikator">
                        </input>
                        <div class="mb-3">
                          <Label>
                            Target Indikator
                          </Label>
                          <input readonly type="text" name="target_indikator" id="target_indikator" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 1
                          </Label>
                          <input type="number" min="0" name="triwulan_1" id="triwulan_1" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 2
                          </Label>
                          <input type="number" min="0" name="triwulan_2" id="triwulan_2" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 3
                          </Label>
                          <input type="number" min="0" name="triwulan_3" id="triwulan_3" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                        <div class="mb-3">
                          <Label>
                            Triwulan 4
                          </Label>
                          <input type="number" min="0" name="triwulan_4" id="triwulan_4" class="form-control"
                            placeholder="0" aria-label="Nama">
                        </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn bg-gradient-success w-25 my-4 mb-2"
                          onclick="js_ubahIndikator()" data-bs-dismiss="modal">Update</button>
                        <button type="button" class="btn bg-gradient-warning w-25 my-4 mb-2"
                          onclick="$('#ubah_Indikator')[0].reset();" data-bs-dismiss="modal">Cancel</button>
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