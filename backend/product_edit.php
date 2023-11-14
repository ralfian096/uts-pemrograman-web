<?php

require_once('../config/db.php');

if (isset($_POST['submit'])) {

    $image_path = $_POST['image'];

    // Simpan gambar baru
    if (isset($_FILES['image'])) {

        $target_dir = 'uploads/';
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], "../{$target_file}")) {
            $image_path = $target_file;
        } else {
            echo <<<EOT
                <script>
                    alert('Error saat menyimpan gambar');
                    history.go(-1);
                </script>
                EOT;

            die;
        }
    }

    $update_date = date('Y-m-d H:i:s');

    // Simpan data ke MySQL
    $query = mysqli_query(
        $db_connect,
        "UPDATE products
        SET
        name = '{$_POST['name']}',
        price = '{$_POST['price']}',
        image = '{$image_path}',
        updated_at = '{$update_date}'

        WHERE id = '{$_POST['id']}'
        "
    );

    if ($query) {

        echo <<<EOT
            <script>
                alert('Data berhasil disimpan');
                document.location.href = "../show.php";
            </script>
            EOT;
    } else {

        echo <<<EOT
            <script>
                alert('Error saat memperbarui data');
                history.go(-1);
            </script>
            EOT;
    }
}
