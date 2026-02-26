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

  /* ── Header ── */
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

  .export-btn {
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

  .export-btn:hover {
    background: linear-gradient(135deg, #1f4a96, #142e68);
    color: white;
    box-shadow: 0 0 20px rgba(45, 125, 247, 0.35);
    transform: translateY(-1px);
  }

  /* ── Body ── */
  .aduan-body {
    padding: 1.5rem 2rem;
  }

  /* DataTable controls */
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

  /* ── Table ── */
  #semuaAduan {
    border-collapse: separate;
    border-spacing: 0;
    width: 100% !important;
  }

  #semuaAduan thead tr th {
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

  #semuaAduan thead tr th:first-child {
    border-radius: 10px 0 0 10px;
  }

  #semuaAduan thead tr th:last-child {
    border-radius: 0 10px 10px 0;
  }

  #semuaAduan tbody tr td {
    padding: 0.85rem 1rem;
    border: none;
    border-bottom: 1px solid var(--border);
    font-size: 0.86rem;
    color: var(--text-primary);
    vertical-align: middle;
    transition: background 0.15s;
  }

  #semuaAduan tbody tr:hover td {
    background: var(--bg-row-hover);
  }

  #semuaAduan tbody tr:last-child td {
    border-bottom: none;
  }

  /* ── Cells ── */
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

  .jenis-chip {
    display: inline-block;
    padding: 0.28rem 0.75rem;
    background: rgba(45, 125, 247, 0.12);
    color: var(--accent-bright);
    border: 1px solid rgba(45, 125, 247, 0.25);
    border-radius: 20px;
    font-size: 0.76rem;
    font-weight: 600;
  }

  .address-link {
    color: var(--accent-bright);
    text-decoration: none;
    font-size: 0.81rem;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    opacity: 0.9;
    transition: opacity 0.15s;
  }

  .address-link:hover {
    opacity: 1;
    text-decoration: underline;
  }

  .foto-thumb {
    width: 58px;
    height: 58px;
    object-fit: cover;
    border-radius: 9px;
    border: 1px solid var(--border-glow);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
  }

  .foto-thumb:hover {
    transform: scale(1.07);
    box-shadow: 0 0 14px var(--accent-glow);
  }

  /* ── Status badges ── */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0.32rem 0.82rem;
    border-radius: 20px;
    font-size: 0.75rem;
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

  /* ── Action button ── */
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

  /* ── Pagination ── */
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
        <i class="fas fa-inbox"></i>
      </div>
      <div>
        <h5>Data Aduan</h5>
        <p>Kelola seluruh laporan pengaduan masuk</p>
      </div>
    </div>
    <a href="#" class="export-btn" id="export-excel">
      <i class="fas fa-file-excel"></i> Export Excel
    </a>
  </div>

  <!-- Body -->
  <div class="aduan-body">
    <div class="table-responsive">
      <table class="table" id="semuaAduan">
        <thead>
          <tr>
            <th>No</th>
            <th>Pengadu</th>
            <th>No Telp</th>
            <th>Jenis</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          function get_address_from_latlng($lat, $lng, $api_key)
          {
            $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
            $json_data = file_get_contents($url);
            $result = json_decode($json_data, TRUE);
            return $result['results'][0]['formatted_address'] ?? 'Alamat tidak ditemukan';
          }

          $no = 1;
          $query = "SELECT a.id_pengaduan, a.judul, a.no_telpon, a.foto, a.lat, a.lng, a.status, j.jenis, p.nama_pengadu, p.no_hp 
                    FROM tb_pengaduan a 
                    JOIN tb_jenis j ON a.jenis=j.id_jenis 
                    JOIN tb_pengadu p ON a.author=p.id_pengadu";
          $result = $koneksi->query($query);

          while ($row = $result->fetch_assoc()) {
            $status = $row['status'];

            $badgeClass = 'status-menunggu';
            $labelText  = 'Menunggu';

            if ($status === 'Proses') {
              $badgeClass = 'status-menunggu';
              $labelText  = 'Menunggu';
            } elseif ($status === 'Tanggapi') {
              $badgeClass = 'status-proses';
              $labelText  = 'Dalam Proses';
            } elseif ($status === 'Selesai') {
              $badgeClass = 'status-selesai';
              $labelText  = 'Selesai';
            }

            $address     = get_address_from_latlng($row['lat'], $row['lng'], $api_key);
            $imgSrc      = "foto/{$row['foto']}";
            $manageLink  = "?page=aduan_kelola&kode={$row['id_pengaduan']}";
            $shortAddr   = mb_strimwidth($address, 0, 35, '...');

            echo "<tr>";
            echo "<td class='text-center'><span class='no-badge'>{$no}</span></td>";
            echo "<td><div class='name-cell'><strong>{$row['nama_pengadu']}</strong><span class='sub-text'>{$row['judul']}</span></div></td>";
            echo "<td><span class='phone-text'>{$row['no_telpon']}</span></td>";
            echo "<td><span class='jenis-chip'>{$row['jenis']}</span></td>";
            echo "<td><a href='https://www.google.com/maps/place/{$row['lat']},{$row['lng']}' target='_blank' class='address-link'><i class='fas fa-map-marker-alt'></i> {$shortAddr}</a></td>";
            echo "<td class='text-center'><img src='{$imgSrc}' class='foto-thumb' /></td>";
            echo "<td><span class='status-badge {$badgeClass}'>{$labelText}</span></td>";
            echo "<td><a href='{$manageLink}' class='aksi-btn'><i class='fas fa-pen'></i> Tanggapi</a></td>";
            echo "</tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    var table = $('#semuaAduan').DataTable({
      dom: 'frtip',
      language: {
        search: '',
        searchPlaceholder: '🔍  Cari aduan...',
        lengthMenu: 'Tampilkan _MENU_ data',
        info: 'Menampilkan _START_–_END_ dari _TOTAL_ aduan',
        paginate: {
          previous: '←',
          next: '→'
        }
      },
      buttons: [{
        extend: 'excel',
        text: 'Export Excel',
        title: 'Daftar Semua Aduan'
      }]
    });

    $('#export-excel').on('click', function(e) {
      e.preventDefault();
      table.button('.buttons-excel').trigger();
    });
  });
</script>