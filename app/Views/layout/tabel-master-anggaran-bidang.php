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
  <?php include('navs/sidenav-tabel-master-anggaran-bidang.php') ?>
  <main class="main-content position-relative border-radius-lg">
    <?php include('navs/header-tabel.php') ?>
    <div>
      <?php include('tables/content-table-master-anggaran-bidang.php') ?>
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
  let uang = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  });

  //////////////////////////////////////// Start Of Anggaran Bidang ////////////////////////////////////////

  // data anggaran bidang
  $(document).ready(async function() {
    let dataProfileBidang = []
    $.ajax({
      url: "<?= base_url(); ?>/TabelMaster/getProfileBidang",
      type: "POST",
      success: function(res) {
        dataProfileBidang = JSON.parse(res);
      },
    });
    $.ajax({
      method: "GET",
      url: "<?= base_url(); ?>/TabelMaster/getSemuaNamaBidang",
      success: function(res) {
        const id_bidang = $('#id_bidang');
        const ubah_id_bidang = $('#ubah_id_bidang');
        const {
          data: bidangs
        } = JSON.parse(res);
        console.info(bidangs);
        $.each(bidangs, function(index, obj) {
          // Buat elemen <option> dan tambahkan ke dalam elemen <select>
          $('<option>').val(obj.id_bidang).text(obj.nama_bidang).appendTo(id_bidang);
          $('<option>').val(obj.id_bidang).text(obj.nama_bidang).appendTo(ubah_id_bidang);
        });

      },
    })
    tabelAnggaranBidang = await $('#master_anggaranBidang').DataTable({
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
          data: 1,
          render: function(data, type, row) {
            let namaBidang = "";
            dataProfileBidang.forEach((bidang) => {
              const {
                id_bidang,
                nama_bidang
              } = bidang;

              if (id_bidang == data) {
                namaBidang = nama_bidang;
                return;
              }
            });
            return namaBidang; // Tambahkan pernyataan return di sini
          }
        },
        {
          data: 2
        },
        {
          data: 3,
          render: function(data, type, row) {
            return uang.format(data);
          }
        },
        {
          data: 4,
          render: function(data, type, row) {
            return uang.format(data);
          }
        },
        {
          data: 5,
          render: function(data, type, row) {
            return uang.format(data);
          }
        },
        {
          data: 6,
          render: function(data, type, row) {
            return uang.format(data);
          }
        },
        {
          data: 7,
          render: function(data, type, row) {
            return uang.format(data);
          }
        },
        {
          data: 0,
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

    var formData = new FormData($('#simpan_anggaranBidang')[0]);
    $.ajax({
      method: "POST",
      url: "<?= base_url(); ?>/TabelMaster/simpan_anggaranBidang",
      data: formData,
      processData: false,
      contentType: false,
    }).done(function(res) {
      let resJson = JSON.parse(res);
      if (resJson.status) {
        Swal.fire(
          'Sukses',
          resJson.res,
          'success'
        );
      } else {
        Swal.fire(
          'Gagal!',
          resJson.res,
          'error',
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

      $('#ubah_id_ag').val(res.id_ag);
      $('#ubah_id_bidang').val(res.id_bidang);
      $('#ubah_tahun').val(res.tahun);
      $('#ubah_pagu_bidang').val(res.pagu_bidang);
      $('#ubah_realisasi_tw1').val(res.realisasi_tw1);
      $('#ubah_realisasi_tw2').val(res.realisasi_tw2);
      $('#ubah_realisasi_tw3').val(res.realisasi_tw3);
      $('#ubah_realisasi_tw4').val(res.realisasi_tw4);
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
          "update berhasil",
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