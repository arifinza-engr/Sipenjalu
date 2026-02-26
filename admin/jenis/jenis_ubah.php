<?php

if (isset($_GET['kode'])) {
  $stmt = $koneksi->prepare("SELECT * FROM tb_jenis WHERE id_jenis=?");
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
      Ubah Jenis
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form method="POST">

            <!-- Hidden input -->
            <input type='hidden' class="form-control" name="id_jenis" value="<?php echo $data_cek['id_jenis']; ?>" readonly>

            <div class="mb-3"> <!-- Menggunakan mb-3 (margin-bottom) untuk memberikan jarak antar elemen -->
              <label for="jenisInput" class="form-label">Jenis Aduan</label>
              <input type="text" class="form-control" id="jenisInput" name="jenis" value="<?php echo $data_cek['jenis']; ?>">
            </div>

            <div>
              <input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
              <a href="?page=jenis_view" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> <!-- Penutup container -->



<?php

if (isset($_POST['Ubah'])) {

  $stmt = $koneksi->prepare("UPDATE tb_jenis SET jenis=? WHERE id_jenis=?");
  $stmt->bind_param("ss", $_POST['jenis'], $_POST['id_jenis']);
  $query_ubah = $stmt->execute();
  $stmt->close();
  if ($query_ubah) {
    echo "<script>
        Swal.fire({title: 'Ubah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=jenis_view';
            }
        })</script>";
  } else {
    echo "<script>
        Swal.fire({title: 'Ubah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=jenis_view';
            }
        })</script>";
  }
}
?>
<!-- end -->