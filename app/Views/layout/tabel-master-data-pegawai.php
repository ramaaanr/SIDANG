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
  <?php include('navs/sidenav-tabel-master-data-pegawai.php') ?>
  <main class="main-content position-relative border-radius-lg">
    <?php include('navs/header-tabel.php') ?>
    <div>
      <?php include('tables/content-table-master-data-pegawai.php') ?>
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

    //////////////////////////////////////// Start Of Data Pegawai ////////////////////////////////////////

    // data pegawai
    $(document).ready(function() {

      $.ajax({
        method: "GET",
        url: "<?= base_url(); ?>/TabelMaster/getSemuaNamaBidang",
        success: function(res) {
          const id_bidang = $('#divisi');
          const ubah_id_bidang = $('#ubah_divisi');
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
      let dataProfileBidang = []
      $.ajax({
        url: "<?= base_url(); ?>/TabelMaster/getProfileBidang",
        type: "POST",
        success: function(res) {
          dataProfileBidang = JSON.parse(res);
        },
      });
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
            data: 3,
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
        document.getElementById("ubah_divisi").value = res.divisi;
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