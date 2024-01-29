<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>SIDANG</title>

  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <!-- Template Main CSS File -->
  <!-- Home CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style4.css">
  <!-- Footer CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style3.css">

  <!-- Footer -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!--<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />
    -->

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/tittle.png" />

  <!-- Google Fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/nunito.css" />

  <!-- Vendor CSS Files -->

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/aos.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/remixicon.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/glightbox.min.css" />

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/sweetalert2.css" />

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/assets/css/style2.css" rel="stylesheet" />

  <style>
    th,
    td {
      font-family: sans-serif;
    }

    th {
      font-size: 15pt;
      color: navy;
    }

    td {
      font-size: 10pt;
      text-align: justify;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: rgb(24, 24, 118);
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    /* optgroup { font-size:5px; } */

    .box {
      text-align: justify !important;
    }
  </style>
</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <?php include("login/header.php") ?>
  </header>
  <!-- End Header -->

  <section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <h1>Selamat Datang</h1>
      <!--<h2>Sistem Informasi Data Bidang</h2>-->
      <img src="<?= base_url() ?>/assets/img/logo.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      <div style="width:50% ;height:60%">
        <img src="<?= base_url() ?>/assets/img/dpp3.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      </div>
    </div>
  </section>

  <main id="main">
    <!-- ======= visimisi Section ======= -->
    <?php include("login/vm-kota.php") ?>
    <!-- End About Section -->

    <!-- ======= visimisi Section ======= -->
    <?php include("login/desk-sidang.php") ?>
    <!-- End About Section -->

    <!-- ======= Fitur Section ======= -->
    <?php include("login/bidang.php") ?>
    <!-- End Values Section -->
    <!-- ======= F.A.Q Section ======= -->
  </main>
  <!-- End #main -->
  <?php include("login/map.php") ?>
  <!-- ======= Footer ======= -->

  <?php include("login/footer.php") ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js">
  </script>


  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i>
  </a>


  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/assets/bootstrap.bundle.js.download"></script>
  <script src="<?= base_url() ?>/assets/aos.js.download"></script>
  <script src="<?= base_url() ?>/assets/swiper-bundle.min.js.download"></script>
  <script src="<?= base_url() ?>/assets/isotope.pkgd.min.js.download"></script>
  <script src="<?= base_url() ?>/assets/glightbox.min.js.download"></script>
  <script src="<?= base_url() ?>/assets/sweetalert2.js.download"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/assets/main.js.download"></script>


  <!-- Modal -->
  <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body d-flex justify-content-between">

          <span style="margin-left: 10px; font-family: Nunito; color: navy"><strong>Sistem
              Informasi</strong> Data
            Bidang</span>

          <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row featurette">
            <div class="col-md-5 order-md-2">
              <form id="formLogin">
                <label style="font-size: 12px;"><?= $pesan_ui ?></label>
                <div class="mb-2">
                  <label for="validationServerUsername" class="form-label"><small>Username</small></label>
                  <input class="form-control " id="username" name="username" value="" required="">
                </div>
                <div class=" mb-3">
                  <label for="validationServer05" class="form-label"><small>
                      Password</small></label>
                  <input type="password" class="form-control" name="password" id="password" required="" />
                </div>

                <div class="form-floating mb-4">
                  <select class="form-select" size="1" id="divisi" aria-label="Floating label select example" required="" name="divisi">
                    <option value="4">DALDUK</option>
                    <option value="1">KB & KS</option>
                    <option value="2">PM</option>
                    <option value="3">PPA</option>
                    <option value="5">SEKRETARIAT</option>
                  </select>
                  <label for="divisi">Pilih Bidang</label>
                </div>
                <!--<div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">ingat saya</label>
                </div>-->
                <button type="submit" class="btn btn-primary btn-block mb-4" id="btnSubmit">
                  Masuk
                </button>
              </form>
            </div>
            <div class="col-md-6 order-md-1 d-flex">
              <img src="<?= base_url() ?>/assets/img/kb.png" alt="" class="mx-auto d-block" style="max-height: 250px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('#formLogin').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '<?= base_url("login/cek") ?>',
        data: $(this).serialize(),
        success: function(response) {
          let responseData = JSON.parse(response)
          if (responseData.status === 'success') {
            // Jika sign in berhasil, tampilkan pesan sukses dengan SweetAlert
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: responseData.message,
              showConfirmButton: false,
              timer: 2000, // Tampilkan pesan sukses selama 2 detik
              onClose: function() {
                window.location.href = '<?php echo base_url('DashboardSidang'); ?>';
              }
            });
          } else {
            // Jika sign in gagal, tampilkan pesan error dengan SweetAlert
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: responseData.message,
              showConfirmButton: true
            });
          }
        }
      });
    });
  });
</script>

</html>