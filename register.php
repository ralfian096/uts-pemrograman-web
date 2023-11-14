<?php
if (session_status() === PHP_SESSION_NONE) session_start();
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

    <div class="container position-absolute top-50 start-50 translate-middle" style="max-width: 400px;">

        <?php if (isset($_SESSION['register_status'])) : ?>
            <?php if ($_SESSION['register_status'] == 'INVALID_PASSWORD_CONFIRM') : ?>

                <div class="alert alert-warning" role="alert">
                    Password tidak sesuai dengan konfirmasi password
                </div>

            <?php elseif ($_SESSION['register_status'] == 'EMAIL_ALREADY_USED') : ?>

                <div class="alert alert-warning" role="alert">
                    Email sudah digunakan
                </div>

            <?php elseif ($_SESSION['register_status'] == 'REGISTRATION_SUCCESS') : ?>

                <div class="alert alert-success" role="alert">
                    Registrasi berhasil. Sekarang anda sudah bisa <a href="./index.php" class="alert-link">login</a> ke akun anda
                </div>

            <?php endif; ?>
        <?php endif; ?>

        <form action="./backend/register.php" method="post">

            <h1 class="text-center mb-5">Registrasi Akun</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Cth: John Doe">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Cth: john.doe@myemail.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
            </div>

            <div class="mb-3">
                <label for="confirm" class="form-label">Re-enter Password</label>
                <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Re-enter your password">
            </div>

            <div class="col-auto">
                <button type="submit" value="login" name="submit" class="btn btn-primary w-100">Submit</button>
            </div>

            <div class="col-auto mt-3 text-center">
                Saya sudah punya akun
                <a href="index.php" class="link-primary">
                    Login
                </a>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


<?php
// Delete all sessions
session_unset();
?>