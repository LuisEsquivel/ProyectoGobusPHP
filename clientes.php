

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>



</head>
<body style="background: rgb( 33, 47, 61 )" class="text-light">

        <h3 class="ml-3 mb-4">CLIENTES</h3>


<form action="clientes.php" method="POST">


        <div class="form-group mt-3 form-inline">
        <label for="nombreCliente" class="ml-3">Nombre:&nbsp;&nbsp;&nbsp;</label>
        <input type="text" class="form-control ml-2 col-sm-9" placeholder="Nombre" name="nombreCliente" required  >
       </div>


        <div class="form-group mt-3 form-inline">
                <label for="apellidosCliente" class="ml-3">Apellidos:</label>
                <input type="text" class="form-control ml-3 col-sm-9" placeholder="Apellidos" name="apellidosCliente" required  >
                </div>


                <div class="form-group mt-3 form-inline">
                        <label for="direccionCliente" class="ml-3">Dirección:</label>
                        <input type="text" class="form-control ml-3 col-sm-9" placeholder="Dirección" name="direccionCliente" required >
                        </div>

                <div class="form-group mt-3 form-inline">
                        <label for="telefonoCliente" class="ml-3 pr-2">Teléfono:</label>
                        <input type="text" class="form-control ml-3 col-sm-9" placeholder="Teléfono" name="telefonoCliente" required  >
                        </div>


                        <div class="form-group mt-3 form-inline">
                                <label for="emailCliente" class="ml-3 pr-1">Email:&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="form-control col-sm-6 ml-4 " placeholder="Email" name="emailCliente" required  >
            <button type="submit" name="agregar" class="btn btn-success ml-5">Agregar</button>
         </div>
        </form>


        <br><br>


        <form action="clientes.php" method="POST" class="form-inline">
<div class="form-group">
<input type="text" class="form-control ml-3 pr-5"  placeholder="Introduzca el ID del cliente" name="clienteID" <?php if(isset($clienteID)) echo $clienteID; ?>>
<button type="submit"  class="btn btn-primary ml-3" name="buscar">Buscar</button>
</div>
</form>
<br>

        <table class=" table-sm table-bordered ml-3 mb-3">
          <thead style="background:rgb(26, 5, 5)">
              <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>operaciones</th>
              </tr>
          </thead>

          <tbody>

          <?php
          require 'conexion.php';

          if(isset($_POST['buscar'])){
          $clienteID = $_POST['clienteID'];
          $seleccion = "SELECT * FROM clientes WHERE clienteID=$clienteID";
          }else{
            $seleccion = "SELECT * FROM clientes";
          }

          $result = mysqli_query($conectar, $seleccion);
          $contador=0;


        while($fila=mysqli_fetch_array($result)){
        $id=$fila['clienteID'];
        $nombre=$fila['nombre'];
        $apellidos=$fila['apellidos'];
        $direccion=$fila['direccion'];
        $telefono=$fila['telefono'];
        $email=$fila['email'];

        $contador++;

       ?>


         
         <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $apellidos; ?></td>
                <td><?php echo $direccion; ?></td>
                <td><?php echo $telefono; ?></td>
                <td><?php echo $email; ?></td>
                <td class="form-goup form-inline">
                <a href= <?php echo 'http://localhost/ProyectoGobusPHP/clientes.php?modificar='.$id; ?> class="badge badge-info">Modificar</a>
                <a href= <?php echo 'http://localhost/ProyectoGobusPHP/clientes.php?eliminar='.$id; ?> class="badge badge-danger mt-3" >Eliminar</a></td>
        <?php
        }  
        ?>

            </tr>
            </tbody>
        </table>



        <br> <br>


<form action="clientes.php" method="POST">

<!--PHP PARA ACTUALIZAR LOS DATOS UN CLIENTE-->
<?php
require 'conexion.php';

if(isset($_GET["modificar"])){



        $modificarEste = $_GET["modificar"];


        $seleccion = "SELECT * FROM clientes WHERE clienteID=".$_GET["modificar"];
        $resultadin =  mysqli_query($conectar,$seleccion);

while($fila=mysqli_fetch_array($resultadin)){
        $nombre=$fila['nombre'];
        $apellidos=$fila['apellidos'];
        $direccion=$fila['direccion'];
        $telefono=$fila['telefono'];
        $email=$fila['email'];


?>


<div class="form-group mt-3 form-inline">
<label for="nombreCliente" class="ml-3">Nombre:&nbsp;&nbsp;&nbsp;</label>
<input type="text" class="form-control ml-2 col-sm-9" placeholder="Nombre" name="nombreC" required  value="<?php echo $nombre?>" >
</div>


<div class="form-group mt-3 form-inline">
        <label for="apellidosCliente" class="ml-3">Apellidos:</label>
        <input type="text" class="form-control ml-3 col-sm-9" placeholder="Apellidos" name="apellidosC" required value="<?php echo $apellidos?>" >
        </div>


        <div class="form-group mt-3 form-inline">
                <label for="direccionCliente" class="ml-3">Dirección:</label>
                <input type="text" class="form-control ml-3 col-sm-9" placeholder="Dirección" name="direccionC" required  value="<?php echo $direccion?>">
                </div>

        <div class="form-group mt-3 form-inline">
                <label for="telefonoCliente" class="ml-3 pr-2">Teléfono:</label>
                <input type="text" class="form-control ml-3 col-sm-9" placeholder="Teléfono" name="telefonoC" required value="<?php echo $telefono?>" >
                </div>


                <div class="form-group mt-3 form-inline">
                        <label for="emailCliente" class="ml-3 pr-1">Email:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" class="form-control col-sm-6 ml-4 " placeholder="Email" name="emailC" required value="<?php echo $email ?>">
    <button type="submit" class="btn btn-primary ml-3" name="guardar">Guardar</button>
 </div>

<?php

}


if(isset($_POST['guardar'])){

        $nombreCliente = $_POST["nombreC"];
        $apellidosCliente = $_POST["apellidosC"];
        $direccionCliente = $_POST["direccionC"];
        $telefonoCliente = $_POST["telefonoC"];
        $emailCliente = $_POST["emailC"];

$actualizar = "UPDATE clientes SET nombre='$nombreCliente', apellidos='$apellidosCliente', direccion='$direccionCliente', telefono='$telefonoCliente', email='$emailCliente' WHERE clienteID=".$modificarEste;
$resultado =  mysqli_query($conectar,$actualizar);
 if(mysqli_affected_rows($resultado)>0){
        echo'<script type="text/javascript">
            alert("se han actualizado los datos del cliente\nen la base de datos");
            </script>';
    }else{
        echo'<script type="text/javascript">
        alert("no se pudo actualizar");
        </script>';
    }
}
}
 ?>
</form>
    
</body>
</html>






<!--PHP PARA AGREGAR UN CLIENTE-->
<?php
require 'conexion.php';

if(isset($_POST['agregar'])){

$nombreCliente = $_POST["nombreCliente"];
$apellidosCliente = $_POST["apellidosCliente"];
$direccionCliente = $_POST["direccionCliente"];
$telefonoCliente = $_POST["telefonoCliente"];
$emailCliente = $_POST["emailCliente"];


$sql = "INSERT INTO clientes(nombre, apellidos, direccion, telefono, email) VALUES('$nombreCliente', '$apellidosCliente', '$direccionCliente', '$telefonoCliente', '$emailCliente')";
$resultado =  mysqli_query($conectar,$sql);

if($resultado){
    echo'<script type="text/javascript">
        alert("cliente agregado\nen la base de datos");
        </script>';
}
}
?>




<?php
if(isset($_GET["eliminar"])){
    

$sql = "DELETE FROM clientes WHERE clienteID=".$_GET["eliminar"];
$resultado =  mysqli_query($conectar,$sql);

if($resultado){
    echo'<script type="text/javascript">
        alert("cliente eliminado de la base de datos");
        </script>';
}
}


?>