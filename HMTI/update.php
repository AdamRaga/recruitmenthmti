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

    $id = mysqli_real_escape_string($conn, $_POST['id']); 
    $Nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $Usia = mysqli_real_escape_string($conn, $_POST['usia']);
    $Jenis_Kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $Semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);


    $query = "UPDATE daftar SET Nama='$Nama', Usia='$Usia', Jenis_Kelamin='$Jenis_Kelamin', Semester='$Semester', Email='$Email' 
              WHERE id='$id'";


    if (mysqli_query($conn, $query)) {

        header("Location: hasil.php?success=1");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM daftar WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data - HMTI</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/Logo HMTI.png">
</head>
<body>
    <div class="centered-container">
        <div class="form-container" id="form-container">
            <h2 id="form-title">Perbarui Data!!</h2>
            <p>Silakan perbarui data Anda di bawah ini.</p>
            <div id="form-content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm();"> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="floatingPInput" placeholder="nama" value="<?php echo htmlspecialchars($row['Nama']); ?>" required>
                        <label for="floatingPInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="usia" class="form-control" id="floatingInput" placeholder="usia" min="17" value="<?php echo htmlspecialchars($row['Usia']); ?>" required>
                        <label for="floatingInput">Usia</label>
                    </div>
                    <div class="mb-3">
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="" disabled <?php echo !$row['Jenis_Kelamin'] ? 'selected' : ''; ?>>Jenis Kelamin</option>
                            <option value="Laki-Laki" <?php echo ($row['Jenis_Kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php echo ($row['Jenis_Kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select type ="number" name="semester" class="form-select" required>
                            <option value="" disabled <?php echo !$row['Semester'] ? 'selected' : ''; ?>>Semester</option>
                            <?php for ($i = 1; $i <= 1; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo ($row['Semester'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmailInput" placeholder="email" value="<?php echo htmlspecialchars($row['Email']); ?>" required>
                        <label for="floatingEmailInput">Email</label>
                    </div>
                    <button class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>
