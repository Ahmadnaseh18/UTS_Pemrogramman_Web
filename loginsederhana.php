<?php
// Konfigurasi database
$host = "localhost";
$dbname = "test_auth";
$username = "root";
$password = "password";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Menggunakan MD5 hash (tidak aman)
    
    // Query untuk memeriksa kredensial
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Login berhasil!";
    } else {
        echo "Username atau password salah.";
    }
}
$conn->close();
?>

<!-- Form Login -->
<form method="post" action="">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
