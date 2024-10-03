<?php 
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "daftar_hmti";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

 
    $query = "DELETE FROM daftar WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
       
        header("Location: hasil.php?deleted=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak diberikan.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data - HMTI</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/Logo HMTI.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>