

<?php
$adminEmail = 'chadwinherminio@gmail.com';
$adminPassword = 'sitfam';

if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conexion = conectarBaseDatos();

    $sql = "INSERT INTO usuario (contraseña, email) values (?,?)" ;
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente.'</script>";
    } else {
        echo "<script>alert(Error: )</script>" . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}

?>
