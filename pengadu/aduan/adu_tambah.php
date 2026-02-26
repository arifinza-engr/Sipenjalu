<?php
$author = $userData['id'];

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
  return $response;
}

?>

<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-8">
  <div class="max-w-2xl mx-auto">
    <div class="bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-8">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Tambah Aduan</h2>
        <p class="text-white/70">Isi formulir untuk mengirim pengaduan baru</p>
      </div>
      <form method="POST" enctype="multipart/form-data" class="space-y-6">
        <div>
          <label class="block text-white font-medium mb-2">Nama Anda</label>
          <input type="text" class="w-full bg-white/10 border border-white/20 text-white placeholder-white/50 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary-500" name="judul" id="judul" placeholder="Masukan Nama Anda" required>
        </div>
        <div>
          <label class="block text-white font-medium mb-2">No Hp/Whatsapp</label>
          <input type="text" class="w-full bg-white/10 border border-white/20 text-white placeholder-white/50 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary-500" name="no_telpon" id="no_telpon" placeholder="Masukan Nomor Aktif" required>
        </div>
        <div>
          <label class="block text-white font-medium mb-2">Jenis Aduan</label>
          <select name="jenis" class="w-full bg-white/10 border border-white/20 text-white rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary-500" id="jenis">
            <option value="" class="bg-slate-800">- Pilih -</option>
            <?php
            // ambil data dari database
            $query = "select * from tb_jenis";
            $hasil = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($hasil)) {
            ?>
              <option value="<?php echo $row['id_jenis'] ?>" class="bg-slate-800">
                <?php echo $row['jenis'];  ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <label class="block text-white font-medium mb-2">Lokasi</label>
          <button type="button" class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-lg transition-colors" data-bs-toggle="modal" data-bs-target="#mapModal">Pilih Lokasi</button>
          <input type="hidden" id="hiddenLat" name="lat">
          <input type="hidden" id="hiddenLng" name="lng">
        </div>
        <div>
          <label class="block text-white font-medium mb-2">Keterangan</label>
          <textarea class="w-full bg-white/10 border border-white/20 text-white placeholder-white/50 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary-500 resize-none" name="keterangan" id="keterangan" rows="4" placeholder="Keterangan Aduan" required></textarea>
        </div>
        <div>
          <label class="block text-white font-medium mb-2">Foto</label>
          <input type="file" class="w-full bg-white/10 border border-white/20 text-white rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary-500 file:bg-primary-500 file:text-white file:border-none file:rounded file:px-3 file:py-1 file:mr-3" name="foto" id="foto" required>
        </div>
        <div class="flex gap-4">
          <input type="submit" name="Simpan" value="Simpan" class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-lg transition-colors flex-1">
          <a href="?page=aduan_view" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors flex-1 text-center">Batal</a>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="saveMarkerData()">Simpan</button>
          <button type="button" class="btn btn-info" onclick="moveToCurrentLocation()">Lokasi Saya</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var map;
  var currentMarker;
  var savedMarkerData = null; // Untuk menyimpan data marker sementara

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: -7.010283,
        lng: 110.389072
      },
      zoom: 8
    });

    google.maps.event.addListener(map, 'rightclick', function(event) {
      placeMarker(event.latLng);
    });

    var longpressTimer;
    var startPressTime;

    google.maps.event.addListener(map, 'mousedown', function(event) {
      startPressTime = new Date().getTime();
      longpressTimer = setTimeout(function() {
        placeMarker(event.latLng);
      }, 1000);
    });

    google.maps.event.addListener(map, 'mouseup', function(event) {
      clearTimeout(longpressTimer);
    });

    google.maps.event.addListener(map, 'mousemove', function(event) {
      clearTimeout(longpressTimer);
    });
  }

  function placeMarker(location) {
    if (currentMarker) {
      currentMarker.setMap(null);
    }
    currentMarker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

  function saveMarkerData() {
    var markerData = getMarkerData();
    if (markerData) {
      document.getElementById('hiddenLat').value = markerData.lat;
      document.getElementById('hiddenLng').value = markerData.lng;

      Swal.fire({
        title: 'Success!',
        text: 'Data saved.',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    } else {
      Swal.fire({
        title: 'Error!',
        text: 'No marker to save.',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }
  }


  function submitMarkerData() {
    if (savedMarkerData) {
      // Add the 'method: "POST"' line to specify that this is a POST request.
      fetch('<?php echo $_SERVER['PHP_SELF']; ?>', {
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `lat=${savedMarkerData.lat}&lng=${savedMarkerData.lng}`
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch((error) => {
          console.error('Fetch Error:', error);
        });
    } else {
      alert("No marker data to submit.");
    }
  }

  function getMarkerData() {
    if (currentMarker) {
      var position = currentMarker.getPosition();
      return {
        lat: position.lat(),
        lng: position.lng()
      };
    }
    return null;
  }

  function moveToCurrentLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map.setCenter(pos);
        placeMarker(pos);
      }, function() {
        handleLocationError(true);
      });
    } else {
      handleLocationError(false);
    }
  }

  function handleLocationError(browserHasGeolocation) {
    alert(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
  }

  $('#mapModal').on('shown.bs.modal', function() {
    google.maps.event.trigger(map, "resize");
    moveToCurrentLocation();
  });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkyPyVxHBaWGGsJgiQDe0ttKfhE1zzDZ0&callback=initMap"></script>


<?php


if (isset($_POST['Simpan'])) {
  // Collect form data
  $aduan = $_POST['judul'];
  $no_telp = $_POST['no_telpon'];
  $lat = $_POST['lat'];  // Menerima latitude dari form
  $lng = $_POST['lng'];  // Menerima longitude dari form

  $sumber = $_FILES['foto']['tmp_name'];
  $nama_file = $_FILES['foto']['name'];
  $pindah = move_uploaded_file($sumber, 'foto/' . $nama_file);

  $stmt = $koneksi->prepare("INSERT INTO tb_pengaduan (`judul`, `no_telpon`, `jenis`, `keterangan`, `foto`, `author`, `lat`, `lng`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

  // Removed $alamat from bind_param
  $stmt->bind_param("ssssssss", $aduan, $no_telp, $_POST['jenis'], $_POST['keterangan'], $nama_file, $author, $lat, $lng);

  // Fungsi untuk mendapatkan semua nomor dari kolom wahatsapp user
  function getAllWhatsappNumbers($koneksi)
  {
    $numbers = [];
    $sql = $koneksi->query("SELECT whatsapp FROM tb_pengguna");
    while ($row = $sql->fetch_assoc()) {
      $numbers[] = $row['whatsapp'];
    }
    return implode(',', $numbers); // Menggabungkan semua nomor dengan koma sebagai pemisah
  }

  $query_simpan = $stmt->execute();

  if ($query_simpan) {
    echo "<script>
        Swal.fire({
            title: 'Tambah Sukses',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php?page=aduan_view';
            }
        });
    </script>";

    // Send messages
    $token_wa = "$api_whatsapp";
    $wa_admin = getAllWhatsappNumbers($koneksi);
    $messageAdmin = "INFO PENGADUAN PENERANGAN JALAN UMUM

Nama Pengirim : $aduan
Alamat              : https://www.google.com/maps/place/$lat,$lng
Nomor Telpon   : $no_telp 

Memerlukan penanganan Terimakasih.";
    sendMessage($token_wa, $wa_admin, $messageAdmin);

    $messageUser = "INFO PENGADUAN PENERANGAN JALAN UMUM

Halo $aduan !!!
Terimakasih telah menghubungi kami
Kami akan segera menangani aduan anda
Tunggu pemberitahuan selanjutnya dari kami

Terimakasih.";
    sendMessage($token_wa, $no_telp, $messageUser);
  } else {
    echo "<script>
        Swal.fire({
            title: 'Tambah Gagal',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php?page=aduan_view';
            }
        });
    </script>";
  }
}
?>

<!-- end -->