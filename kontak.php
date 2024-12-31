<?php
$servername = "localhost";  // Nama host database
$username = "root";         // Username database
$password = "";             // Password database
$dbname = "db_mhs";         // Nama database

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form dan cegah SQL Injection
$nama = $conn->real_escape_string($_POST['nama']);
$email = $conn->real_escape_string($_POST['email']);
$subject = $conn->real_escape_string($_POST['subject']);
$pesan = $conn->real_escape_string($_POST['pesan']);

// Siapkan dan jalankan SQL
$sql = "INSERT INTO `data_kontak`(`nama`, `email`, `subject`, `pesan`) VALUES ('$nama', '$email', '$subject', '$pesan')";

if ($conn->query($sql) === TRUE) {
    // Tampilkan pesan sukses sebagai alert dan tetap di halaman Portofolio.html
    echo "<script>
        alert('BERHASIL MENGIRIM PESAN');
        window.location.href = 'index.html';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
