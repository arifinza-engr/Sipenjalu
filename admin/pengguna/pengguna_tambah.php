<div class="max-w-4xl mx-auto">
  <div class="bg-gradient-to-br from-bg-tertiary/80 to-bg-accent/60 backdrop-blur-xl border border-dark-700/50 rounded-2xl shadow-2xl overflow-hidden">
    <div class="bg-gradient-to-r from-primary-500/20 to-primary-600/20 border-b border-dark-700/50 px-6 py-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-primary-500/20 rounded-xl flex items-center justify-center">
          <i class="fas fa-plus text-primary-400"></i>
        </div>
        <h2 class="text-xl font-semibold text-white">Tambah Pengguna</h2>
      </div>
    </div>

    <div class="p-6">
      <form method="POST" class="space-y-6">
        <div class="space-y-2">
          <label for="nama_pengguna" class="block text-sm font-medium text-text-secondary">Nama Pengguna</label>
          <input type="text" class="input w-full" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama pengguna" required>
        </div>

        <div class="space-y-2">
          <label for="username" class="block text-sm font-medium text-text-secondary">Username</label>
          <input type="text" class="input w-full" id="username" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="space-y-2">
          <label for="password" class="block text-sm font-medium text-text-secondary">Password</label>
          <input type="password" class="input w-full" id="password" name="password" placeholder="Masukkan password" required>
        </div>

        <div class="space-y-2">
          <label for="level" class="block text-sm font-medium text-text-secondary">Level</label>
          <select name="level" class="input w-full" id="level" required>
            <option value="">- Pilih Level -</option>
            <option value="Petugas">Petugas</option>
            <option value="Administrator">Administrator</option>
          </select>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-4">
          <button type="submit" name="Simpan" class="btn btn-default flex-1 sm:flex-none">
            <i class="fas fa-save mr-2"></i>
            Simpan
          </button>
          <a href="?page=user_data" class="btn btn-outline flex-1 sm:flex-none">
            <i class="fas fa-times mr-2"></i>
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</div>


<?php

if (isset($_POST['Simpan'])) {

  $sql_simpan = "INSERT INTO tb_pengguna (id_pengguna,nama_pengguna,username,password,level,grup) VALUES (
        UUID(),
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['username'] . "',
		'" . $_POST['password'] . "',
		'" . $_POST['level'] . "',
        'A')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  if ($query_simpan) {
    echo "<script>
            Swal.fire({title: 'Tambah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index.php?page=user_data';
                }
            })</script>";
  } else {
    echo "<script>
            Swal.fire({title: 'Tambah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index.php?page=user_data';
                }
            })</script>";
  }
}
?>
<!-- end -->