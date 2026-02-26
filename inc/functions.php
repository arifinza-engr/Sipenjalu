<?php

// Constants for API names
const GOOGLE_MAPS_API = 'Google Maps API';
const WHATSAPP_FONTE_API = 'WhatsApp Fonnte API';

// Function to get API key from database
function getApiKey($koneksi, $nama) {
    $sql = "SELECT kunci FROM tb_kunciapi WHERE nama = ?";
    $stmt = $koneksi->prepare($sql);

    if (!$stmt) {
        error_log("Failed to prepare statement for API key: " . $koneksi->error);
        return null;
    }

    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["kunci"];
    }

    error_log("No API key found for '" . $nama . "'.");
    return null;
}

// Function to get user session data
function getUserSessionData() {
    if (empty($_SESSION['ses_nama'])) {
        header("location: login");
        exit();
    }

    return [
        'id' => $_SESSION["ses_id"],
        'nama' => $_SESSION["ses_nama"],
        'level' => $_SESSION["ses_level"],
        'grup' => $_SESSION["ses_grup"]
    ];
}

// Function to generate navigation menu items based on user level
function getNavigationMenu($userLevel) {
    $menu = [
        'dashboard' => ['label' => 'Dashboard', 'url' => 'index', 'roles' => ['Administrator', 'Petugas', 'Pengadu']],
        'master_data' => [
            'label' => 'Master Data',
            'roles' => ['Administrator'],
            'submenu' => [
                ['label' => 'Data API', 'url' => '?page=api'],
                ['label' => 'Jenis Pengaduan', 'url' => '?page=jenis_view']
            ]
        ],
        'pengaduan' => [
            'label' => 'Pengaduan',
            'submenu' => []
        ],
        'pengguna' => ['label' => 'Pengguna', 'url' => '?page=user_data', 'roles' => ['Administrator']]
    ];

    // Configure pengaduan submenu based on role
    if (in_array($userLevel, ['Administrator', 'Petugas'])) {
        $menu['pengaduan']['submenu'] = [
            ['label' => 'Semua Aduan', 'url' => '?page=aduan_admin_semua'],
            ['label' => 'Aduan Menunggu', 'url' => '?page=aduan_admin'],
            ['label' => 'Aduan Ditanggapi', 'url' => '?page=aduan_admin_tanggap'],
            ['label' => 'Aduan Selesai', 'url' => '?page=aduan_admin_selesai']
        ];
        $menu['pengaduan']['roles'] = ['Administrator', 'Petugas'];
    } elseif ($userLevel === 'Pengadu') {
        $menu['pengaduan']['submenu'] = [
            ['label' => 'Tambah Aduan', 'url' => '?page=aduan_tambah'],
            ['label' => 'Lihat Aduan', 'url' => '?page=aduan_view']
        ];
        $menu['pengaduan']['roles'] = ['Pengadu'];
    }

    return $menu;
}

// Function to render navigation menu HTML
function renderNavigationMenu($menu, $userLevel, $isMobile = false) {
    $output = '';

    foreach ($menu as $key => $item) {
        if (!isset($item['roles']) || !in_array($userLevel, $item['roles'])) {
            continue;
        }

        if (isset($item['submenu'])) {
            $output .= renderDropdownMenu($item, $isMobile);
        } else {
            $output .= renderMenuLink($item, $isMobile);
        }

        // Add spacing for desktop
        if (!$isMobile) {
            $output .= "\n";
        }
    }

    return $output;
}

// Helper function to render dropdown menu
function renderDropdownMenu($item, $isMobile) {
    if ($isMobile) {
        // For mobile: show label and submenu items directly
        $output = "<div class=\"space-y-1\">";
        $output .= "<div class=\"px-3 py-2 text-dark-400 text-sm font-medium\">{$item['label']}</div>";

        foreach ($item['submenu'] as $subItem) {
            $output .= "<a href=\"{$subItem['url']}\" class=\"block px-6 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg\">{$subItem['label']}</a>";
        }

        $output .= "</div>";
        return $output;
    }

    // For desktop: dropdown with button
    $output = "<div class=\"relative group\">";
    $output .= "<button class=\"text-dark-200 hover:text-white transition-colors font-medium flex items-center space-x-1\">";
    $output .= "<span>{$item['label']}</span>";
    $output .= "<i class=\"fas fa-chevron-down text-xs\"></i>";
    $output .= "</button>";
    $output .= "<div class=\"absolute top-full left-0 mt-2 w-48 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200\">";

    foreach ($item['submenu'] as $index => $subItem) {
        $roundedClass = $index === 0 ? 'rounded-t-lg' : ($index === count($item['submenu']) - 1 ? 'rounded-b-lg' : '');
        $output .= "<a href=\"{$subItem['url']}\" class=\"block px-4 py-2 text-sm text-dark-200 hover:text-white hover:bg-dark-700 $roundedClass\">{$subItem['label']}</a>";
    }

    $output .= "</div></div>";
    return $output;
}

// Helper function to render simple menu link
function renderMenuLink($item, $isMobile) {
    $class = $isMobile
        ? 'block px-3 py-2 text-dark-200 hover:text-white hover:bg-dark-700 rounded-lg transition-colors'
        : 'text-dark-200 hover:text-white transition-colors font-medium';

    return "<a href=\"{$item['url']}\" class=\"$class\">{$item['label']}</a>";
}

// Function to render user info and logout
function renderUserSection($userData, $isMobile = false) {
    $userName = htmlspecialchars($userData['nama']);
    $userLevel = htmlspecialchars($userData['level']);

    $userInfo = "<span class=\"text-dark-400 text-sm\">$userName <span class=\"text-primary-400\">($userLevel)</span></span>";

    $logoutClass = in_array($userData['level'], ['Administrator', 'Petugas'])
        ? 'bg-red-600 hover:bg-red-700 text-white'
        : 'border border-red-600 text-red-400 hover:bg-red-600 hover:text-white';

    $logoutText = $userData['level'] === 'Pengadu' ? 'KELUAR' : 'LOGOUT';
    $logoutLink = "<a href=\"?page=logout\" class=\"$logoutClass px-4 py-2 rounded-lg font-semibold transition-colors\">$logoutText</a>";

    if ($isMobile) {
        return "
            <div class=\"border-t border-dark-700 mt-3 pt-3\">
                <div class=\"px-3 py-2 text-dark-400 text-sm\">$userInfo</div>
                <div class=\"px-3\">$logoutLink</div>
            </div>
        ";
    }

    return "
        <div class=\"flex items-center space-x-4\">
            $userInfo
            $logoutLink
        </div>
    ";
}

?>