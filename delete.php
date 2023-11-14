<?php

if (!isset($_GET['id']))
    echo <<<EOT
    <script>
        alert('Id tidak tersedia');
        document.location.href = "show.php";
    </script>
    EOT;
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
            Hapus data produk
        </h1>

        <form class="d-none" action="./backend/product_delete.php" method="post">
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

            <button id="deleteSubmit" type="submit" name="submit" value="submit" class="btn btn-danger mb-3 w-100">Hapus</button>
        </form>
    </div>

    <script type="text/javascript">
        let confirmation = confirm("Hapus data produk?");

        if (confirmation) {

            document.getElementById('deleteSubmit').click();
        } else {

            location.href = "show.php";
        }
    </script>

</body>

</html>