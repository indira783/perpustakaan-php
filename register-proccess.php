<?php
session_start();

include_once("./connect.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize and hash the input
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $password = trim($_POST['password']);
    
    // Check if the email is already registered
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "Email sudah terdaftar.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert the new user into the database
            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($db, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "Register berhasil. Silahkan <a href='login.php'>login</a>.";
                } else {
                    echo "Register gagal.";
                }

                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Terjadi kesalahan dalam mempersiapkan statement.";
            }
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Terjadi kesalahan dalam mempersiapkan statement.";
    }
}

// Close the database connection
mysqli_close($db);
?>