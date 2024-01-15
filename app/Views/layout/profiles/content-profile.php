<div class="container-fluid">
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class=" mb-xl-0">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="numbers">
                            <div class="text-center mb-4 text-uppercase text-uppercase font-weight-bold h3">Bidang
                                <h3 id="namaBidang" class="text-center mb-4 text-uppercase font-weight-bold" style="display: inline;"></h3>
                            </div>
                            <hr class="horizontal dark my-3">
                            <h4 class="text-center mb-4 mt-3 text-uppercase font-weight-bold">profile bidang</h4>
                            <hr class="horizontal dark my-3">
                            <div class="text text-justify">
                                <p id="deskBidang" style="text-indent: 50px;">Deskripsi</p>
                                <h4 class="text-center mb-4 mt-4 text-uppercase font-weight-bold">pejabat bidang</h4>
                                <hr class="horizontal dark my-3">
                                <table id="tabel_dataPegawaiBidang" style="width: 100%" class="table table-hover align-items-center">
                                    <thead>
                                        <tr>
                                            <th width="30%">Jabatan</th>
                                            <th width="70%">Nama</th>
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

        <?php include('profiles-pagu.php') ?>

        <?php include('profiles-tambahan.php') ?>

    </div>
</div>