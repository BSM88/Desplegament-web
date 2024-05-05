<?php

require_once('Connexio.php');
require_once('Header.php');

class Nou {

    // Método para mostrar el formulario de creación de un nuevo producto
    public function mostrarFormulario() {
        // Estructura HTML del formulario de creación de un nuevo producto
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Nou producte</title>
                <!-- Enlace a Bootstrap desde su repositorio remoto -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
              </head>
              <body>
                <div class="container mt-5" style="margin-bottom: 200px">
                    <h2>Nou producte</h2>
                    <hr>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcio" class="form-label">Descripció:</label>
                            <input type="text" name="descripcio" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="preu" class="form-label">Preu:</label>
                            <input type="number" name="preu" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria:</label>
                            <select name="categoria" class="form-select" required>
                                <option value="1">Electrònics</option>
                                <option value="2">Roba</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>

                        <!-- Agrega más campos según sea necesario -->

                        <hr>
                        <!-- Botones de guardar y cancelar -->
                        <input type="submit" name="submit" value="Guardar" class="btn btn-primary">
                        <a href="Principal.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>';
        
        // Incluye el pie de página
        require_once('Footer.php');
    }

    // Método para procesar el formulario y agregar el nuevo producto
    public function agregarProducto() {
        // Verifica si se ha enviado el formulario
        if(isset($_POST['submit'])) {
            // Obtiene los datos del formulario
            $nom = $_POST['nom'];
            $descripcio = $_POST['descripcio'];
            $preu = $_POST['preu'];
            $categoria = $_POST['categoria'];

            // Obtiene la conexión a la base de datos
            $conexionObj = new Connexio();
            $conexion = $conexionObj->obtenirConnexio();

            // Prepara la consulta para insertar el nuevo producto
            $consulta = $conexion->prepare("INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES (?, ?, ?, ?)");
            $consulta->bind_param("ssdi", $nom, $descripcio, $preu, $categoria);

            // Ejecuta la consulta
            if ($consulta->execute()) {
                echo '<div class="alert alert-success" role="alert">Producte afegit amb èxit.</div>';
                echo '<script>setTimeout(function() { window.location.href = "Principal.php"; }, 1000);</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al afegir el producte: ' . $conexion->error . '</div>';
            }

            // Cierra la conexión a la base de datos
            $conexion->close();
        }
    }
}

// Crea una instancia de la clase Nou
$nuevoProducto = new Nou();

// Llama al método para procesar el formulario y agregar el nuevo producto
$nuevoProducto->agregarProducto();

// Llama al método para mostrar el formulario
$nuevoProducto->mostrarFormulario();

?>
