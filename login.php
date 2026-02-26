<?php
include "inc/koneksi.php";

if (isset($_POST['btnLogin'])) {
  // Dapatkan input user
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Gunakan prepared statement untuk mencegah SQL injection
  $stmt = $koneksi->prepare("SELECT * FROM tb_pengguna WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $data_login = $result->fetch_assoc();
  $jumlah_login = $result->num_rows;
  $stmt->close();

  // Cek jika user ditemukan
  if ($jumlah_login == 1) {
    session_start();
    $_SESSION["ses_id"] = $data_login["id_pengguna"];
    $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
    $_SESSION["ses_level"] = $data_login["level"];
    $_SESSION["ses_grup"] = $data_login["grup"];

    echo "<script>window.location = 'index';</script>";
  } else {
    echo "<script>alert('Username atau Password salah!'); window.location = 'login';</script>";
  }
}

?>

<!doctype html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPENJALU</title>
  <script>
    (function() {
      const savedTheme = localStorage.getItem('sipenjalu-theme');
      document.documentElement.setAttribute('data-theme', savedTheme ? savedTheme : 'dark');
    })();
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="assets/css/login1.css">
</head>

<body>
  <form method="post">
    <section class="h-100 gradient-form">
      <div class="theme-switch-wrapper">
        <button class="btn theme-toggle" type="button" id="themeToggle" aria-label="Toggle theme">
          <i class="fas fa-moon"></i>
        </button>
      </div>
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                      <img src="https://images.vexels.com/media/users/3/156814/isolated/preview/3905419df3d4ee163e00f778b6110da6-lotus-symbol-icon.png" style="width: 50px;" alt="logo">
                      <h4 class="mt-1 mb-5 pb-1">SIPENJALU</h4>
                    </div>
                    <div class="text-center">
                      <img src="assets/img/tittle.png" class="user-image img-responsive mb-4" alt="User Image" style="max-width: 180px;" />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="hidden" id="form2Example11" class="form-control" value="pengadu" name="username" id="username" placeholder="Phone number or email address" />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="hidden" id="form2Example22" value="123" name="password" id="password" class="form-control" />
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button type="submit" class="btn btn-outline-primary form-control fa-lg gradient-custom-2 mb-3 text-white" name="btnLogin">MULAI PENGADUAN</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Copyright © SIPENJALU 2023 All rights reserved</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4 text-center">Pengaduan Penerangan Jalan Umum: Notifikasi WhatsApp</h4>
                    <p class="small mb-0 text-justify">Kami memperkenalkan solusi formal dan efisien untuk mengatasi masalah penerangan jalan umum.
                      Dengan aplikasi pengaduan penerangan jalan kami, setiap laporan yang Anda kirimkan akan segera diproses.
                      Untuk memastikan Anda selalu mendapatkan informasi terbaru mengenai status pengaduan Anda,
                      kami telah mengintegrasikan notifikasi realtime melalui WhatsApp. Dengan komitmen kami untuk memastikan
                      penerangan jalan yang memadai dan keselamatan pengguna jalan, kami berupaya memberikan layanan yang cepat, transparan, dan akuntabel.
                      Bermitra dengan kami untuk mewujudkan kota yang lebih terang dan aman.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    (function() {
      const root = document.documentElement;
      const toggle = document.getElementById('themeToggle');

      function updateIcon(theme) {
        const icon = theme === 'dark' ? 'fa-sun' : 'fa-moon';
        toggle.innerHTML = '<i class="fas ' + icon + '"></i>';
      }

      if (toggle) {
        updateIcon(root.getAttribute('data-theme'));
        toggle.addEventListener('click', function() {
          const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
          root.setAttribute('data-theme', nextTheme);
          localStorage.setItem('sipenjalu-theme', nextTheme);
          updateIcon(nextTheme);
        });
      }
    })();
  </script>
</body>

</html>




<!-- END -->