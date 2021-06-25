<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Perritos</title>
    <!--Custom CSS-->
    <link rel="stylesheet" href="stylesRegistrarPerro.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="FormRegistrarPerro.html">Registrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="FormConsultarPerro.html">Consultar</a>
          </li>
    
        </ul>
    </nav>
    <section class="form-register">

    <?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost","root","","perritosdb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Codigo'];
    $v2 = $_REQUEST['Nombre'];
    $v3 = $_REQUEST['FechNac'];
    $v4 = $_REQUEST['Raza'];
    $v5 = $_REQUEST['Genero'];
    $nombreimg = $_FILES['Foto']['name'];
    $archivo = $_FILES['Foto']['tmp_name'];
    $v6 = "images"; //$_REQUEST['Foto']; //Foto

    $v6 = $v6."/".$nombreimg;
    move_uploaded_file($archivo,$v6);

    //conuslta SQL
    $sql = "INSERT INTO Perro (DNI, Nombre, Raza, Genero, FechaNacimiento, Foto) ";
    $sql .= "VALUES ('$v1', '$v2', '$v4', '$v5', '$v3', '$v6' )";
    if (mysqli_query($conn, $sql)) {
        echo "<p> Datos ingresados con éxito &#128512</p>";
    } else {
        echo "Vuelva a ingresar los datos." . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    //Mensaje de conformidad
    ?>
    </section>
</body>
</html>

