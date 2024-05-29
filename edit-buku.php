<?php
    include_once("./connect.php");

    if(isset($_GET["id"])) {
        $id = mysqli_real_escape_string($db, $_GET["id"]);

        $query_get_data = mysqli_query($db, "SELECT * FROM buku WHERE id='$id'");
        $buku = mysqli_fetch_assoc($query_get_data);

        if(isset($_POST["submit"])){ 
            $nama = mysqli_real_escape_string($db, $_POST["nama"]);
            $isbn = mysqli_real_escape_string($db, $_POST["isbn"]);
            $unit = mysqli_real_escape_string($db, $_POST["unit"]);

            $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn', unit='$unit' WHERE id='$id'");
        }
    } else {
        // Handle case where $_GET["id"] is not set (optional)
        $buku = array(); // Initialize an empty array or handle accordingly
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM EDIT BUKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <div class="container"></div>

</head>
<body>
<div class="container w-75">

<h1 class="mb-4">Form Edit Buku</h1>

<form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo isset($buku['nama']) ? $buku['nama'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo isset($buku['isbn']) ? $buku['isbn'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="number" id="unit" name="unit" class="form-control" value="<?php echo isset($buku['unit']) ? $buku['unit'] : ''; ?>">
            </div>

            <a href="./buku.php" class="btn btn-secondary">Kembali ke halaman buku</a>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         
        </form>

</body>
</html>