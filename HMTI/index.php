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
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment - HMTI</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/Logo HMTI.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="image/Logo HMTI.png"/>

</head>
<body>
    <div class="centered-container">
        <div class="form-container" id="form-container">
            <h2 id="form-title">Pendaftaran HMTI 2024/2025</h2>
            <p>Halo semuanya, bagi yang ingin mengikuti PAA silahkan daftar di bawah!!.</p>
            <div id="form-content">
            <form name="myForm" action="hasil.php" method="POST" onsubmit="return validateForm();">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="floatingPInput" placeholder="nama" required>
                        <label for="floatingPInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="usia" class="form-control" id="floatingInput" placeholder="usia" min="17" required>
                        <label for="floatingInput">Usia</label>
                    </div>
                    <div class="mb-3">
                    <select name="jenis_kelamin" class="form-select" required>
                            <option selected disabled>Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <select name="semester" class="form-select" required>
                            <option selected disabled>Semester</option>
                            <option value="1">1</option>
                            <option disabled value="2">2</option>
                            <option disabled value="3">3</option>
                            <option disabled value="4">4</option>
                            <option disabled value="5">5</option>
                    </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingPInput" placeholder="email" required>
                        <label for="floatingPInput">Email</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>
