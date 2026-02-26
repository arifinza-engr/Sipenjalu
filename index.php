<?php

session_set_cookie_params(0, '/', '', false, true);
session_start();

if (empty($_SESSION['ses_nama'])) {
  header("location: login");
  exit();
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_level = $_SESSION["ses_level"];
  $data_grup = $_SESSION["ses_grup"];
}

include "inc/koneksi.php";

include "inc/koneksi.php";

function getApiKey($koneksi, $nama)
{
  // Query to fetch the 'kunci' value from 'tb_kunciapi' where the 'nama' column matches
  $sql = "SELECT kunci FROM tb_kunciapi WHERE nama = ?";
  $stmt = $koneksi->prepare($sql);
  $stmt->bind_param("s", $nama);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row["kunci"]; // Return the API key
  } else {
    echo "No API key found for '" . $nama . "'.";
    return null;
  }
}

// Fetching Google Maps API key
$api_key = getApiKey($koneksi, 'Google Maps API');

// Fetching WhatsApp Fontte API key
$api_whatsapp = getApiKey($koneksi, 'WhatsApp Fonnte API');

?>


<!doctype html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIPENJALU</title>
  <script>
    (function() {
      const savedTheme = localStorage.getItem('sipenjalu-theme');
      document.documentElement.setAttribute('data-theme', savedTheme ? savedTheme : 'dark');
    })();
  </script>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            // Modern Gen Z color palette
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
              950: '#082f49',
            },
            secondary: {
              50: '#fdf4ff',
              100: '#fae8ff',
              200: '#f5d0fe',
              300: '#f0abfc',
              400: '#e879f9',
              500: '#d946ef',
              600: '#c026d3',
              700: '#a21caf',
              800: '#86198f',
              900: '#701a75',
              950: '#4a044e',
            },
            accent: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12',
              950: '#431407',
            },
            // Dark theme colors - more modern and vibrant
            dark: {
              50: '#fafafa',
              100: '#f4f4f5',
              200: '#e4e4e7',
              300: '#d4d4d8',
              400: '#a1a1aa',
              500: '#71717a',
              600: '#52525b',
              700: '#3f3f46',
              800: '#27272a',
              900: '#18181b',
              950: '#09090b',
            },
            // Background gradients
            bg: {
              primary: '#0a0a0a',
              secondary: '#111111',
              tertiary: '#1a1a1a',
              accent: '#2a2a2a',
            },
            // Text colors
            text: {
              primary: '#ffffff',
              secondary: '#f5f5f5',
              tertiary: '#d4d4d8',
              muted: '#a1a1aa',
            }
          },
          fontFamily: {
            'sans': ['Inter', 'system-ui', 'sans-serif'],
            'display': ['Sora', 'system-ui', 'sans-serif'],
            'mono': ['JetBrains Mono', 'monospace'],
          },
          animation: {
            'fade-in': 'fadeIn 0.5s ease-in-out',
            'slide-up': 'slideUp 0.3s ease-out',
            'bounce-subtle': 'bounceSubtle 2s infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            slideUp: {
              '0%': { transform: 'translateY(10px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            },
            bounceSubtle: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-5px)' },
            },
          },
          boxShadow: {
            'glow': '0 0 20px rgba(14, 165, 233, 0.3)',
            'glow-purple': '0 0 20px rgba(217, 70, 239, 0.3)',
            'glow-orange': '0 0 20px rgba(249, 115, 22, 0.3)',
          }
        }
      }
    }
  </script>

  <!-- my css -->
  <link rel="stylesheet" href="assets/css/style1.css">
  <link rel="stylesheet" href="assets/css/label.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <!-- Include DataTables CSS and JS -->
  <link href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

  <!-- Include DataTables Buttons CSS and JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

</head>

<body class="bg-gradient-to-br from-bg-primary via-bg-secondary to-bg-tertiary min-h-screen font-sans antialiased text-text-primary">
  <nav class="fixed top-0 left-0 right-0 z-50 bg-bg-secondary/90 backdrop-blur-xl border-b border-dark-700/50 shadow-2xl" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a class="flex items-center space-x-3 font-bold text-white hover:text-primary-400 transition-colors" href="index">
          <img src="assets/img/tittle.png" alt="Logo" width="32" height="32" class="rounded-lg">
          <span id="text-brand" class="text-xl font-display tracking-wide">SIPENJALU</span>
        </a>

        <div class="hidden md:flex items-center space-x-8">
          <div class="flex items-center space-x-6">

            <?php if ($data_level == "Administrator" || $data_level == "Petugas" || $data_level == "Pengadu") : ?>
              <a href="index" class="text-dark-200 hover:text-white transition-colors font-medium">Dashboard</a>
            <?php endif; ?>

            <?php if ($data_level == "Administrator") : ?>
              <div class="relative group">
                <button class="text-dark-200 hover:text-white transition-colors font-medium flex items-center space-x-1">
                  <span>Master Data</span>
                  <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-48 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                  <a href="?page=api" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-t-lg">Data API</a>
                  <a href="?page=jenis_view" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-b-lg">Jenis Pengaduan</a>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($data_level == "Administrator" || $data_level == "Petugas") :  ?>
              <div class="relative group">
                <button class="text-dark-200 hover:text-white transition-colors font-medium flex items-center space-x-1">
                  <span>Pengaduan</span>
                  <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-48 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                  <a href="?page=aduan_admin_semua" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-t-lg">Semua Aduan</a>
                  <a href="?page=aduan_admin" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700">Aduan Menunggu</a>
                  <a href="?page=aduan_admin_tanggap" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700">Aduan Ditanggapi</a>
                  <a href="?page=aduan_admin_selesai" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-b-lg">Aduan Selesai</a>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($data_level == "Pengadu") :  ?>
              <div class="relative group">
                <button class="text-dark-200 hover:text-white transition-colors font-medium flex items-center space-x-1">
                  <span>Pengaduan</span>
                  <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-48 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                  <a href="?page=aduan_tambah" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-t-lg">Tambah Aduan</a>
                  <a href="?page=aduan_view" class="block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-b-lg">Lihat Aduan</a>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($data_level == "Administrator") : ?>
              <a href="?page=user_data" class="text-dark-200 hover:text-white transition-colors font-medium">Pengguna</a>
            <?php endif; ?>
          </div>

          <div class="flex items-center space-x-4">
            <span class="text-dark-400 text-sm">
              <?php echo htmlspecialchars($data_nama); ?> <span class="text-primary-400">(<?php echo htmlspecialchars($data_level); ?>)</span>
            </span>

            <?php if ($data_level == "Administrator" || $data_level == "Petugas") : ?>
              <a href="?page=logout" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors">LOGOUT</a>
            <?php endif; ?>

            <?php if ($data_level == "Pengadu") : ?>
              <a href="?page=logout" class="border border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-4 py-2 rounded-lg font-semibold transition-colors">KELUAR</a>
            <?php endif; ?>
          </div>
        </div>

        <!-- Mobile menu button -->
        <button class="md:hidden text-white p-2 rounded-lg hover:bg-dark-800 transition-colors" id="mobile-menu-button">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <!-- Mobile menu -->
      <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-bg-tertiary/95 backdrop-blur-xl rounded-lg mt-2 border border-dark-700 shadow-2xl">
          <?php if ($data_level == "Administrator" || $data_level == "Petugas" || $data_level == "Pengadu") : ?>
            <a href="index" class="block px-3 py-2 text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg transition-colors">Dashboard</a>
          <?php endif; ?>

          <?php if ($data_level == "Administrator") : ?>
            <div class="space-y-1">
              <div class="px-3 py-2 text-dark-400 text-sm font-medium">Master Data</div>
              <a href="?page=api" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Data API</a>
              <a href="?page=jenis_view" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Jenis Pengaduan</a>
            </div>
          <?php endif; ?>

          <?php if ($data_level == "Administrator" || $data_level == "Petugas") :  ?>
            <div class="space-y-1">
              <div class="px-3 py-2 text-dark-400 text-sm font-medium">Pengaduan</div>
              <a href="?page=aduan_admin_semua" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Semua Aduan</a>
              <a href="?page=aduan_admin" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Aduan Menunggu</a>
              <a href="?page=aduan_admin_tanggap" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Aduan Ditanggapi</a>
              <a href="?page=aduan_admin_selesai" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Aduan Selesai</a>
            </div>
          <?php endif; ?>

          <?php if ($data_level == "Pengadu") :  ?>
            <div class="space-y-1">
              <div class="px-3 py-2 text-dark-400 text-sm font-medium">Pengaduan</div>
              <a href="?page=aduan_tambah" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Tambah Aduan</a>
              <a href="?page=aduan_view" class="block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg">Lihat Aduan</a>
            </div>
          <?php endif; ?>

          <?php if ($data_level == "Administrator") : ?>
            <a href="?page=user_data" class="block px-3 py-2 text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg transition-colors">Pengguna</a>
          <?php endif; ?>

          <div class="border-t border-dark-700 mt-3 pt-3">
            <div class="px-3 py-2 text-dark-400 text-sm">
              <?php echo htmlspecialchars($data_nama); ?> <span class="text-primary-400">(<?php echo htmlspecialchars($data_level); ?>)</span>
            </div>
            <?php if ($data_level == "Administrator" || $data_level == "Petugas") : ?>
              <a href="?page=logout" class="block mx-3 mt-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold text-center transition-colors">LOGOUT</a>
            <?php endif; ?>
            <?php if ($data_level == "Pengadu") : ?>
              <a href="?page=logout" class="block mx-3 mt-2 border border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-4 py-2 rounded-lg font-semibold text-center transition-colors">KELUAR</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="fixed top-4 right-4 z-40">
    <button class="bg-dark-800/80 backdrop-blur-sm border border-dark-600 text-dark-200 hover:text-white p-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105" type="button" id="themeToggle" aria-label="Toggle theme">
      <i class="fas fa-moon text-lg"></i>
    </button>
  </div>

  <main class="pt-20 pb-8 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-gradient-to-br from-bg-tertiary/80 to-bg-accent/60 backdrop-blur-xl border border-dark-700/50 rounded-2xl shadow-2xl overflow-hidden">
        <div class="p-8 md:p-12">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl mb-6 shadow-lg">
              <img src="assets/img/tittle.png" alt="Logo" class="w-12 h-12" />
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-white mb-4 tracking-tight">
              Dashboard <span class="text-primary-400">SIPENJALU</span>
            </h1>
            <p class="text-dark-300 text-lg">
              Selamat datang, <span class="text-white font-semibold"><?php echo htmlspecialchars($data_nama); ?></span>
              <span class="text-primary-400"> (<?php echo htmlspecialchars($data_level); ?>)</span>
            </p>
          </div>

              <?php
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

              // Include the appropriate file based on the request, or go to the default page based on user level.
              if (isset($pageMap[$hal])) {
                include $pageMap[$hal];
              } elseif (isset($defaultPages[$data_level])) {
                include $defaultPages[$data_level];
              } else {
                echo "<center><h1> ERROR !</h1></center>";
              }

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-dark-700/50 bg-bg-secondary/30 backdrop-blur-sm mt-auto" id="footer">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
      <div class="text-center">
        <p class="text-dark-400 text-sm">
          Copyright &copy; <span class="text-primary-400 font-semibold">SIPENJALU</span> 2024 All rights reserved
        </p>
      </div>
    </div>
  </footer>
  <!-- End -->

  <!-- Scripts -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    (function() {
      const root = document.documentElement;
      const toggle = document.getElementById('themeToggle');
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      function updateIcon(theme) {
        const icon = theme === 'dark' ? 'fa-sun' : 'fa-moon';
        toggle.innerHTML = '<i class="fas ' + icon + ' text-lg"></i>';
      }

      // Theme toggle
      if (toggle) {
        updateIcon(root.getAttribute('data-theme'));
        toggle.addEventListener('click', function() {
          const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
          root.setAttribute('data-theme', nextTheme);
          localStorage.setItem('sipenjalu-theme', nextTheme);
          updateIcon(nextTheme);
        });
      }

      // Mobile menu toggle
      if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
          if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
          }
        });
      }

      // Simple modal system
      window.showModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.classList.remove('hidden');
          document.body.classList.add('overflow-hidden');
        }
      };

      window.hideModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      };

      // Close modal when clicking overlay
      document.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal-overlay')) {
          event.target.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      });
    })();
  </script>

</body>

</html>