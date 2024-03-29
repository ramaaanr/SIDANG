<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png" />
  <title>SIDANG - Profile</title>
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
  <?php include('navs/sidenav-profile-uptppa.php') ?>
  <main class="main-content position-relative border-radius-lg">
    <?php include('navs/header-profile.php') ?>
    <div>

      <?php include('profiles/content-profile.php') ?>
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
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <?php include('profiles/profiles-data-bagan.php') ?>

  <script lang="javascript" type="text/javascript">
    //variabel bidang, tahun, triwulan  
    let bidang = "upt ppa";
    let year = new Date().getFullYear();
    let quarterly = new Date().getMonth();
    if (quarterly >= 0 && quarterly <= 2) {
      quarterly = 1;
    } else if (quarterly >= 3 && quarterly <= 5) {
      quarterly = 2;
    } else if (quarterly >= 6 && quarterly <= 8) {
      quarterly = 3;
    } else if (quarterly >= 9 && quarterly <= 11) {
      quarterly = 4;
    }

    //fungsi mendapatkan data profil dan deskripsi bidang
    $(document).ready(function() {
      $.ajax({
        method: "POST",
        url: "<?= base_url(); ?>/BidangUPTPPA/dataBidang",
        data: {
          id: bidang
        },
        dataType: "json"
      }).done(function(res) {
        const getNamaBidang = document.querySelectorAll('#namaBidang');

        getNamaBidang.forEach(element => {
          element.innerText = res.nama_bidang;
        });

        document.getElementById('gambarBidang').src =
          `<?= base_url(); ?>/assets/img/profil-bidang/${res.foto}`;
        document.getElementById("deskBidang").innerText = res.deskripsi_bidang;
      });
    });

    //fungsi mendapatkan data pagu dan realisasi anggaran 
    $(document).ready(function() {
      $.ajax({
        method: "POST",
        url: "<?= base_url(); ?>/BidangUPTPPA/dataAnggaran",
        data: {
          id: bidang,
          tahun: year,
          triwulan: quarterly
        },
        dataType: "json"
      }).done(function(postAngka) {

        let uang = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        });
        let pagu = postAngka.pagu;
        let realisasiPagu = postAngka.realisasi;

        document.getElementById("paguBidangAngka").innerText = uang.format(pagu);
        document.getElementById("realisasiPaguBidangAngka").innerText = uang.format(realisasiPagu);
      });
    });

    //fungsi mendapatkan data pegawai bidang
    $(document).ready(function() {
      dataPegawaiBidang = $('#tabel_dataPegawaiBidang').DataTable({
        "ajax": {
          // json datasource
          type: "POST", // method  , by default get
          url: "<?= base_url(); ?>/BidangUPTPPA/dataPegawaiBidang",
          data: {
            id: bidang
          },
          error: function() { // error handling
            $(".tabel_dataPegawaiBidang-error").html("");
            $("#tabel_dataPegawaiBidang").append('<tbody class="tabel_dataPegawaiBidang-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>');
            $("#tabel_dataPegawaiBidang_processing").css("display", "none");
          }
        },
        "columns": [{
            data: "jabatan"
          },
          {
            data: "nama"
          }
        ],
        "processing": false,
        "columnDefs": [{
          "targets": [],
          "orderable": false
        }],
        "ordering": false,
        "info": false,
        "searching": false,
        "paging": false,
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
          "sProcessing": "",
          "oPaginate": {
            "sFirst": "<<",
            "sLast": ">>",
            "sPrevious": "<",
            "sNext": ">"
          }
        }
      });
    });

    //fungsi mendapatkan data indikator perbidang 
    $(document).ready(function() {
      let no = 1;
      let tw1, tw2, tw3, tw4;
      let target, realisasi, capaianKinerja;
      dataPegawaiBidang = $('#tabel_dataIndikatorBidang').DataTable({
        "ajax": {
          // json datasource
          type: "POST", // method  , by default get
          url: "<?= base_url(); ?>/BidangUPTPPA/dataIndikatorBidang",
          data: {
            id: bidang
          },
          error: function() { // error handling
            $(".tabel_dataIndikatorBidang-error").html("");
            $("#tabel_dataIndikatorBidang").append('<tbody class="tabel_dataIndikatorBidang-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>');
            $("#tabel_dataIndikatorBidang_processing").css("display", "none");
          }
        },
        "columns": [{
            render: function(data, type, row) {
              return '<div class="text-sm h6"> ' + no++ + '. </div>';
            }
          },
          {
            data: "indikator_dinas",
            render: function(data, type, row) {
              return '<div class="text-sm h6"> ' + data + ' </div>';
            }
          },
          {
            data: "target_indikator",
            render: function(data, type, row) {
              target = parseInt(data)
              return '<div class="text-center text-sm font-weight-bold">' + data + '</div> ';
            }
          },
          {
            data: "triwulan_1",
            render: function(data, type, row) {
              tw1 = parseInt(data)
              return '<div class="text-center text-sm font-weight-bold">' + data + '</div> ';
            }
          },
          {
            data: "triwulan_2",
            render: function(data, type, row) {
              tw2 = parseInt(data)
              return '<div class="text-center text-sm font-weight-bold">' + data + '</div> ';
            }
          },
          {
            data: "triwulan_3",
            render: function(data, type, row) {
              tw3 = parseInt(data)
              return '<div class="text-center text-sm font-weight-bold">' + data + '</div> ';
            }
          },
          {
            data: "triwulan_4",
            render: function(data, type, row) {
              tw4 = parseInt(data)
              return '<div class="text-center text-sm font-weight-bold">' + data + '</div> ';
            }
          },
          {
            render: function(data, type, row) {
              realisasi = (tw1 + tw2 + tw3 + tw4)
              capaianKinerja = (realisasi / target) * 100;
              if (capaianKinerja < 100) {
                return '<div class="text-center text-sm font-weight-bold">' + capaianKinerja.toFixed(2) + '% </div> ';
              }
              return '<div class="text-center text-sm font-weight-bold">' + capaianKinerja + '% </div> ';
            }
          },
          {
            render: function(data, type, row) {
              if (realisasi >= target) {
                return '<div class="text-center text-sm font-weight-bold"><span class="badge badge-sm bg-gradient-success">Tercapai</span></div>';
              } else {
                return '<div class="text-center text-sm font-weight-bold"><span class="badge badge-sm bg-gradient-danger">Belum Tercapai</span></div>';
              }
            }
          }
        ],
        "processing": false,
        "columnDefs": [{
          "targets": [],
          "orderable": false
        }],
        "ordering": false,
        "info": false,
        "searching": false,
        "paging": false,
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
          "sProcessing": "",
          "oPaginate": {
            "sFirst": "<<",
            "sLast": ">>",
            "sPrevious": "<",
            "sNext": ">"
          }
        }
      });
    });
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