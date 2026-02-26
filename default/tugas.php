<?php
$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as proses  from tb_pengaduan where status='Proses'");
while ($data = $sql->fetch_assoc()) {
  $proses = $data['proses'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as tanggapi  from tb_pengaduan where status='Tanggapi'");
while ($data = $sql->fetch_assoc()) {
  $tangan = $data['tanggapi'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as selesai  from tb_pengaduan where status='Selesai'");
while ($data = $sql->fetch_assoc()) {
  $sel = $data['selesai'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengadu) as orang  from tb_pengadu");
while ($data = $sql->fetch_assoc()) {
  $or = $data['orang'];
}
?>

<div class="dashboard-header">
  <h2>DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN KAB PEMALANG</h2>
</div>

<div class="dashboard-grid">
  <a href="?page=aduan_admin" style="text-decoration: none; color: inherit;">
    <div class="dashboard-card status-pending">
      <i class="fas fa-clock card-icon"></i>
      <div class="card-number"><?= $proses; ?></div>
      <p class="card-title">Pengaduan Menunggu</p>
    </div>
  </a>

  <a href="?page=aduan_admin_tanggap" style="text-decoration: none; color: inherit;">
    <div class="dashboard-card status-progress">
      <i class="fas fa-reply card-icon"></i>
      <div class="card-number"><?= $tangan; ?></div>
      <p class="card-title">Pengaduan Ditanggapi</p>
    </div>
  </a>

  <a href="?page=aduan_admin_selesai" style="text-decoration: none; color: inherit;">
    <div class="dashboard-card status-completed">
      <i class="fas fa-check-circle card-icon"></i>
      <div class="card-number"><?= $sel; ?></div>
      <p class="card-title">Pengaduan Selesai</p>
    </div>
  </a>
</div>