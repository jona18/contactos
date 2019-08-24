<?php
  if(isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
  }
  if(isset($_GET['numero'])){
    $numero = $_GET['numero'];
  }
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

  try {
    require_once('functions/db_connection.php');
    $sql = "UPDATE `contactos` SET ";
    $sql .= "`nombre` = '{$nombre}', ";
    $sql .= "`telefono` = '{$numero}' ";
    $sql .= "WHERE `id` = {$id} ";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de contactos</h1>
      <div class="contenido">
        <?php
          if($resultado){
            echo 'Contacto actualizado';
          } else {
            echo 'Error ' . $conn->error;
          }
        ?>
        <br>
        <a href="index.php" class="volver">Volver al inicio</a>
      </div>
    </div>
    <?php
      $conn->close();
    ?>
  </body>
</html>
