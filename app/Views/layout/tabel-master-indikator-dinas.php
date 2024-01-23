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
  <?php include('navs/sidenav-tabel-master-indikator-dinas.php') ?>
  <main class="main-content position-relative border-radius-lg">
    <?php include('navs/header-tabel.php') ?>
    <div>
      <?php include('tables/content-table-master-indikator-dinas.php') ?>
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
          data: 2,
          render: function(data, type, row) {
            var nama_bidang = 'not_found'; // Default value jika ada kesalahan

            $.ajax({
              method: 'GET',
              url: '<?= base_url(); ?>/TabelMaster/getNamaBidang/' + data,
              success: function(response) {
                try {
                  var resJson = JSON.parse(response);
                  nama_bidang = resJson.nama_bidang;
                } catch (error) {
                  console.error(error);
                }
              },
              async: false, // Set async menjadi false agar dapat mengembalikan hasil dari ajax langsung
            });

            return nama_bidang;
          }
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
    console.info('id=' + id_ubahIndikator + '&' + data_post);
    $.ajax({
      method: "POST",
      url: "<?= base_url(); ?>/TabelMaster/ubah_Indikator",
      data: 'id=' + id_ubahIndikator + '&' + data_post,
      dataType: "json",
      error: function(xhr, status, error) {
        console.error('Terjadi kesalahan: ' + error);
        Swal.fire(
          'Gagal!',
          error,
          'error'
        );
      },
      success: function(event) {
        Swal.fire(
          'Perhatian',
          '',
          'success'
        );
      },
      complete: function(jqXHR, textStatus) {

        tabelIndikator.ajax.reload(null, false);
      }
    })
    $('#ubah_Indikator')[0].reset();
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