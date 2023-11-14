<?php

require_once('../config/db.php');

if (isset($_POST['id'])) {

    // Dapatkan data produk
    $product = mysqli_query(
        $db_connect,
        "SELECT * FROM products 
        WHERE id = '{$_POST['id']}'"
    );
    $data = mysqli_fetch_array($product);

    // Hapus gambar dari direktori
    if (unlink("../{$data['image']}") || !file_exists("../{$data['image']}")) {

        // Hapus data dari MySQL
        $query = mysqli_query(
            $db_connect,
            "DELETE FROM products
            WHERE id = '{$_POST['id']}'"
        );

        if ($query) {

            echo <<<EOT
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = "../show.php";
                </script>
                EOT;
        } else {

            echo <<<EOT
                <script>
                    alert('Error saat menghapus data');
                    history.go(-1);
                </script>
                EOT;
        }
    } else {

        echo <<<EOT
            <script>
                alert('Error saat menghapus gambar');
                document.location.href = "../show.php";
            </script>
            EOT;
    }
}
