<?php
// Main content template - requires $userData to be available globally
global $userData;

// Define an associative array to map page requests to file paths.
$pageMap = [
    'admin-def' => 'default/admin.php',
    'petugas-def' => 'default/tugas.php',
    'pengadu' => 'default/pengadu.php',
    'user_data' => 'admin/pengguna/pengguna_tampil.php',
    'pengguna_tambah' => 'admin/pengguna/pengguna_tambah.php',
    'pengguna_ubah' => 'admin/pengguna/pengguna_ubah.php',
    'pedu_ubah' => 'admin/pengguna/pedu_ubah.php',
    'pengguna_hapus' => 'admin/pengguna/pengguna_hapus.php',
    'jenis_view' => 'admin/jenis/jenis_tampil.php',
    'jenis_tambah' => 'admin/jenis/jenis_tambah.php',
    'jenis_ubah' => 'admin/jenis/jenis_ubah.php',
    'jenis_hapus' => 'admin/jenis/jenis_hapus.php',
    'pengadu_view' => 'admin/pengadu/pengadu_tampil.php',
    'pengadu_tambah' => 'admin/pengadu/pengadu_tambah.php',
    'pengadu_ubah' => 'admin/pengadu/pengadu_ubah.php',
    'pengadu_hapus' => 'admin/pengadu/pengadu_hapus.php',
    'aduan_admin' => 'admin/aduan/adu_tampil.php',
    'aduan_admin_semua' => 'admin/aduan/adu_tampil_semua.php',
    'aduan_admin_tanggap' => 'admin/aduan/adu_tanggap.php',
    'aduan_admin_selesai' => 'admin/aduan/adu_selesai.php',
    'aduan_kelola' => 'admin/aduan/adu_ubah.php',
    'api' => 'admin/api/api.php',
    'laporan' => 'admin/laporan/laporan.php',
    'logout' => 'logout.php',
    'aduan_view' => 'pengadu/aduan/adu_tampil.php',
    'aduan_tambah' => 'pengadu/aduan/adu_tambah.php',
    'aduan_ubah' => 'pengadu/aduan/adu_ubah.php',
    'aduan_hapus' => 'pengadu/aduan/adu_hapus.php',
    'regis' => 'regis.php'
];

// Define an array for default pages based on user level
$defaultPages = [
    'Administrator' => 'default/admin.php',
    'Petugas' => 'default/tugas.php',
    'Pengadu' => 'default/pengadu.php'
];

// Get the requested page from the URL query parameter.
$hal = $_GET['page'] ?? null;
?>

<main class="pt-20 pb-8 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl mb-6 shadow-lg">
                <img src="assets/img/tittle.png" alt="Logo" class="w-12 h-12" />
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-white mb-4 tracking-tight">
                Dashboard <span class="text-primary-400">SIPENJALU</span>
            </h1>
            <p class="text-dark-300 text-lg">
                Selamat datang, <span class="text-white font-semibold"><?php echo htmlspecialchars($userData['nama']); ?></span>
                <span class="text-primary-400"> (<?php echo htmlspecialchars($userData['level']); ?>)</span>
            </p>
        </div>

        <?php
        if (isset($pageMap[$hal])) {
            include $pageMap[$hal];
        } elseif (isset($defaultPages[$userData['level']])) {
            include $defaultPages[$userData['level']];
        } else {
            echo "<center><h1>ERROR!</h1></center>";
        }
        ?>

    </div>
</main>