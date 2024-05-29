<?php
    include_once("./connect.php");

    // Sanitasi input ID
    $id = isset($_GET["id"]) ? mysqli_real_escape_string($db, $_GET["id"]) : '';

    $query_get_data = mysqli_query($db, "SELECT * FROM staff WHERE id='$id'");
    $staff = mysqli_fetch_assoc($query_get_data);

    if(isset($_POST["submit"])){ 
        $nama = mysqli_real_escape_string($db, $_POST["nama"]);
        $telp = mysqli_real_escape_string($db, $_POST["telp"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);

        $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id='$id'");

        if ($query) {
            // Redirect or show success message
            header("Location: staff.php");
            exit;
        } else {
            echo "Update failed.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Edit Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container w-75">
        <h1 class="mb-4">Form Edit Staff</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo isset($staff['nama']) ? $staff['nama'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">Telepon</label>
                <input type="text" id="telp" name="telp" class="form-control" value="<?php echo isset($staff['telp']) ? $staff['telp'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($staff['email']) ? $staff['email'] : ''; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="staff.php" class="btn btn-secondary">Kembali ke Halaman Staff</a>
        </form>
    </div>
</body>
</html>
