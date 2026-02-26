<?php
$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as proses  from tb_pengaduan where status='Proses' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $proses = $data['proses'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as tanggapi  from tb_pengaduan where status='Tanggapi' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $tangan = $data['tanggapi'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as selesai  from tb_pengaduan where status='Selesai' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $sel = $data['selesai'];
}

?>
<div class="dashboard-header">
  <h4>DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN KAB PEMALANG</h4>
</div>

<div class="dashboard-grid">
  <div class="dashboard-card status-pending">
    <i class="fas fa-clock card-icon"></i>
    <div class="card-number"><?= $proses; ?></div>
    <p class="card-title">Pengaduan Menunggu</p>
  </div>

  <div class="dashboard-card status-progress">
    <i class="fas fa-reply card-icon"></i>
    <div class="card-number"><?= $tangan; ?></div>
    <p class="card-title">Pengaduan Ditanggapi</p>
  </div>

  <div class="dashboard-card status-completed">
    <i class="fas fa-check-circle card-icon"></i>
    <div class="card-number"><?= $sel; ?></div>
    <p class="card-title">Pengaduan Selesai</p>
  </div>

  <a href="?page=aduan_tambah" style="text-decoration: none; color: inherit;">
    <div class="dashboard-card status-add">
      <i class="fas fa-plus card-icon"></i>
      <div class="card-number" style="font-size: 2rem; margin-bottom: 1rem;">+</div>
      <p class="card-title">Tambah Aduan</p>
    </div>
  </a>
</div>