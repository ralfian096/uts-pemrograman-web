<?php

if (!isset($_GET['id']))
    echo <<<EOT
    <script>
        alert('Id tidak tersedia');
        document.location.href = "show.php";
    </script>
    EOT;

require_once('./config/db.php');
$query = mysqli_query(
    $db_connect,
    "SELECT * FROM products
    WHERE id = '{$_GET['id']}'"
);
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

    <link rel="icon" href="./assets/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background: rgb(235, 235, 235);">

    <div class="container bg-white p-3 rounded-2 shadow position-absolute top-50 start-50 translate-middle" style="max-width: 450px;">

        <h1 class="text-center">
            Edit data produk
        </h1>

        <form action="./backend/product_edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nama produk</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com" value="<?= $data['name']; ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control" placeholder="10000" name="price" value="<?= $data['price']; ?>">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar produk</label>
                <input class="form-control" type="file" accept="image/png,image/jpeg,image/jpg" name="image" id="image">
            </div>

            <input type="hidden" name="image" value="<?= $data['image']; ?>">

            <div class="mb-3">
                <p>Gambar produk saat ini</p>
                <img src="<?= $data['image']; ?>" alt="" style="width: 150px; height: 150px; object-fit: cover; background: rgb(230, 230, 230);">
            </div>

            <div class="col-auto">
                <button type="submit" name="submit" value="submit" class="btn btn-primary mb-3 w-100">Simpan</button>
            </div>
        </form>

    </div>

</body>

</html>