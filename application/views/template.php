<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Panel | Kabupaten SIKKA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="<?= base_url('') ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/css/style.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= base_url('') ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SIKKA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item ">
          <a class="nav-link nav-icon" href="<?= base_url('') ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Website">
            <i class="bi bi-globe"></i>
          </a>
        </li>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url('') ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama') ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $this->session->userdata('nama') ?></h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <?php $this->load->view($sidebar) ?>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?= ucwords(str_replace("_", " ", $this->uri->segment('2'))); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() . $this->uri->segment('1') . "/" . $this->uri->segment('2') ?>"><?= ucwords(str_replace("_", " ", $this->uri->segment('2'))); ?></a></li>
          <?php if ($this->uri->segment('3')) { ?>
            <li class="breadcrumb-item active"><?= ucwords(str_replace("_", " ", $this->uri->segment('3'))); ?></li>
          <?php } ?>
        </ol>
      </nav>
    </div>
    <?= $contents ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span><?= date('Y') ?></span></strong>. Kabupaten SIKKA
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="<?= base_url('') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/quill/quill.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="<?= base_url('') ?>assets/js/main.js"></script>


  <script>
    function logout() {
      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah anda yakin ingin keluar aplikasi?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            title: 'Berhasil!',
            text: 'Berhasil Logout!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            window.location.href = '<?= base_url('Login/logout') ?>';
          })
        }
      })
    }
  </script>
</body>

</html>