<?php
    include_once("./connect.php");

    if(isset($_POST["submit"])){ 
        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        $query = mysqli_query($db, "INSERT INTO staff VALUES (
            NULL, '$nama', '$telp', '$email'
        )");

    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM TAMBAH STAFF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <div class="container"></div>

</head>
<body>
<div class="container w-75">

<h1 class="mb-4">Form Tambah Staff</h1>

<form action="" method="POST">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control">
    </div>

    <div class="mb-3">
        <label for="telp" class="form-label">Telepon</label>
        <input type="text" id="telp" name="telp" class="form-control">
    </div>

    <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="staff.php" class="btn btn-secondary">Kembali ke Halaman Staff</a>
</form>
</body>
</html>