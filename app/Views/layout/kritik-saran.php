<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/tittle.png" />
    <title>SIDANG - Kritik & Saran</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- star-rating -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/star.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="<?= base_url() ?>/assets/js/star.js" defer></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include('navs/sidenav-kritik-saran.php') ?>
    <main class="main-content position-relative border-radius-lg">
        <?php include('navs/header-kritik.php') ?>
        <div>

            <?php include('profiles/kritik-saran.php') ?>
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
        // mengambil data tabel
        $(document).ready(function() {
            dataTable = $('#tabel').DataTable({
                "ajax": {
                    // json datasource
                    url: "<?= base_url(); ?>/Saran/listdata",
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
                        data: 1
                    },
                    {
                        data: 2
                    },
                    {
                        data: 3
                    },

                ],
                "processing": true,
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


        function simpan() {
            var data_post = $('#form-simpan').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>/Saran/simpan",
                data: data_post,
                dataType: "json"
            }).done(function(res) {
                if (res.status) {
                    Swal.fire(
                        'Sukses',
                        res.res,
                    );
                } else {
                    Swal.fire(
                        'Gagal!',
                        res.res,
                    );
                }
                dataTable.ajax.reload(null, false);
            })
            $('#form-simpan')[0].reset();
        }

        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= site_url('Saran/hasilSkor') ?>",
                dataType: "json",
            }).done(function(res) {
                document.getElementById("ratarata").innerText = 'Rata-Rata Indeks Kepuasan : '  + res.rata + '/5';
            })
        })
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