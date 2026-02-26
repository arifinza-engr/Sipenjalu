<?php
if(isset($_GET['kode'])){
            $stmt1 = $koneksi->prepare("DELETE FROM tb_pengadu WHERE id_pengadu=?");
            $stmt1->bind_param("s", $_GET['kode']);
            $query_hapus = $stmt1->execute();
            $stmt1->close();

            $stmt2 = $koneksi->prepare("DELETE FROM tb_pengguna WHERE id_pengguna=?");
            $stmt2->bind_param("s", $_GET['kode']);
            $query_del = $stmt2->execute();
            $stmt2->close();

            if ($query_hapus && $query_del) {
                echo "<script>
                Swal.fire({title: 'Hapus Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index.php?page=pengadu_view';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index.php?page=pengadu_view';
                    }
                })</script>";
            }
        }

?>

<!-- end -->