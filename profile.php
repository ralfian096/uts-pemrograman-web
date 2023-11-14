<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SESSION['role'] != 'user') {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="icon" href="./assets/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="alert alert-success m-auto mt-5" style="max-width: 90%;">
        <h4 class="alert-heading">Selamat datang, <?= $_SESSION['name']; ?></h4>
        <p>
            Ini adalah halaman dasbor dari sistem informasi mahasiswa UBP Karawang
        </p>
        <hr>
        <p class="mb-0">Halaman ini hanya dapat diakses setelah anda login menggunakan akun yang telah dibagikan untuk semua mahasiswa aktif UBP Karawang</p>

        <hr>
        <p class="mb-1 fw-bold">
            Menu
        </p>
        <div class="d-flex flex-row">
            <a href="./backend/logout.php">
                <button class="btn btn-dark">
                    Logout
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>