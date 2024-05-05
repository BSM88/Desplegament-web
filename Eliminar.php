<?php

require_once('Connexio.php');

class Eliminar {

    // Método para eliminar un producto
    public function eliminarProducto($id) {
        // Verifica si el ID del producto es válido
        if (!isset($id) || !is_numeric($id)) {
            echo '<p>ID de producto no válido.</p>';
            return;
        }

        // Obtiene la conexión a la base de datos
        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        // Prepara la consulta para eliminar el producto
        $consulta = $conexion->prepare("DELETE FROM productes WHERE id = ?");
        $consulta->bind_param("i", $id);

        // Ejecuta la consulta
        if ($consulta->execute()) {
            // Redirige a Principal.php con un parámetro en la URL
            header("Location: Principal.php?eliminado=true");
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al eliminar el producte: ' . $conexion->error . '</div>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Obtiene el ID del producto de la variable GET
$idProducto = isset($_GET['id']) ? $_GET['id'] : null;

// Crea una instancia de la clase Eliminar
$eliminarProducto = new Eliminar();

// Llama al método para eliminar el producto
$eliminarProducto->eliminarProducto($idProducto);

?>
