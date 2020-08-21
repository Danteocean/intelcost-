<?php
include("conexion.php");
if (isset($_POST['guardar'])) {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];
    $cel = $_POST["celular"];
    $tel = $_POST["telefono"];
    echo $nombres;
    echo $apellidos;
    echo $edad;
    echo $correo;
    echo $cel;
    echo  $tel;

    $queryval = "SELECT correp_electronico FROM proveedores WHERE correp_electronico='$correo'";
    $resultado1 = mysqli_query($con, $queryval);
    echo $queryval;

    if (mysqli_num_rows($resultado1) < 1) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $query = "INSERT INTO `proveedores`(`nombres`, `apellidos`, `edad`, `correp_electronico`, `celular`, `telefono`) VALUES ('$nombres','$apellidos','$edad','$correo','$cel','$tel')";
            $resultado = mysqli_query($con, $query);
        } else {
            $_SESSION["mensaje"] = "correo no es correcto";
            $_SESSION["tipo_de_mensaje"] = "danger";
            header("Location:index.php");
        }
    } else {
        $_SESSION["mensaje"] = "correo ya existente";
        $_SESSION["tipo_de_mensaje"] = "danger";
        header("Location:index.php");
    }



    if (!$resultado) {
        die("consulta fallo");
    }
    $_SESSION["mensaje"] = "Dato guardado";
    $_SESSION["tipo_de_mensaje"] = "success";
    header("Location:index.php");
}
