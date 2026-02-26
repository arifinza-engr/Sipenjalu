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

  #penggunaTable {
    border-collapse: separate;
    border-spacing: 0;
    width: 100% !important;
  }

  #penggunaTable thead tr th {
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

  #penggunaTable thead tr th:first-child {
    border-radius: 10px 0 0 10px;
  }

  #penggunaTable thead tr th:last-child {
    border-radius: 0 10px 10px 0;
  }

  #penggunaTable tbody tr td {
    padding: 0.85rem 1rem;
    border: none;
    border-bottom: 1px solid var(--border);
    font-size: 0.86rem;
    color: var(--text-primary);
    vertical-align: middle;
    transition: background 0.15s;
  }

  #penggunaTable tbody tr:hover td {
    background: var(--bg-row-hover);
  }

  #penggunaTable tbody tr:last-child td {
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

  .name-cell strong {
    display: block;
    font-weight: 600;
    color: var(--text-primary);
  }

  .sub-text {
    color: var(--text-secondary);
    font-size: 0.78rem;
  }

  .phone-text {
    color: var(--text-secondary);
    font-size: 0.82rem;
    font-family: 'Courier New', monospace;
  }

  .level-badge {
    display: inline-block;
    padding: 0.28rem 0.75rem;
    background: rgba(45, 125, 247, 0.12);
    color: var(--accent-bright);
    border: 1px solid rgba(45, 125, 247, 0.25);
    border-radius: 20px;
    font-size: 0.76rem;
    font-weight: 600;
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

  .aksi-btn.danger {
    background: linear-gradient(135deg, #7a1a1a, #500f0f);
  }

  .aksi-btn.danger:hover {
    background: #dc2626;
    border-color: #dc2626;
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

<div class="aduan-panel">
  <!-- Header -->
  <div class="aduan-header">
    <div class="aduan-header-left">
      <div class="aduan-header-icon">
        <i class="fas fa-users-cog"></i>
      </div>
      <div>
        <h5>Data Pengguna</h5>
        <p>Kelola data pengguna sistem</p>
      </div>
    </div>
    <a href="?page=pengguna_tambah" class="tambah-btn">
      <i class="fas fa-plus"></i> Tambah Pengguna
    </a>
  </div>

  <!-- Body -->
  <div class="aduan-body">
    <div class="table-responsive">
      <table class="table" id="penggunaTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>WhatsApp</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $koneksi->query("select * from tb_pengguna order by grup asc");
          while ($data = $sql->fetch_assoc()) {
            if ($data['nama_pengguna'] != "Masyarakat") {
          ?>
              <tr>
                <td><div class="no-badge"><?php echo $no++; ?></div></td>
                <td><strong><?php echo $data['nama_pengguna']; ?></strong></td>
                <td><span class="sub-text"><?php echo $data['username']; ?></span></td>
                <td><span class="phone-text"><?php echo str_repeat("*", strlen($data['password'])); ?></span></td>
                <td><span class="sub-text"><?php echo $data['whatsapp']; ?></span></td>
                <td><div class="level-badge"><?php echo $data['level']; ?></div></td>
                <td>
                  <div style="display: flex; gap: 0.5rem;">
                    <?php $grup = $data['grup']; ?>
                    <?php if ($grup == "A") { ?>
                      <a href="?page=pengguna_ubah&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="aksi-btn">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <a href="?page=pengguna_hapus&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus pengguna ini ?')" title="Hapus" class="aksi-btn danger">
                        <i class="fas fa-trash"></i> Hapus
                      </a>
                    <?php } else { ?>
                      <a href="?page=pedu_ubah&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="aksi-btn">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    <?php } ?>
                  </div>
                </td>
              </tr>
          <?php
                  }
                }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#penggunaTable').DataTable();
  });
</script>