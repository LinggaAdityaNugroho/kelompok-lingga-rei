<?php
session_start();

include "../../../assets/function.php";
$air = new air;
$db = $air->connect();
$tipeUser = $air->tipeUser($_SESSION['username']);
$dtUser = $air->dataUser($_SESSION['username']);

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>window.location.replace('../index.php')</script>";
}

// echo "<strong> Halaman Dashboard </strong>";
// echo "<a href=logout.php > logout </a>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../../css/stylesadmin.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!--  -->
                        <?php
                        if ($tipeUser == "ADMIN") {
                        ?>
                            <a class="nav-link" href="index.php?p=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manajemen User
                            </a>
                            <a class="nav-link" href="index.php?p=lihatKomplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=lihatPemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=ubahData">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ubah Data
                            </a>
                        <?php
                        } elseif ($tipeUser == "PETUGAS") {
                        ?>
                            <a class="nav-link" href="index.php?p=inputMeter">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Input Meter
                            </a>
                            <a class="nav-link" href="index.php?p=lihatKomplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=ubahData">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ubah Data Meter
                            </a>
                            <a class="nav-link" href="index.php?p=lihatPemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian Warga
                            </a>
                            <a class="nav-link" href="index.php?p=jatuhTempo">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Jatuh Tempo
                            </a>
                        <?php
                        } elseif ($tipeUser == "BENDAHARA") {
                        ?>
                            <a class="nav-link" href="index.php?p=lihatKomplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=lihatPemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian Warga
                            </a>
                            <a class="nav-link" href="index.php?p=jatuhTempo">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Jatuh Tempo
                            </a>
                            <a class="nav-link" href="index.php?p=manajemenTarif">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manajemen Tarif
                            </a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="index.php?p=lihatPemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=lihatTagihan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Tagihan
                            </a>
                            <a class="nav-link" href="index.php?p=ajukanKomplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ajukan Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=bayar">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bayar
                            </a>

                        <?php
                        }
                        ?>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            <?= $air->tipeUser($_SESSION['username']) ?>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Username</div>
                            <?php
                            $dataUser = $air->dataUser($_SESSION['username']);
                            echo "$dataUser[1]"
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                $e = explode("=", $_SERVER['REQUEST_URI']);
                if (!empty($e[1])) {
                    if ($e[1] == "user" || $e[1] == "user_edit&nik") {
                        $h1 = "Manajemen User";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "lihatKomplain") {
                        $h1 = "Lihat Komplain";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "lihatPemakaian") {
                        $h1 = "Lihat Pemakaian";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "ubahData") {
                        $h1 = "Ubah Data";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "lihatTagihan") {
                        $h1 = "Lihat Tagihan";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "ajukanKomplain") {
                        $h1 = "Ajukan Komplain";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "bayar") {
                        $h1 = "Bayar";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "lihatPemakaian") {
                        $h1 = "Lihat Pemakaian";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "jatuhTempo") {
                        $h1 = "Lihat Jatuh Tempo";
                        $h2 = "Menu untuk membuat CRUD";
                    } elseif ($e[1] == "manajemenTarif") {
                        $h1 = "Manajemen Tarif";
                        $h2 = "Menu untuk membuat CRUD";
                    }
                } else {
                    $h1 = "Dashboard";
                    $h2 = "Dashboard";
                }
                ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $h1 ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?= $h2 ?></li>
                    </ol>
                    <div class="row" id="summary">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chart">


                    </div>
                    <div class="card mb-4" id="user_add">
                        <?php
                        if (isset($_POST['tombol']) == "user_add") {
                            $nik = $_POST['nik'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $kota = $_POST['kota'];
                            $tipe_user = $_POST['tipe_user'];
                            $email = $_POST['email'];
                            $no_hp = $_POST['no_hp'];
                            $username = $_POST['user'];
                            $pass = $_POST['pswd'];

                            // cek nik tidak boleh sama
                            $qc = mysqli_query($db, "SELECT nik FROM user WHERE nik = '$nik' OR username = '$username'");
                            $jc = mysqli_num_rows($qc);

                            if (empty($jc)) {
                                mysqli_query($db, "INSERT INTO user (nik,nama,alamat,kota,tipe_user,email,no_hp,username,pass) VALUES ('$nik',\"$nama\",'$alamat','$kota','$tipe_user','$email','$no_hp','$username','$pass')");
                                // menambahkan ke database
                                if (mysqli_affected_rows($db) > 0) {
                                    // data berhasil masuk tabel
                                    echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>login</strong> Data Berhasil Ditambahkan...
                            </div>";
                                } else {
                                    // data gagal masuk tabel
                                    echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\">
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>login</strong> Data Gagal Ditambahkan...
                                                </div>";
                                }
                            }
                        } elseif (isset($_GET['p'])) {
                            $nik = $_GET['nik'];
                            $q = mysqli_query($db, "SELECT nik,nama,alamat,kota,tipe_user,email,no_hp,username,pass FROM user WHERE nik = '$nik' ");
                            $d = mysqli_fetch_row($q);
                            $nik = $d[0];
                            $nama = $d[1];
                            $alamat = $d[2];
                            $kota = $d[3];
                            $tipe_user = $d[4];
                            $email = $d[5];
                            $no_hp = $d[6];
                            $username = $d[7];
                            $pass = $d[8];
                        }
                        ?>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-solid fa-user-plus fa-fade"></i> User
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3 mt-3">
                                        <label for="nik" class="form-label">NIK:</label>
                                        <input type="string" class="form-control" id="nik" placeholder="Enter NIK" name="nik" value="<?= $nik ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama" value="<?= $nama ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="alamat" class="form-label">Alamat:</label>
                                        <textarea class="form-control" rows="4" id="alamat" name="alamat" value="<?= $alamat ?>"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="kota" class="form-label">Kota:</label>
                                        <textarea class="form-control" rows="4" id="kota" name="kota" value="<?= $kota ?>"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="tipe_user" class="form-label">Tipe User:</label>
                                        <select class="form-select" id="tipe_user" name="tipe_user" value="<?= $tipe_user ?>">
                                            <option value="admin">Tipe User</option>
                                            <?php
                                            $tu = array("admin", "bendahara", "petugas", "warga");
                                            foreach ($tu as $tus) {
                                                if ($tipe_user == $tus) $sel = "SELECTED";
                                                else $sel = "";
                                                echo "<option value $tus $sel> $tus </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $email ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="no_hp" class="form-label">No Telephone:</label>
                                        <input type="no_hp" class="form-control" id="no_hp" placeholder="Enter No Telephone" name="no_hp" value="<?= $no_hp ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="user" class="form-label">Enter Username:</label>
                                        <input type="text" class="form-control" id="user" placeholder="Enter Username" name="user" value="<?= $username ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Password:</label>
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?= $password ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="tombol" value="user_add">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" id="user_list">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tipe User</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tipe User</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $q = mysqli_query($db, "SELECT nik, nama, alamat, kota, email, no_hp FROM user ORDER BY tipe_user ASC, nama ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $nik = $d[0];
                                        $nama = $d[1];
                                        $alamat = $d[2];
                                        $kota = $d[3];
                                        $email = $d[4];
                                        $noHp = $d[5];

                                        echo "
                                        <tr>
                                        <td>$nik</td>
                                        <td>$nama</td>
                                        <td>$alamat</td>
                                        <td>$kota</td>
                                        <td>$email</td>
                                        <td>$noHp</td>
                                        <td>
                                        <a href = 'index.php?p=user_edit&nik=$nik'><button type=button class=\"btn btn-sm btn-outline-primary\">Ubah</button></a>
                                        <button type=button class=\"btn btn-sm btn-outline-danger\">Hapus</button>
                                        </td>
                                        
                                    </tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../../assets/demo/chart-area-demo.js"></script>
    <script src="../../../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../../js/datatables-simple-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../../../js/banyu.js"></script>
</body>

</html>