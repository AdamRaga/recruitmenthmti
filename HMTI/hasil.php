<?php 
$host = "localhost";
$username = "root"; 
$password = "";
$database = "daftar_hmti";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $Usia = mysqli_real_escape_string($conn, $_POST['usia']);
    $Jenis_Kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $Semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO daftar (Nama, Usia, Jenis_Kelamin, Semester, Email) 
              VALUES ('$Nama', '$Usia', '$Jenis_Kelamin', '$Semester', '$Email')";

    if (mysqli_query($conn, $query)) {
        echo "";
        echo "<br><a href='index.php'></a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Data - HMTI</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/Logo HMTI.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="centered-container">
        <div class="form-container">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Pastikan Data Anda Benar!!</h2>
               <form action="done.php">
               <?php
                $result = mysqli_query($conn, "SELECT id, Nama, Usia, Jenis_Kelamin, Semester, Email FROM daftar");

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='table-responsive'>";
                    echo "
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Semester</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $lastId = null;

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['Nama']) . "</td>
                            <td>" . htmlspecialchars($row['Usia']) . "</td>
                            <td>" . htmlspecialchars($row['Jenis_Kelamin']) . "</td>
                            <td>" . htmlspecialchars($row['Semester']) . "</td>
                            <td>" . htmlspecialchars($row['Email']) . "</td>
                        </tr>";
                        $lastId = $row['id'];
                    }

                    echo "
                        </tbody>
                    </table>";
                    echo "</div>";
                    echo "
                    <div class='mb-4 text-center'>";
                    if ($lastId !== null) {
                        echo "
                        <a href='update.php?id=$lastId' class='btn btn-info btn-sm'>Ubah</a>
                        <a href='delete.php?id=$lastId' class='btn btn-danger btn-sm'>Hapus</a>
                        <button id='submit-button' class='btn btn-success btn-sm' onclick='return validateTable();'>Kirim</button>";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='text-center'><h4>DATA KOSONG!!!</h4></div>";
                    echo "<div class='text-center'><p>
                        Silahkan mendaftar terlebih dahulu untuk melanjutkan!!    
                    </p></div>";
                    echo "<div class='text-center mt-4'>
                          <a href='index.php' class='btn btn-primary'>Daftar!!</a>
                          </div>";
                }
                ?>
               </form> 
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>