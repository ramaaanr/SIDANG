<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/tittle.png" />
  <title>SIDANG</title>
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
  <?php include('navs/sidenav-dash.php') ?>
  <main class="main-content position-relative border-radius-lg">
    <?php include('navs/header-dash.php') ?>
    <div>
      <?php include('dashs/content-dash.php') ?>
      <?php include('navs/footer.php') ?>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url(); ?>/assets/js/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8">
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <?php include('dashs/dash-data-bagan.php') ?>

  <script lang="javascript" type="text/javascript">
    //variable 
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

    function hurufNilai(nilai) {
      nilai = parseInt(nilai);
      if (nilai >= 0 && nilai <= 30) {
        return "D";
      } else if (nilai >= 30 && nilai < 50) {
        return "C";
      } else if (nilai >= 50 && nilai < 60) {
        return "CC";
      } else if (nilai >= 60 && nilai < 70) {
        return "B";
      } else if (nilai >= 70 && nilai < 80) {
        return "BB";
      } else if (nilai >= 80 && nilai < 90) {
        return "A";
      } else if (nilai >= 90 && nilai <= 100) {
        return "AA";
      }
    }

    function ketNilai(nilai) {
      if (nilai == "D") {
        return "Sangat Kurang";
      } else if (nilai == "C") {
        return "Kurang";
      } else if (nilai == "CC") {
        return "Cukup (Memadai)";
      } else if (nilai == "B") {
        return "Baik";
      } else if (nilai == "BB") {
        return "Sangat Baik";
      } else if (nilai == "A") {
        return "Memuaskan";
      } else if (nilai == "AA") {
        return "Sangat Memuaskan";
      }
    }

    //create data kinerja dinas
    $(document).ready(function() {

      $.ajax({
        method: "GET",
        url: "<?= base_url(); ?>/TabelMaster/getUserDivisi",
        success: function(data) {
          divisi = JSON.parse(data);
          console.info(divisi);
          if (divisi != 5) {
            $('#nav-tabel-master').remove();
          }
        },
      });

      $.ajax({
        method: "POST",
        url: "<?= base_url(); ?>/DashboardSidang/dataKinerja",
        dataType: "json"
      }).done(function(dataKinerja) {
        document.getElementById("hurufKinerja1").innerText = hurufNilai(dataKinerja.nilaiSakip);
        document.getElementById("ketKinerja1").innerText = ketNilai(hurufNilai(dataKinerja
          .nilaiSakip));
        document.getElementById("nilaiTahunKinerja1").innerText = dataKinerja.sakip + ' TAHUN ' +
          dataKinerja.tahunSakip;
        document.getElementById("deskKinerja1").innerText = dataKinerja.deskSakip;

        document.getElementById("hurufKinerja2").innerText = dataKinerja.nilaiRealisasi + '%';
        document.getElementById("ketKinerja2").innerText = ketNilai(hurufNilai(dataKinerja
          .nilaiRealisasi));
        document.getElementById("nilaiTahunKinerja2").innerText = dataKinerja.realisasi +
          ' TAHUN ' + dataKinerja.tahunRealisasi;
        document.getElementById("deskKinerja2").innerText = dataKinerja.deskRealisasi;

        document.getElementById("hurufKinerja3").innerText = dataKinerja.nilaiKuisioner / 10 +
          '/10';
        document.getElementById("ketKinerja3").innerText = ketNilai(hurufNilai(dataKinerja
          .nilaiKuisioner));
        document.getElementById("nilaiTahunKinerja3").innerText = dataKinerja.kuisioner +
          ' TAHUN ' + dataKinerja.tahunKuisioner;
        document.getElementById("deskKinerja3").innerText = dataKinerja.deskKuisioner;

      });
    });

    //create data pagu anggaran dan realisasi dinas
    $(document).ready(function() {
      $.ajax({
        method: "POST",
        url: "<?= base_url(); ?>/DashboardSidang/dataAnggaran",
        data: {
          tahun: year,
          triwulan: quarterly
        },
        dataType: "json"
      }).done(function(postAngka) {

        let uang = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        });
        let pagu = postAngka.paguDinas;
        let realisasiPagu = postAngka.realisasiDinas;

        document.getElementById("paguDinas").innerText = uang.format(pagu);
        document.getElementById("realisasiPaguDinas").innerText = uang.format(realisasiPagu);
      });
    });

    //create data pagu anggaran dan realisasi bidang
    $(document).ready(function() {
      $.ajax({
        method: "POST",
        url: "<?= base_url(); ?>/DashboardSidang/dataAnggaranBidang",
        data: {
          tahun: year,
          triwulan: quarterly
        },
        dataType: "json"
      }).done(function(postAngkaBidang) {

        let uang = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        });
        let paguBid1 = postAngkaBidang.paguSekre;
        let paguBid2 = postAngkaBidang.paguDalduk;
        let paguBid3 = postAngkaBidang.paguKBKS;
        let paguBid4 = postAngkaBidang.paguPM;
        let paguBid5 = postAngkaBidang.paguPPPA;
        let paguBid6 = postAngkaBidang.paguPPHA;
        let paguBid7 = postAngkaBidang.paguUPTD;

        let realiBid1 = postAngkaBidang.realiSekre;
        let realiBid2 = postAngkaBidang.realiDalduk;
        let realiBid3 = postAngkaBidang.realiKBKS;
        let realiBid4 = postAngkaBidang.realiPM;
        let realiBid5 = postAngkaBidang.realiPPPA;
        let realiBid6 = postAngkaBidang.realiPPHA;
        let realiBid7 = postAngkaBidang.realiUPTD;

        let perseBid1 = (realiBid1 / paguBid1) * 100;
        let perseBid2 = (realiBid2 / paguBid2) * 100;
        let perseBid3 = (realiBid3 / paguBid3) * 100;
        let perseBid4 = (realiBid4 / paguBid4) * 100;
        let perseBid5 = (realiBid5 / paguBid5) * 100;
        let perseBid6 = (realiBid6 / paguBid6) * 100;
        let perseBid7 = (realiBid7 / paguBid7) * 100;

        document.getElementById("paguBidang1").innerText = uang.format(paguBid1);
        document.getElementById("paguBidang2").innerText = uang.format(paguBid2);
        document.getElementById("paguBidang3").innerText = uang.format(paguBid3);
        document.getElementById("paguBidang4").innerText = uang.format(paguBid4);
        document.getElementById("paguBidang5").innerText = uang.format(paguBid5);
        document.getElementById("paguBidang6").innerText = uang.format(paguBid6);
        document.getElementById("paguBidang7").innerText = uang.format(paguBid7);

        document.getElementById("anggaranBidang1").innerText = uang.format(realiBid1);
        document.getElementById("anggaranBidang2").innerText = uang.format(realiBid2);
        document.getElementById("anggaranBidang3").innerText = uang.format(realiBid3);
        document.getElementById("anggaranBidang4").innerText = uang.format(realiBid4);
        document.getElementById("anggaranBidang5").innerText = uang.format(realiBid5);
        document.getElementById("anggaranBidang6").innerText = uang.format(realiBid6);
        document.getElementById("anggaranBidang7").innerText = uang.format(realiBid7);

        document.getElementById("persenBid1").innerText = perseBid1.toFixed(0) + '%';
        document.getElementById("persenBid2").innerText = perseBid2.toFixed(0) + '%';
        document.getElementById("persenBid3").innerText = perseBid3.toFixed(0) + '%';
        document.getElementById("persenBid4").innerText = perseBid4.toFixed(0) + '%';
        document.getElementById("persenBid5").innerText = perseBid5.toFixed(0) + '%';
        document.getElementById("persenBid6").innerText = perseBid6.toFixed(0) + '%';
        document.getElementById("persenBid7").innerText = perseBid7.toFixed(0) + '%';
      });
    });

    //mendapatkan data indikator perbidang 
    $(document).ready(function() {
      let target;
      let realisasi, reali_i, reali_ii, reali_iii, reali_iv;
      let capaianKinerja;
      dataPegawaiBidang = $('#tabel_dataIndikatorBidang').DataTable({
        "ajax": {
          // json datasource
          type: "POST", // method  , by default get
          url: "<?= base_url(); ?>/DashboardSidang/dataIndikatorBidang",

          error: function() { // error handling
            $(".tabel_dataIndikatorBidang-error").html("");
            $("#tabel_dataIndikatorBidang").append(
              '<tbody class="tabel_dataIndikatorBidang-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
            );
            $("#tabel_dataIndikatorBidang_processing").css("display", "none");
          }
        },
        "columns": [{
            data: 0,
            render: function(data, type, row) {
              return '<div class="text-sm h6"> ' + data + '. </div>';
            }
          }, {
            data: 1,
            render: function(data, type, row) {
              return '<div class="text-sm h6"> ' + data + ' </div>';
            }
          }, {
            data: 2,
            render: function(data, type, row) {
              if (data == 'Pengendalian Penduduk') {
                data = 'DALDUK'
              } else if (data == 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA') {
                data = 'KB & KS'
              } else if (data == 'PEMBERDAYAAN MASYARAKAT') {
                data = 'PM'
              } else if (data == 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK') {
                data = 'PPPA'
              } else if (data == 'SEKRETARIAT') {
                data = "SEKRETARIAT"
              }
              return '<div class="text-sm text-center text-uppercase h6"> ' + data +
                ' </div>';
            }
          },
          {
            data: 3,
            render: function(data, type, row) {
              target = parseInt(data);
              return '<div class="text-center text-sm font-weight-bold">' + data +
                '</div>';
            }
          },
          {
            data: 4,
            render: function(data, type, row) {
              reali_i = parseInt(data);
              return '<div class="text-center text-sm font-weight-bold">' + data +
                '</div> ';
            }
          },
          {
            data: 5,
            render: function(data, type, row) {
              reali_ii = parseInt(data);
              return '<div class="text-center text-sm font-weight-bold">' + data +
                '</div> ';
            }
          },
          {
            data: 6,
            render: function(data, type, row) {
              reali_iii = parseInt(data);
              return '<div class="text-center text-sm font-weight-bold">' + data +
                '</div> ';
            }
          },
          {
            data: 7,
            render: function(data, type, row) {
              reali_iv = parseInt(data);;
              return '<div class="text-center text-sm font-weight-bold">' + data +
                '</div> ';
            }
          },
          {
            data: 3,
            render: function(data, type, row) {
              realisasi = (reali_i + reali_ii + reali_iii + reali_iv)
              capaianKinerja = (realisasi / target) * 100;
              if (capaianKinerja < 100) {
                return '<div class="text-center text-sm font-weight-bold">' +
                  capaianKinerja.toFixed(2) + '% </div> ';
              }
              return '<div class="text-center text-sm font-weight-bold">' +
                capaianKinerja.toFixed(2) + '% </div> ';
            }
          },
          {
            data: 3,
            render: function(data, type, row) {
              if (realisasi >= target) {
                return '<div class="text-center text-sm font-weight-bold"><span class="badge badge-sm bg-gradient-success">Tercapai</span></div>';
              } else if (capaianKinerja >= 1) {
                return '<div class="text-center text-sm font-weight-bold"><span class="badge badge-sm bg-gradient-danger">Belum Tercapai</span></div>';
              } else {
                return '<div class="text-center text-sm font-weight-bold"><span class="badge badge-sm bg-gradient-danger">Belum Tercapai</span></div>';
              }
            }
          },

        ],
        "processing": true,
        "columnDefs": [{
          "targets": [],
          "orderable": true
        }],
        "ordering": true,
        "info": true,
        "searching": true,
        "paging": true,
        "serverSide": true,
        "stateSave": false,
        "lengthMenu": [
          [15, 50, 100, -1],
          [15, 50, 100, "All"]
        ],
        "scrollX": true,
        "lengthChange": true,
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