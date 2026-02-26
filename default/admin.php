<?php
// Mengambil statistik keluhan
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

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as orang from tb_pengguna");
while ($data = $sql->fetch_assoc()) {
  $or = $data['orang'] - 1;
}
?>


<div class="text-center mb-8">
  <h2 class="text-2xl font-display font-bold text-white mb-2">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h2>
  <p class="text-primary-400 font-medium">KABUPATEN PEMALANG</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
  <a href="?page=aduan_admin" class="group animate-fade-in">
    <div class="bg-gradient-to-br from-accent-500/20 to-accent-600/20 border border-accent-500/30 rounded-2xl p-6 hover:shadow-glow-orange transition-all duration-300 hover:scale-105 backdrop-blur-sm relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-accent-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-accent-500/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-clock text-accent-400 text-xl"></i>
          </div>
          <div class="text-right">
            <div class="text-3xl font-bold text-white animate-bounce-subtle"><?= $proses; ?></div>
          </div>
        </div>
        <h3 class="text-white font-semibold text-lg mb-1">Pengaduan Menunggu</h3>
        <p class="text-text-muted text-sm">Menunggu penanganan</p>
      </div>
    </div>
  </a>

  <a href="?page=aduan_admin_tanggap" class="group animate-fade-in" style="animation-delay: 0.1s">
    <div class="bg-gradient-to-br from-primary-500/20 to-primary-600/20 border border-primary-500/30 rounded-2xl p-6 hover:shadow-glow transition-all duration-300 hover:scale-105 backdrop-blur-sm relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-primary-500/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-reply text-primary-400 text-xl"></i>
          </div>
          <div class="text-right">
            <div class="text-3xl font-bold text-white animate-bounce-subtle"><?= $tangan; ?></div>
          </div>
        </div>
        <h3 class="text-white font-semibold text-lg mb-1">Pengaduan Ditanggapi</h3>
        <p class="text-text-muted text-sm">Sedang dalam proses</p>
      </div>
    </div>
  </a>

  <a href="?page=aduan_admin_selesai" class="group animate-fade-in" style="animation-delay: 0.2s">
    <div class="bg-gradient-to-br from-green-500/20 to-green-600/20 border border-green-500/30 rounded-2xl p-6 hover:shadow-2xl hover:shadow-green-500/10 transition-all duration-300 hover:scale-105 backdrop-blur-sm relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-check-circle text-green-400 text-xl"></i>
          </div>
          <div class="text-right">
            <div class="text-3xl font-bold text-white animate-bounce-subtle"><?= $sel; ?></div>
          </div>
        </div>
        <h3 class="text-white font-semibold text-lg mb-1">Pengaduan Selesai</h3>
        <p class="text-text-muted text-sm">Telah diselesaikan</p>
      </div>
    </div>
  </a>

  <a href="?page=user_data" class="group animate-fade-in" style="animation-delay: 0.3s">
    <div class="bg-gradient-to-br from-secondary-500/20 to-secondary-600/20 border border-secondary-500/30 rounded-2xl p-6 hover:shadow-glow-purple transition-all duration-300 hover:scale-105 backdrop-blur-sm relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-secondary-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-secondary-500/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-users text-secondary-400 text-xl"></i>
          </div>
          <div class="text-right">
            <div class="text-3xl font-bold text-white animate-bounce-subtle"><?= $or; ?></div>
          </div>
        </div>
        <h3 class="text-white font-semibold text-lg mb-1">Data Pengguna</h3>
        <p class="text-text-muted text-sm">Total pengguna aktif</p>
      </div>
    </div>
  </a>
</div>