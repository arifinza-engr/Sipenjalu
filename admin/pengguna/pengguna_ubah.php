<?php

if (isset($_GET['kode'])) {
  $stmt = $koneksi->prepare("SELECT * FROM tb_pengguna WHERE id_pengguna=?");
  $stmt->bind_param("s", $_GET['kode']);
  $stmt->execute();
  $result = $stmt->get_result();
  $data_cek = $result->fetch_array(MYSQLI_BOTH);
  $stmt->close();
}
?>


<div class="container mt-4"> <!-- Container pembungkus -->
  <div class="card">
    <div class="card-header bg-infooo">
      <i class="fas fa-edit"></i> <!-- FontAwesome 5 icon -->
      Ubah Pengguna
    </div>
    <div class="card-body">
      <form method="POST">

        <input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>" readonly />

        <div class="mb-3">
          <label for="nama_pengguna" class="form-label">Nama lengkap</label>
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>">
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $data_cek['username']; ?>">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo $data_cek['password']; ?>">
        </div>

        <div class="mb-3">
          <label for="whatsapp" class="form-label">No WhatsApp</label>
          <input type="whatsapp" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $data_cek['whatsapp']; ?>">
        </div>

        <div class="mb-3">
          <label for="level" class="form-label">Level</label>
          <select name="level" class="form-control" id="level">
            <?php
            // mengecek data yg dipilih sebelumnya
            if ($data_cek['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
            else echo "<option value='Administrator'>Administrator</option>";

            if ($data_cek['level'] == "Petugas") echo "<option value='Petugas' selected>Petugas</option>";
            else echo "<option value='Petugas'>Petugas</option>";
            ?>
          </select>
        </div>

        <div class="d-grid gap-2 d-md-block">
          <input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
          <a href="?page=user_data" title="Kembali" class="btn btn-light">Batal</a>
        </div>

      </form>
    </div>
  </div>
</div> <!-- Penutup container -->

<?php

if (isset($_POST['Ubah'])) {

  $stmt = $koneksi->prepare("UPDATE tb_pengguna SET nama_pengguna=?, username=?, password=?, whatsapp=?, level=? WHERE id_pengguna=?");
  $stmt->bind_param("ssssss", $_POST['nama_pengguna'], $_POST['username'], $_POST['password'], $_POST['whatsapp'], $_POST['level'], $_POST['id_pengguna']);
  $query_ubah = $stmt->execute();
  $stmt->close();
  if ($query_ubah) {
    echo "<script>
        Swal.fire({title: 'Ubah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=user_data';
            }
        })</script>";
  } else {
    echo "<script>
        Swal.fire({title: 'Ubah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=user_data';
            }
        })</script>";
  }
}
?>
<!-- end -->