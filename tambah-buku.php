<?php
    include_once("./connect.php");

    if(isset($_POST["submit"])){ 
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        $query = mysqli_query($db, "INSERT INTO buku  VALUES (
            NULL, '$nama', '$isbn', $unit
        )");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM TAMBAH BUKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <div class="container"></div>

</head>
<body>
<div class="container w-75">

<h1 class="mb-4">Form Tambah Buku</h1>

<form action="" method="POST">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control">
    </div>

        <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control">
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="number" id="unit" name="unit" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="buku.php" class="btn btn-secondary">Kembali ke Halaman Buku</a></form>
</body>
</html>