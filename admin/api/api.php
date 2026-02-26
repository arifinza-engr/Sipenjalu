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

  .tambah-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 0.52rem 1.15rem;
    background: linear-gradient(135deg, #1a3d7a, #0f2550);
    color: var(--accent-bright);
    border: 1px solid var(--border-glow);
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.22s ease;
    text-decoration: none;
    box-shadow: 0 0 12px rgba(45, 125, 247, 0.15);
  }

  .tambah-btn:hover {
    background: linear-gradient(135deg, #1f4a96, #142e68);
    color: white;
    box-shadow: 0 0 20px rgba(45, 125, 247, 0.35);
    transform: translateY(-1px);
  }

  .aduan-body {
    padding: 1.5rem 2rem;
  }

  .dataTables_wrapper .dataTables_filter input {
    background: #07111f;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    padding: 0.45rem 1rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.85rem;
    color: var(--text-primary);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .dataTables_wrapper .dataTables_filter input::placeholder {
    color: var(--text-muted);
  }

  .dataTables_wrapper .dataTables_filter input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45, 125, 247, 0.15);
  }

  .dataTables_wrapper .dataTables_filter label,
  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_length label {
    color: var(--text-secondary) !important;
    font-size: 0.83rem;
  }

  .dataTables_wrapper select {
    background: #07111f;
    border: 1px solid var(--border);
    color: var(--text-primary);
    border-radius: 7px;
    padding: 0.2rem 0.5rem;
  }

  #apiTable {
    border-collapse: separate;
    border-spacing: 0;
    width: 100% !important;
  }

  #apiTable thead tr th {
    background: var(--bg-thead);
    color: var(--text-secondary);
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.9rem 1rem;
    border: none;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
  }

  #apiTable thead tr th:first-child {
    border-radius: 10px 0 0 10px;
  }

  #apiTable thead tr th:last-child {
    border-radius: 0 10px 10px 0;
  }

  #apiTable tbody tr td {
    padding: 0.85rem 1rem;
    border: none;
    border-bottom: 1px solid var(--border);
    font-size: 0.86rem;
    color: var(--text-primary);
    vertical-align: middle;
    transition: background 0.15s;
  }

  #apiTable tbody tr:hover td {
    background: var(--bg-row-hover);
  }

  #apiTable tbody tr:last-child td {
    border-bottom: none;
  }

  .no-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    background: #0e1e38;
    color: var(--accent-bright);
    border: 1px solid var(--border-glow);
    border-radius: 7px;
    font-weight: 700;
    font-size: 0.75rem;
  }

  .aksi-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0.42rem 0.95rem;
    background: linear-gradient(135deg, #1a3d7a, #0f2550);
    color: var(--accent-bright);
    border: 1px solid var(--border-glow);
    border-radius: 9px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.79rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .aksi-btn:hover {
    background: var(--accent);
    color: white;
    border-color: var(--accent);
    box-shadow: 0 0 16px var(--accent-glow);
    transform: translateY(-1px);
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 8px !important;
    padding: 0.3rem 0.75rem !important;
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-size: 0.82rem !important;
    border: none !important;
    margin: 0 2px !important;
    color: var(--text-secondary) !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current,
  .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background: var(--accent) !important;
    color: white !important;
    border: none !important;
    box-shadow: 0 0 12px var(--accent-glow) !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
    background: #0e1e38 !important;
    color: var(--accent-bright) !important;
    border: none !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    color: var(--text-muted) !important;
  }
</style>

<?php
$sql_cek = "SELECT * FROM tb_kunciapi";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
?>

<div class="aduan-panel">
  <!-- Header -->
  <div class="aduan-header">
    <div class="aduan-header-left">
      <div class="aduan-header-icon">
        <i class="fas fa-key"></i>
      </div>
      <div>
        <h5>Data Kunci API</h5>
        <p>Kelola kunci API untuk integrasi sistem</p>
      </div>
    </div>
    <button class="tambah-btn" data-bs-toggle="modal" data-bs-target="#addModal">
      <i class="fas fa-plus"></i> Tambah Kunci
    </button>
  </div>

  <!-- Body -->
  <div class="aduan-body">
    <div class="table-responsive">
      <table class="table" id="apiTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kunci API</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM tb_kunciapi";
          $result = mysqli_query($koneksi, $query);
          $no = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><div class='no-badge'>{$no}</div></td>";
            echo "<td><strong>{$row['nama']}</strong></td>";
            echo "<td><code style='color: var(--accent-bright); font-family: monospace;'>{$row['kunci']}</code></td>";
            echo "<td><a href='#' title='Ubah' class='aksi-btn editLink' data-id='{$row['id']}' data-nama='{$row['nama']}' data-kunci='{$row['kunci']}'><i class='fas fa-pen'></i> Edit</a></td>";
            echo "</tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!-- Tambah Modal -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="add_nama">
            </div>
            <div class="form-group">
              <label>Kunci</label>
              <input type="text" class="form-control" name="add_kunci">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="Tambah">Tambah</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Ubah Data</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <input type="hidden" name="id" id="edit_id">
            <div class="form-group">
              <label>Nama :</label>
              <input type="text" class="form-control" name="nama" id="edit_nama" readonly>
            </div>
            <div class="form-group">
              <label>No api :</label>
              <input type="text" class="form-control" name="kunci" id="edit_kunci">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="Ubah">Ubah</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['Ubah'])) {
  $stmt = $koneksi->prepare("UPDATE tb_kunciapi SET nama=?, kunci=? WHERE id=?");
  $stmt->bind_param("sss", $_POST['nama'], $_POST['kunci'], $_POST['id']);
  $query_ubah = $stmt->execute();
  $stmt->close();

  if ($query_ubah) {
    echo "<script>
              Swal.fire({title: 'Ubah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=api';
                  }
              })</script>";
  } else {
    echo "<script>
              Swal.fire({title: 'Ubah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=api';
                  }
              })</script>";
  }
}

if (isset($_POST['Tambah'])) {
  $stmt = $koneksi->prepare("INSERT INTO tb_kunciapi (nama, kunci) VALUES (?, ?)");
  $stmt->bind_param("ss", $_POST['add_nama'], $_POST['add_kunci']);
  $query_tambah = $stmt->execute();
  $stmt->close();

  if ($query_tambah) {
    echo "<script>
              Swal.fire({title: 'Tambah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=api';
                  }
              })</script>";
  } else {
    echo "<script>
              Swal.fire({title: 'Tambah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=api';
                  }
              })</script>";
  }
}
?>

<script>
  $(document).ready(function() {
    $('#apiTable').DataTable();
  });
</script>

<script>
  $(document).ready(function() {
    $('.editLink').click(function() {
      let id = $(this).data('id');
      let nama = $(this).data('nama');
      let kunci = $(this).data('kunci');

      $('#edit_id').val(id);
      $('#edit_nama').val(nama);
      $('#edit_kunci').val(kunci);

      $('#editModal').modal('show');
    });
  });
</script>