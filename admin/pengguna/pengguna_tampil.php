<div class="max-w-7xl mx-auto">
  <div class="bg-gradient-to-br from-bg-tertiary/80 to-bg-accent/60 backdrop-blur-xl border border-dark-700/50 rounded-2xl shadow-2xl overflow-hidden">
    <div class="bg-gradient-to-r from-primary-500/20 to-primary-600/20 border-b border-dark-700/50 px-6 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-primary-500/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-book text-primary-400"></i>
          </div>
          <h2 class="text-xl font-semibold text-white">Data Pengguna</h2>
        </div>
        <a href="?page=pengguna_tambah" class="btn btn-default">
          <i class="fas fa-plus mr-2"></i>
          Tambah Pengguna
        </a>
      </div>
    </div>

    <div class="p-6">
      <div class="overflow-x-auto">
        <table class="w-full" id="user">
          <thead>
            <tr class="border-b border-dark-700/50">
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">No</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Nama</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Username</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Password</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Whatsapp</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Level</th>
              <th class="text-left py-3 px-4 text-sm font-semibold text-text-secondary">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-dark-700/30">
            <?php
            $no = 1;
            $sql = $koneksi->query("select * from tb_pengguna order by grup asc");
            while ($data = $sql->fetch_assoc()) {
              if ($data['nama_pengguna'] != "Masyarakat") {
            ?>
                <tr class="hover:bg-dark-700/20 transition-colors">
                  <td class="py-3 px-4 text-sm text-text-primary"><?php echo $no++; ?></td>
                  <td class="py-3 px-4 text-sm text-text-primary font-medium"><?php echo $data['nama_pengguna']; ?></td>
                  <td class="py-3 px-4 text-sm text-text-primary"><?php echo $data['username']; ?></td>
                  <td class="py-3 px-4 text-sm text-text-muted font-mono"><?php echo str_repeat("*", strlen($data['password'])); ?></td>
                  <td class="py-3 px-4 text-sm text-text-primary"><?php echo $data['whatsapp']; ?></td>
                  <td class="py-3 px-4 text-sm">
                    <span class="badge badge-default"><?php echo $data['level']; ?></span>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex items-center space-x-2">
                      <?php $grup = $data['grup']; ?>
                      <?php if ($grup == "A") { ?>
                        <a href="?page=pengguna_ubah&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-secondary p-2">
                          <i class="fas fa-edit text-xs"></i>
                        </a>
                        <a href="?page=pengguna_hapus&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus pengguna ini ?')" title="Hapus" class="btn btn-destructive p-2">
                          <i class="fas fa-trash text-xs"></i>
                        </a>
                      <?php } else { ?>
                        <a href="?page=pedu_ubah&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-secondary p-2">
                          <i class="fas fa-edit text-xs"></i>
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
</div>
<script>
  $(document).ready(function() {
    var table = $('#user').DataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        text: 'Export to Excel',
        title: 'Data Pengguna',
        className: 'bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors'
      }],
    });
  });
</script>