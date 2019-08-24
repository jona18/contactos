<?php
  try {
    require_once('functions/db_connection.php');
    $sql = 'SELECT * FROM contactos';
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
        <h2>Nuevo contacto</h2>
        <form action="crear.php" method="post">
          <div class="campo">
            <label for="nombre">Nombre
              <input type="text" name="nombre" id="nombre" placeholder="nombre">
            </label>
          </div>
          <div class="campo">
            <label for="numero">Numero
              <input type="text" name="numero" id="numero" placeholder="numero">
            </label>
          </div>
          <input type="submit" value="Agregar">
        </form>
      </div>
      <div class="contenido existentes">
        <h2>Contactos existentes</h2>
        <p>Numero de contactos: <?php echo $resultado->num_rows; ?></p>
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Editar</th>
              <th>Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($registros = $resultado->fetch_assoc()){ ?>
              <tr>
                <td><?php echo $registros['nombre']; ?></td>
                <td><?php echo $registros['telefono']; ?></td>
                <td><a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a></td>
                <td class="borrar"><a href="borrar.php?id=<?php echo $registros['id']; ?>">Borrar</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
      $conn->close();
    ?>
  </body>
</html>
