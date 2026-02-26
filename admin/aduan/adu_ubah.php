<?php

function fetchComplaint($kode, $koneksi)
{
  $stmt = $koneksi->prepare("SELECT a.id_pengaduan, a.judul, a.no_telpon, a.foto, a.status, a.keterangan, a.waktu_aduan, a.tanggapan, j.id_jenis, j.jenis, p.nama_pengadu FROM tb_pengaduan a JOIN tb_jenis j ON a.jenis = j.id_jenis JOIN tb_pengadu p ON a.author = p.id_pengadu WHERE id_pengaduan = ?");
  $stmt->bind_param('s', $kode);
  $stmt->execute();
  return $stmt->get_result()->fetch_assoc();
}

if (isset($_GET['kode'])) {
  $data_cek = fetchComplaint($_GET['kode'], $koneksi);
  $aduan = $data_cek['judul'];
}

function sendMessage($token, $target, $message)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
      'target' => $target,
      'message' => $message,
    ),
    CURLOPT_HTTPHEADER => array(
      "Authorization: $token"
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

  :root {
    --bg-panel: #0d1526;
    --bg-header: #0a1120;
    --bg-field: #07111f;
    --bg-row-hover: #111d35;
    --border: #1a2d4a;
    --border-glow: #1e3a6e;
    --accent: #2d7df7;
    --accent-bright: #4d9bff;
    --accent-glow: rgba(45, 125, 247, 0.25);
    --text-primary: #e0eaff;
    --text-secondary: #7a9cc5;
    --text-muted: #3e5a7a;
  }

  /* ── Panel wrapper ── */
  .kelola-panel {
    background: var(--bg-panel);
    border-radius: 20px;
    box-shadow:
      0 0 0 1px var(--border),
      0 8px 60px rgba(0, 0, 0, 0.6),
      0 0 80px rgba(45, 125, 247, 0.06);
    overflow: hidden;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  /* ── Header ── */
  .kelola-header {
    padding: 1.6rem 2rem;
    display: flex;
    align-items: center;
    gap: 14px;
    background: var(--bg-header);
    border-bottom: 1px solid var(--border);
    position: relative;
    overflow: hidden;
  }

  .kelola-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--accent), transparent);
  }

  .kelola-header-icon {
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
    flex-shrink: 0;
  }

  .kelola-header h5 {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--text-primary);
    letter-spacing: -0.02em;
  }

  .kelola-header p {
    margin: 0;
    font-size: 0.76rem;
    color: var(--text-secondary);
  }

  /* ── Body ── */
  .kelola-body {
    padding: 2rem;
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 2rem;
    align-items: start;
  }

  /* ── Foto side ── */
  .kelola-foto {
    display: flex;
    flex-direction: column;
    gap: 12px;
    align-items: center;
  }

  .kelola-foto img {
    width: 100%;
    border-radius: 14px;
    border: 1px solid var(--border-glow);
    object-fit: cover;
    box-shadow: 0 0 24px rgba(45, 125, 247, 0.15);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
  }

  .kelola-foto img:hover {
    transform: scale(1.02);
    box-shadow: 0 0 36px rgba(45, 125, 247, 0.25);
  }

  /* ── Info rows ── */
  .info-grid {
    display: flex;
    flex-direction: column;
    gap: 0;
    background: var(--bg-header);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 1.5rem;
  }

  .info-row {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.1rem;
    border-bottom: 1px solid var(--border);
    gap: 0;
    transition: background 0.15s;
  }

  .info-row:last-child {
    border-bottom: none;
  }

  .info-row:hover {
    background: var(--bg-row-hover);
  }

  .info-label {
    width: 140px;
    flex-shrink: 0;
    font-size: 0.76rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--text-muted);
  }

  .info-value {
    font-size: 0.87rem;
    color: var(--text-primary);
    font-weight: 500;
  }

  .info-value .phone-text {
    font-family: 'Courier New', monospace;
    color: var(--text-secondary);
  }

  .jenis-chip {
    display: inline-block;
    padding: 0.22rem 0.7rem;
    background: rgba(45, 125, 247, 0.12);
    color: var(--accent-bright);
    border: 1px solid rgba(45, 125, 247, 0.25);
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  /* Status badge */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0.28rem 0.75rem;
    border-radius: 20px;
    font-size: 0.74rem;
    font-weight: 600;
    border: 1px solid transparent;
  }

  .status-badge::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .status-menunggu {
    background: rgba(234, 179, 8, 0.1);
    color: #facc15;
    border-color: rgba(234, 179, 8, 0.2);
  }

  .status-menunggu::before {
    background: #facc15;
    box-shadow: 0 0 6px #facc15;
  }

  .status-proses {
    background: rgba(45, 125, 247, 0.12);
    color: #60a5fa;
    border-color: rgba(45, 125, 247, 0.25);
  }

  .status-proses::before {
    background: #60a5fa;
    box-shadow: 0 0 6px #60a5fa;
  }

  .status-selesai {
    background: rgba(34, 197, 94, 0.1);
    color: #4ade80;
    border-color: rgba(34, 197, 94, 0.2);
  }

  .status-selesai::before {
    background: #4ade80;
    box-shadow: 0 0 6px #4ade80;
  }

  /* ── Form fields ── */
  .kelola-form {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
  }

  .form-group label {
    display: block;
    font-size: 0.76rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--text-muted);
    margin-bottom: 0.5rem;
  }

  .form-group textarea,
  .form-group select {
    width: 100%;
    background: var(--bg-field);
    border: 1.5px solid var(--border);
    border-radius: 11px;
    padding: 0.7rem 1rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.86rem;
    color: var(--text-primary);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    resize: vertical;
    box-sizing: border-box;
  }

  .form-group textarea:focus,
  .form-group select:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45, 125, 247, 0.15);
  }

  .form-group textarea[readonly] {
    opacity: 0.6;
    cursor: not-allowed;
  }

  .form-group select option {
    background: #0a1422;
  }

  /* ── Submit button ── */
  .submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 0.8rem 1.5rem;
    background: linear-gradient(135deg, var(--accent), #1a5fd4);
    color: white;
    border: none;
    border-radius: 12px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.92rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.22s ease;
    box-shadow: 0 4px 20px rgba(45, 125, 247, 0.35);
    letter-spacing: -0.01em;
  }

  .submit-btn:hover {
    background: linear-gradient(135deg, #4d9bff, #2d7df7);
    box-shadow: 0 4px 30px rgba(45, 125, 247, 0.55);
    transform: translateY(-2px);
  }

  .submit-btn:active {
    transform: translateY(0);
  }

  @media (max-width: 768px) {
    .kelola-body {
      grid-template-columns: 1fr;
    }

    .kelola-foto img {
      max-height: 220px;
      width: auto;
      margin: 0 auto;
      display: block;
    }
  }
</style>


<div class="kelola-panel">

  <!-- Header -->
  <div class="kelola-header">
    <div class="kelola-header-icon">
      <i class="fas fa-edit"></i>
    </div>
    <div>
      <h5>Tanggapi Pengaduan</h5>
      <p>Tinjau detail laporan dan berikan tanggapan resmi</p>
    </div>
  </div>

  <!-- Body -->
  <div class="kelola-body">

    <!-- Kiri: Foto -->
    <div class="kelola-foto">
      <img src="foto/<?php echo $data_cek['foto']; ?>" alt="Foto Aduan" />
    </div>

    <!-- Kanan: Detail + Form -->
    <div>

      <!-- Info rows -->
      <div class="info-grid">
        <div class="info-row">
          <span class="info-label">Nama Pengadu</span>
          <span class="info-value"><?php echo $data_cek['nama_pengadu']; ?></span>
        </div>
        <div class="info-row">
          <span class="info-label">Judul Aduan</span>
          <span class="info-value"><?php echo $data_cek['judul']; ?></span>
        </div>
        <div class="info-row">
          <span class="info-label">Jenis</span>
          <span class="info-value"><span class="jenis-chip"><?php echo $data_cek['jenis']; ?></span></span>
        </div>
        <div class="info-row">
          <span class="info-label">Waktu Aduan</span>
          <span class="info-value"><?php echo date("d - F - Y", strtotime($data_cek['waktu_aduan'])); ?></span>
        </div>
        <div class="info-row">
          <span class="info-label">Status</span>
          <span class="info-value">
            <?php
            $st = $data_cek['status'];
            $cls = $st === 'Proses' ? 'status-proses' : ($st === 'Tanggapi' ? 'status-selesai' : 'status-menunggu');
            echo "<span class='status-badge {$cls}'>{$st}</span>";
            ?>
          </span>
        </div>
        <div class="info-row">
          <span class="info-label">No HP</span>
          <span class="info-value"><span class="phone-text"><?php echo $data_cek['no_telpon']; ?></span></span>
        </div>
      </div>

      <!-- Form -->
      <form method="POST" enctype="multipart/form-data" class="kelola-form">
        <input type="hidden" name="id_pengaduan" value="<?php echo $data_cek['id_pengaduan']; ?>" />

        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea id="keterangan" name="keterangan" rows="3" readonly><?php echo $data_cek['keterangan']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status" required>
            <option value="">— Pilih Status —</option>
            <option value="Tanggapi">Tanggapi</option>
            <option value="Selesai">Selesai</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tanggapan">Tanggapan</label>
          <textarea id="tanggapan" name="tanggapan" rows="5" required><?php echo $data_cek['tanggapan']; ?></textarea>
        </div>

        <button type="submit" name="Ubah" class="submit-btn">
          <i class="fas fa-paper-plane"></i> Simpan Tanggapan
        </button>
      </form>

    </div>
  </div>
</div>


<?php
if (isset($_POST['Ubah'])) {
  $sql_ubah = "UPDATE tb_pengaduan SET
        status='" . $_POST['status'] . "',
        tanggapan='" . $_POST['tanggapan'] . "'
        WHERE id_pengaduan='" . $_POST['id_pengaduan'] . "'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);

  if ($query_ubah) {
    echo "<script>
      Swal.fire({title: 'Kelola Sukses', text: '', icon: 'success', confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) { window.location = 'index.php?page=aduan_admin'; }
      })</script>";

    if ($_POST['status'] == "Tanggapi") {
      $token_wa = "kQXDoqDmuLDAN!owWbbQ";
      $no_telp = $data_cek['no_telpon'];
      $messageUser = "            INFO PENGADUAN PENERANGAN JALAN UMUM\n\n" .
        "Halo $aduan !!!\n" .
        "Terima kasih telah menghubungi kami. Aduan Anda saat ini sedang dalam tahap penyelesaian oleh tim kami.\n\n" .
        "Mohon bersabar, kami akan segera memberikan tanggapan terkait hasil penyelesaian aduan Anda.\n\n" .
        "Terima kasih atas kesabaran dan kepercayaan Anda.";
      sendMessage($token_wa, $no_telp, $messageUser);
    }

    if ($_POST['status'] == "Selesai") {
      $token_wa = "kQXDoqDmuLDAN!owWbbQ";
      $no_telp = $data_cek['no_telpon'];
      $messageUser = "            INFO PENGADUAN PENERANGAN JALAN UMUM\n\n" .
        "Halo $aduan !!!\n" .
        "Kami senang memberitahukan bahwa aduan Anda telah berhasil diproses dan diselesaikan. Terima kasih telah memberikan masukan dan kepercayaan Anda kepada kami.\n" .
        "Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau aduan lainnya di masa depan.\n\n" .
        "Salam hangat,\n" .
        "Dinas Perumahan Dan Kawasan Permukiman";
      sendMessage($token_wa, $no_telp, $messageUser);
    }
  } else {
    echo "<script>
      Swal.fire({title: 'Kelola Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) { window.location = 'index.php?page=aduan_admin'; }
      })</script>";
  }
}
?>