<?php

if (isset($_GET['kode'])) {
  $stmt = $koneksi->prepare("SELECT * FROM tb_pengadu WHERE id_pengadu=?");
  $stmt->bind_param("s", $_GET['kode']);
  $stmt->execute();
  $result = $stmt->get_result();
  $data_cek = $result->fetch_array(MYSQLI_BOTH);
  $stmt->close();
}
?>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

  :root {
    --bg-base: #060c18;
    --bg-panel: #0d1526;
    --bg-header: #0a1120;
    --bg-row-hover: #111d35;
    --bg-thead: #0a1422;
    --border: #1a2d4a;
    --border-glow: #1e3a6e;
    --accent: #2d7df7;
    --accent-bright: #4d9bff;
    --accent-glow: rgba(45, 125, 247, 0.25);
    --text-primary: #e0eaff;
    --text-secondary: #7a9cc5;
    --text-muted: #3e5a7a;
  }

  .aduan-panel {
    background: var(--bg-panel);
    border-radius: 20px;
    box-shadow:
      0 0 0 1px var(--border),
      0 8px 60px rgba(0, 0, 0, 0.6),
      0 0 80px rgba(45, 125, 247, 0.06);
    overflow: hidden;
  }

  .aduan-header {
    padding: 1.6rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--bg-header);
    border-bottom: 1px solid var(--border);
    position: relative;
    overflow: hidden;
  }

  .aduan-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--accent), transparent);
  }

  .aduan-header-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .aduan-header-icon {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #1a3d7a, #0f2550);
    border: 1px solid var(--border-glow);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-bright);
    font-size: 1rem;
    box-shadow: 0 0 16px var(--accent-glow);
  }

  .aduan-header h5 {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--text-primary);
    letter-spacing: -0.02em;
  }

  .aduan-header p {
    margin: 0;
    font-size: 0.76rem;
    color: var(--text-secondary);
  }

  .aduan-body {
    padding: 1.5rem 2rem;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-label {
    display: block;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  .form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    background: #07111f;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    color: var(--text-primary);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .form-control::placeholder {
    color: var(--text-muted);
  }

  .form-control:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45, 125, 247, 0.15);
  }

  .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    background: #07111f;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    color: var(--text-primary);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    cursor: pointer;
  }

  .form-select:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45, 125, 247, 0.15);
  }

  .form-select option {
    background: #07111f;
    color: var(--text-primary);
  }

  .btn-group {
    display: flex;
    gap: 0.75rem;
    margin-top: 1rem;
  }

  .aksi-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0.52rem 1.25rem;
    background: linear-gradient(135deg, #1a3d7a, #0f2550);
    color: var(--accent-bright);
    border: 1px solid var(--border-glow);
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.22s ease;
    cursor: pointer;
  }

  .aksi-btn:hover {
    background: linear-gradient(135deg, #1f4a96, #142e68);
    color: white;
    box-shadow: 0 0 20px rgba(45, 125, 247, 0.35);
    transform: translateY(-1px);
  }

  .aksi-btn.secondary {
    background: #0e1e38;
    border-color: var(--border);
    color: var(--text-secondary);
  }

  .aksi-btn.secondary:hover {
    background: #1a2d4a;
    color: var(--text-primary);
  }
</style>

<div class="aduan-panel">
  <!-- Header -->
  <div class="aduan-header">
    <div class="aduan-header-left">
      <div class="aduan-header-icon">
        <i class="fas fa-user-edit"></i>
      </div>
      <div>
        <h5>Ubah Pengadu</h5>
        <p>Edit data pengadu yang dipilih</p>
      </div>
    </div>
  </div>

  <!-- Body -->
  <div class="aduan-body">
    <form method="POST">
      <input type='hidden' name="id_pengadu" value="<?php echo $data_cek['id_pengadu']; ?>" />

      <div class="form-group">
        <label class="form-label">Nama Pengadu</label>
        <input class="form-control" name="nama_pengadu" value="<?php echo $data_cek['nama_pengadu']; ?>" placeholder="Masukkan nama pengadu..." required />
      </div>

      <div class="form-group">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jekel" class="form-select" required>
          <?php
          //menhecek data yg dipilih sebelumnya
          if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
          else echo "<option value='Laki-Laki'>Laki-Laki</option>";

          if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
          else echo "<option value='Perempuan'>Perempuan</option>";
          ?>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Nomor HP</label>
        <input type="text" class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" placeholder="Masukkan nomor HP..." required />
      </div>

      <div class="form-group">
        <label class="form-label">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>" placeholder="Masukkan alamat lengkap..." required />
      </div>

      <div class="btn-group">
        <button type="submit" name="Ubah" class="aksi-btn">
          <i class="fas fa-save"></i> Simpan Perubahan
        </button>
        <a href="?page=pengadu_view" class="aksi-btn secondary">
          <i class="fas fa-arrow-left"></i> Batal
        </a>
      </div>
    </form>
  </div>
</div>



<?php

if (isset($_POST['Ubah'])) {

  $stmt = $koneksi->prepare("UPDATE tb_pengadu SET nama_pengadu=?, jekel=?, no_hp=?, alamat=? WHERE id_pengadu=?");
  $stmt->bind_param("sssss", $_POST['nama_pengadu'], $_POST['jekel'], $_POST['no_hp'], $_POST['alamat'], $_POST['id_pengadu']);
  $query_ubah = $stmt->execute();
  $stmt->close();

  $stmt2 = $koneksi->prepare("UPDATE tb_pengguna SET nama_pengguna=? WHERE id_pengguna=?");
  $stmt2->bind_param("ss", $_POST['nama_pengadu'], $_POST['id_pengadu']);
  $query_pengguna = $stmt2->execute();
  $stmt2->close();

  if ($query_ubah && $query_pengguna) {
    echo "<script>
        Swal.fire({title: 'Ubah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=pengadu_view';
            }
        })</script>";
  } else {
    echo "<script>
        Swal.fire({title: 'Ubah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=pengadu_view';
            }
        })</script>";
  }
}
?>
<!-- end -->