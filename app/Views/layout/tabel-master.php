<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png" />
    <title>SIDANG - Tabel Bidang</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include('navs/sidenav-tabel-master.php') ?>
    <main class="main-content position-relative border-radius-lg">
        <?php include('navs/header-tabel.php') ?>
        <div>
            <?php include('tables/content-table-master.php') ?>
            <?php include('navs/footer.php') ?>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js"></script>

    <!-- Source Table -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <script lang="javascript" type="text/javascript">
        let tabelAnggaranDinas;
        let tabelAnggaranBidang;
        let tabelIndikator;
        let tabelKinerja;
        let tabelProfilePegawai;
        let tabelProfile;
        let id_ubahAnggaranDinas;
        let id_ubahAnggaranBidang;
        let id_ubahIndikator;
        let id_ubahKinerja;
        let id_ubahProfilePegawai;
        let id_ubahProfile;

        //////////////////////////////////////// Start Of Anggaran Bidang ////////////////////////////////////////

        // data anggaran bidang
        $(document).ready(function() {
            tabelAnggaranBidang = $('#master_anggaranBidang').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataAnggaranBidang",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".tabel-error").html("");
                        $("#tabel").append(
                            '<tbody class="tabel-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#tabel_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0
                    },
                    {
                        data: 1
                    },
                    {
                        data: 2
                    },
                    {
                        data: 3
                    },
                    {
                        data: 4
                    },
                    {
                        data: 3,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' +
                                data +
                                '" onclick="js_getIdUbahAnggaranBidang($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahAnggaranBidang">Edit</a><a href="#" class="btn btn-outline-danger btn-sm" data-id="' +
                                data + '" onclick="js_hapusAnggaranBidang($(this))">Hapus</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });

        // simpan anggaran bidang
        function simpan_dataAnggaranBidang() {
            var data_post = $('#simpan_anggaranBidang').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_anggaranBidang",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelAnggaranBidang.ajax.reload(null, false);
            })
            $('#simpan_anggaranBidang')[0].reset();
        }
        //ambil id
        function js_getIdUbahAnggaranBidang(id) {
            id_ubahAnggaranBidang = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahAnggaranBidang",
                data: {
                    id: id_ubahAnggaranBidang
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("ubahTahunAnggaranBidang").value = res.tahun_anggaran_bidang;
                document.getElementById("ubahTriwulanAnggaranBidang").value = res.triwulan_anggaran_bidang;
                document.getElementById("ubahPaguAnggaranBidang").value = res.pagu_anggaran_bidang;
                document.getElementById("ubahRealisasiAnggaranBidang").value = res.realisasi_anggaran_bidang;
                document.getElementById("divisi_dinas").value = res.divisi_dinas;
            });
        }

        // hapus anggaran bidang
        function js_hapusAnggaranBidang(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_anggaranBidang",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelAnggaranBidang.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                        'error'
                    )
                }
            })
        };
        // ubah data anggaran bidang
        function js_ubahAnggaranBidang() {
            var data_post = $('#ubah_anggaranBidang').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_anggaranBidang",
                data: 'id=' + id_ubahAnggaranBidang + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelAnggaranBidang.ajax.reload(null, false);
            })
            $('#ubah_anggaranBidang')[0].reset();
        };

        //////////////////////////////////////// Start Of Anggaran Dinas ////////////////////////////////////////

        // data anggaran dinas
        $(document).ready(function() {
            tabelAnggaranDinas = $('#master_anggaranDinas').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataAnggaranDinas",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".tabel-error").html("");
                        $("#tabel").append(
                            '<tbody class="tabel-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#tabel_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0,

                    },
                    {
                        data: 1,

                    },
                    {
                        data: 2,

                    },
                    {
                        data: 3,

                    },
                    {
                        data: 3,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' +
                                data +
                                '" onclick="js_getIdUbahAnggaranDinas($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahAnggaranDinas">Edit</a><a href="#" class="btn btn-outline-danger btn-sm" data-id="' +
                                data + '" onclick="js_hapusAnggaranDinas($(this))">Hapus</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });

        function js_hapusAnggaranDinas(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_anggaranDinas",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelAnggaranDinas.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                    )
                }
            })
        };

        // function to get id & initially fill form in ubahModalAnggaranDinas
        function js_getIdUbahAnggaranDinas(id) {
            id_ubahAnggaranDinas = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahAnggaran",
                data: {
                    id: id_ubahAnggaranDinas
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("ubahTahunAnggaranDinas").value = res.tahun_anggaran;
                document.getElementById("ubahTriwulanAnggaranDinas").value = res.triwulan_anggaran;
                document.getElementById("ubahPaguAnggaranDinas").value = res.pagu_anggaran;
                document.getElementById("ubahRealisasiAnggaranDinas").value = res.realisasi_anggaran;
            });
        }

        // function to edit row data from database
        function js_ubahAnggaranDinas() {
            var data_post = $('#ubah_anggaranDinas').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_anggaranDinas",
                data: 'id=' + id_ubahAnggaranDinas + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelAnggaranDinas.ajax.reload(null, false);
            })
            $('#ubah_anggaranDinas')[0].reset();
        };

        // simpan anggaran dinas
        function simpan_dataAnggaranDinas() {
            var data_post = $('#simpan_anggaranDinas').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_anggaranDinas",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelAnggaranDinas.ajax.reload(null, false);
            })
            $('#simpan_anggaranDinas')[0].reset();
        }

        //////////////////////////////////////// Start Of Indikator Bidang ////////////////////////////////////////

        // data indikator bidang
        $(document).ready(function() {
            tabelIndikator = $('#master_indikatorBidang').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataIndikatorBidang",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".tabel-error").html("");
                        $("#tabel").append(
                            '<tbody class="tabel-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#tabel_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0
                    },
                    {
                        data: 1
                    },
                    {
                        data: 2
                    },
                    {
                        data: 3
                    },
                    {
                        data: 4
                    },
                    {
                        data: 5
                    },
                    {
                        data: 6
                    },
                    {
                        data: 7
                    },
                    {
                        data: 1,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' +
                                data +
                                '" onclick="js_getIdUbahIndikator($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahIndikator">Edit</a><a href="#" class="btn btn-outline-danger btn-sm" data-id="' +
                                data + '" onclick="js_hapusIndikator($(this))">Hapus</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });
        // simpan indikator bidang
        function simpan_dataIndikator() {
            var data_post = $('#simpan_Indikator').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_Indikator",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelIndikator.ajax.reload(null, false);
            })
            $('#simpan_Indikator')[0].reset();
        }
        // hapus indikator bidang
        function js_hapusIndikator(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_Indikator",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelIndikator.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                    )
                }
            })
        };

        // get id
        function js_getIdUbahIndikator(id) {
            id_ubahIndikator = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahIndikator",
                data: {
                    id: id_ubahIndikator
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("indikator_dinas").value = res.indikator_dinas;
                document.getElementById("divisi_indikator").value = res.divisi_indikator;
                document.getElementById("target_indikator").value = res.target_indikator;
                document.getElementById("triwulan_1").value = res.triwulan_1;
                document.getElementById("triwulan_2").value = res.triwulan_2;
                document.getElementById("triwulan_3").value = res.triwulan_3;
                document.getElementById("triwulan_4").value = res.triwulan_4;
            });
        }
        // ubah indikator bidang
        function js_ubahIndikator() {
            var data_post = $('#ubah_Indikator').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_Indikator",
                data: 'id=' + id_ubahIndikator + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelIndikator.ajax.reload(null, false);
            })
            $('#ubah_Indikator')[0].reset();
        };

        //////////////////////////////////////// Start Of Kinerja Dinas ////////////////////////////////////////

        // data kinerja dinas
        $(document).ready(function() {
            tabelKinerja = $('#master_kinerjaDinas').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataKinerjaDinas",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".tabel-error").html("");
                        $("#tabel").append(
                            '<tbody class="tabel-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#tabel_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0
                    },
                    {
                        data: 1
                    },
                    {
                        data: 2
                    },
                    {
                        data: 3
                    },
                    {
                        data: 0,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' +
                                data +
                                '" onclick="js_getIdUbahKinerja($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahKinerja">Edit</a><a href="#" class="btn btn-outline-danger btn-sm" data-id="' +
                                data + '" onclick="js_hapusKinerja($(this))">Hapus</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });

        // simpan
        function simpan_dataKinerja() {
            var data_post = $('#simpan_Kinerja').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_Kinerja",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelKinerja.ajax.reload(null, false);
            })
            $('#simpan_Kinerja')[0].reset();
        }

        // hapus
        function js_hapusKinerja(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_Kinerja",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelKinerja.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                    )
                }
            })
        };

        // get id
        function js_getIdUbahKinerja(id) {
            id_ubahKinerja = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahKinerja",
                data: {
                    id: id_ubahKinerja
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("nama_pencapaian").value = res.nama_pencapaian;
                document.getElementById("deskripsi_pencapaian").value = res.deskripsi_pencapaian;
                document.getElementById("nilai_pencapaian").value = res.nilai_pencapaian;
                document.getElementById("tahun_pencapaian").value = res.tahun_pencapaian;
            });
        }

        // ubah
        function js_ubahKinerja() {
            var data_post = $('#ubah_Kinerja').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_Kinerja",
                data: 'id=' + id_ubahKinerja + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelKinerja.ajax.reload(null, false);
            })
            $('#ubah_Kinerja')[0].reset();
        };


        //////////////////////////////////////// Start Of Data Pegawai ////////////////////////////////////////


        // data pegawai
        $(document).ready(function() {
            tabelProfilePegawai = $('#master_pegawaiDinas').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataPegawaiDinas",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".master_pegawaiDinas-error").html("");
                        $("#master_pegawaiDinas").append(
                            '<tbody class="master_pegawaiDinas-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#master_pegawaiDinas_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0
                    },
                    {
                        data: 1
                    },
                    {
                        data: 2
                    },
                    {
                        data: 3
                    },
                    {
                        data: 1,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' +
                                data +
                                '" onclick="js_getIdUbahProfilePegawai($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahProfilePegawai">Edit</a><a href="#" class="btn btn-outline-danger btn-sm" data-id="' +
                                data + '" onclick="js_hapusProfilePegawai($(this))">Hapus</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });

        // simpan
        function simpan_dataProfilePegawai() {
            var data_post = $('#simpan_ProfilePegawai').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_ProfilePegawai",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelProfilePegawai.ajax.reload(null, false);
            })
            $('#simpan_ProfilePegawai')[0].reset();
        }

        // hapus
        function js_hapusProfilePegawai(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_ProfilePegawai",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelProfilePegawai.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                    )
                }
            })
        };

        // get id
        function js_getIdUbahProfilePegawai(id) {
            id_ubahProfilePegawai = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahProfilePegawai",
                data: {
                    id: id_ubahProfilePegawai
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("nama").value = res.nama;
                document.getElementById("nip").value = res.nip;
                document.getElementById("jabatan").value = res.jabatan;
                document.getElementById("divisi").value = res.divisi;
            });
        }

        // ubah
        function js_ubahProfilePegawai() {
            var data_post = $('#ubah_ProfilePegawai').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_ProfilePegawai",
                data: 'id=' + id_ubahProfilePegawai + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelProfilePegawai.ajax.reload(null, false);
            })
            $('#ubah_ProfilePegawai')[0].reset();
        };
        //////////////////////////////////////// Start Of Profile Bidang ////////////////////////////////////////


        // data profile bidang
        $(document).ready(function() {
            tabelprofile = $('#master_profileBidang').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/TabelMaster/dataProfileBidang",
                    type: "POST", // method  , by default get
                    error: function() { // error handling
                        $(".master_profileBidang-error").html("");
                        $("#master_profileBidang").append(
                            '<tbody class="master_profileBidang-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                        );
                        $("#master_profileBidang_processing").css("display", "none");
                    }
                },
                "columns": [{
                        data: 0
                    },
                    {
                        data: 1,
                        render: function(data, type, row) {
                            return '<div class="text text-justify" style="white-space:normal">' + data + '</div>'
                        }
                    },
                    {
                        data: 0,
                        render: function(data, type, row) {
                            return '<a href="#" id="tombolUbah" class="btn btn-outline-info btn-sm" data-id="' + data + '" onclick="js_getIdUbahProfile($(this))" role="button" data-bs-toggle="modal" data-bs-target="#modalUbahProfile">Edit</a>';
                        }
                    },

                ],
                "processing": false,
                "columnDefs": [{
                    "targets": [],
                    "orderable": false
                }],
                "ordering": true,
                "info": true,
                "serverSide": true,
                "stateSave": true,
                "scrollX": true,
                "lengthChange": false,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sSearch": "Cari: ",
                    "sZeroRecords": "Tidak ada data yang ditemukan",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                    "sInfoFiltered": "(di filter dari _MAX_ total data)",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sPrevious": "<",
                        "sNext": ">"
                    }
                }
            });
        });

        // simpan
        function simpan_dataProfile() {
            var data_post = $('#simpan_Profile').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/simpan_Profile",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,

                    );
                }
                tabelProfile.ajax.reload(null, false);
            })
            $('#simpan_Profile')[0].reset();
        }

        // hapus
        function js_hapusProfile(id) {
            var id_delete = id.data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Yakin menghapus ?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url(); ?>/TabelMaster/hapus_Profile",
                        data: {
                            id: id_delete
                        },
                        dataType: "json"
                    }).done(function(res) {
                        Swal.fire(
                            'Perhatian',
                            res.res,
                            'info'
                        );
                        tabelProfile.ajax.reload(null, false);
                    })
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Batal dihapus',
                    )
                }
            })
        };

        // get id
        function js_getIdUbahProfile(id) {
            id_ubahProfile = id.data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/setDataInFormUbahProfile",
                data: {
                    id: id_ubahProfile
                },
                dataType: "json"
            }).done(function(res) {
                document.getElementById("nama_bidang").value = res.nama_bidang;
                document.getElementById("deskripsi_bidang").value = res.deskripsi_bidang;
            });
        }

        // ubah
        function js_ubahProfile() {
            var data_post = $('#ubah_Profile').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/TabelMaster/ubah_Profile",
                data: 'id=' + id_ubahProfile + '&' + data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Perhatian',
                        res.res,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                        'error'
                    );
                }
                tabelProfile.ajax.reload(null, false);
            })
            $('#ubah_Profile')[0].reset();
        };
    </script>

    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>



</body>

</html>