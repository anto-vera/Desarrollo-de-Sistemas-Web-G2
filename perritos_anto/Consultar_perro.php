<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Perritos</title>
    <!--Custom CSS-->
    <link rel="stylesheet" href="stylesConsultarPerro.css">
</head>
<body>
    <nav class="navbar1">
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
        $conn = mysqli_connect("localhost", "root","", "perritosdb");
        if (!$conn) {
            die("Error de conexion: " . mysqli_connect_error());
        }
        //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
        //capturando datos
        $v2 = $_REQUEST['Nombre'];
        //conuslta SQL
        $sql = "select * from Perro where Nombre like '".$v2."'";
        $result = mysqli_query($conn, $sql);
        //cuantos reultados hay en la busqueda
        $num_resultados = mysqli_num_rows($result);
        echo "<p>Número de perros encontrados: ".$num_resultados."</p><br>";
        //mostrando informacion de los perros y detalle
        for ($i=0; $i <$num_resultados; $i++) {
            $row = mysqli_fetch_array($result); //echo ($i+1);
            echo " <p>DNI: ".$row["DNI"];
            echo " </br><p>Nombre: ".$row["Nombre"];
            echo " </br><p>Raza: ".$row["Raza"];
            echo " </br><p>Género: ";
            if($row["Genero"]==0)
                echo "Hembra ";
            else
                echo "Macho ";
            echo " </br><p>Nació en: ".$row["FechaNacimiento"];
            echo " <br><p>Foto: ";
            echo '</br><img src="'.$row["Foto"].'" width="300" height="400">';
        }
        ?>
    </section>
    
</body>
</html>