<?php
if(isset($_GET['kode'])){
            $stmt = $koneksi->prepare("DELETE FROM tb_jenis WHERE id_jenis=?");
            $stmt->bind_param("s", $_GET['kode']);
            $query_hapus = $stmt->execute();
            $stmt->close();

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index.php?page=jenis_view';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index.php?page=jenis_view';
                    }
                })</script>";
            }
        }

?>

<!-- end -->