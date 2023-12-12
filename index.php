<?php

use Master\Menu;
use Master\pendaftaran;
use Master\pegawai;
use Master\admin;

include 'autoload.php';
include 'Config/Database.php';

$menu = new Menu();
$pendaftaran = new pendaftaran($dataKoneksi);
$pegawai = new pegawai($dataKoneksi);
$admin = new admin($dataKoneksi);
// $mahasiswa->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS OOP</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Pengolahan Data Uji Kompetensi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria- controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
foreach ($menu->topMenu() as $r) {
    ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                    <?php echo $r['Text']; ?>
                                </a>
                            </li>
                        <?php
}
?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
if (!isset($target) or $target == "home") {
    echo "Hai, Selamat Datang Di Beranda";
    // =========== start kontent pendaftaran ======================
} elseif ($target == "pendaftaran") {
    if ($act == "tambah_pendaftaran") {
        echo $pendaftaran->tambah();
    } elseif ($act == "simpan_pendaftaran") {
        if ($pendaftaran->simpan()) {
            echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=pendaftaran';
                        </script>";
        } else {
            echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=pendaftaran';
                        </script>";
        }
    } elseif ($act == "edit_pendaftaran") {
        $id = $_GET['id'];
        echo $pendaftaran->edit($id);
    } elseif ($act == "update_pendaftaran") {
        if ($pendaftaran->update()) {
            echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=pendaftaran';
                        </script>";
        } else {
            echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=pendaftaran';
                        </script>";
        }
    } elseif ($act == "delete_pendaftaran") {
        $id = $_GET['id'];
        if ($pendaftaran->delete($id)) {
            echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=pendaftaran';
                        </script>";
        } else {
            echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=pendaftaran';
                    </script>";
        }
    } else {
        echo $pendaftaran->index();
    }

    // pegawai
} elseif ($target == "pegawai") {
    if ($act == "tambah_pegawai") {
        echo $pegawai->tambah();
    } elseif ($act == "simpan_pegawai") {
        if ($pegawai->simpan()) {
            echo "<script>
                        alert('data sukses disimpan');
                        window.location.href='?target=pegawai';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=pegawai';
                    </script>";
        }
    } elseif ($act == "edit_pegawai") {
        $id = $_GET['id'];
        echo $pegawai->edit($id);
    } elseif ($act == "update_pegawai") {
        if ($pegawai->update()) {
            echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=pegawai';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=pegawai';
                    </script>";
        }
    } elseif ($act == "delete_pegawai") {
        $id = $_GET['id'];
        if ($pegawai->delete($id)) {
            echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=pegawai';
                    </script>";
        } else {
            echo "<script>
                    alert('data gagal dihapus');
                    window.location.href='?target=pegawai';
                </script>";
        }
    } else {
        echo $pegawai->index();
    }

    // admin
} elseif ($target == "admin") {
    if ($act == "tambah_admin") {
        echo $admin->tambah();
    } elseif ($act == "simpan_admin") {
        if ($admin->simpan()) {
            echo "<script>
                        alert('data sukses disimpan');
                        window.location.href='?target=admin';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=admin';
                    </script>";
        }
    } elseif ($act == "edit_admin") {
        $id = $_GET['id'];
        echo $admin->edit($id);
    } elseif ($act == "update_admin") {
        if ($admin->update()) {
            echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=admin';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=admin';
                    </script>";
        }
    } elseif ($act == "delete_admin") {
        $id = $_GET['id'];
        if ($admin->delete($id)) {
            echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=admin';
                    </script>";
        } else {
            echo "<script>
                    alert('data gagal dihapus');
                    window.location.href='?target=admin';
                </script>";
        }
    } else {
        echo $admin->index();
    }

    // no pengguna
} elseif ($target == 'pengguna') {

    echo "selamat datang di pengguna";
}
?>
    </div>
</div>
</body>
</html>