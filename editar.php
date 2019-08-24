<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

  try {
    require_once('functions/db_connection.php');
    $sql = "SELECT * FROM contactos WHERE `id` = {$id}";
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
        <h2>Editar contacto</h2>
        <form action="actualizar.php" method="get">
          <?php while($registros = $resultado->fetch_assoc()){ ?>
            <div class="campo">
              <label for="nombre">Nombre
                <input type="text" value ="<?php echo $registros['nombre']; ?>" name="nombre" id="nombre" placeholder="nombre">
              </label>
            </div>
            <div class="campo">
              <label for="numero">Numero
                <input type="text" value ="<?php echo $registros['telefono']; ?>" name="numero" id="numero" placeholder="numero">
              </label>
            </div>
            <input type="hidden" name="id" value="<?php echo $registros['id']; ?>">
            <input type="submit" value="Modificar">
          <?php } ?>
        </form>
      </div>
    </div>
    <?php
      $conn->close();
    ?>
  </body>
</html>
