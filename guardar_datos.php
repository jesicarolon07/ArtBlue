<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario RSVP</title>
</head>
<body>


<nav class="menu">
             <div class="logo">ArtBlue</div>
             <div class="hamburger">&#9776;</div>
             <div class="menu-options">
                <a href="#">HOME</a>
                <a href="#">ABOUT</a>
                <a href="#">CLASSES</a>
              </div>
</nav>
<style>
    
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
}
.menu {
    color: #383737;
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: fixed;
    width: 100%;
	height: 70px;
	background: #fff;
   
}


.logo{
	font-family: 'Kanit', sans-serif;
	font-size: 24px;
	display: flex;
width: 285px;
height: 48px;
justify-content: center;
align-items: center;
}

.hamburger {
    display: none;
    font-size: 24px;
    cursor: pointer;
padding: 16px 20px;
text-align: center;
}

.menu-options {
    display: flex;
    gap: 10px;
width: 238px;
justify-content: space-between;
align-items: center;

}

.menu-options  :hover{
    background:#25538f;
color: #FFFFFF;
}
.menu-options a {
    color: #423f3f;
    text-decoration: none;
    height: 70px;
    padding: 20px;
}


</style>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $asistencia = $_POST['asistencia'];

    // Detalles de conexión
    $servername = "localhost";
    $username = "root";
    $password = ""; // Por defecto en la mayoría de los casos
    $dbname = "formulario";

    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para insertar datos en la tabla rsvp
    $sql = "INSERT INTO rsvp (nombre, apellido, email, asistencia) VALUES ('$nombre', '$apellido', '$email', '$asistencia')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Confirmaste asistencia</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>



    <h2>RSVP</h2>
    <form action="guardar_datos.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="asistencia">Asistencia:</label>
        <select id="asistencia" name="asistencia">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>
