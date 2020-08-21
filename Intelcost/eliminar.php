<?php
include("conexion.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM proveedores WHERE id=$id;";
    $resultado = mysqli_query($con, $query);
    if (!$resultado) {

        die("fallo eliminar");
    }
    $_SESSION["mensaje"]="Dato eliminado";
    $_SESSION["tipo_de_mensaje"]="danger";
    header("Location:index.php");
}
