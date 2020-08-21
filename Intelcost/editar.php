<?php
include("conexion.php");
header_remove("Location:index.php");
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "SELECT * FROM proveedores WHERE id=$id;";
    $resultado = mysqli_query($con, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $nombres = $fila["nombres"];
        $apellidos = $fila["apellidos"];
        $edad = $fila["edad"];
        $correo = $fila["correp_electronico"];
        $cel = $fila["celular"];
        $tel = $fila["telefono"];
    }
}


if (isset($_POST["guardar"])) {
    $id = $_GET["id"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];
    $cel = $_POST["celular"];
    $tel = $_POST["telefono"];

    $queryval = "SELECT correp_electronico FROM proveedores WHERE correp_electronico='$correo'";
    $resultado1 = mysqli_query($con, $queryval);
    echo $queryval;
    if (mysqli_num_rows($resultado1) < 2) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $query = "UPDATE proveedores SET nombres='$nombres',apellidos='$apellidos',edad='$edad',correp_electronico='$correo',celular='$cel',telefono='$tel' WHERE id='$id';";
            mysqli_query($con, $query);
            $_SESSION["mensaje"] = "Dato Modificado";
            $_SESSION["tipo_de_mensaje"] = "warning";
            header("Location:index.php");
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
}
?>
<?php include("include/header.php") ?>

<div <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" maxlength="60" placeholder="Nombre" autofocus required onkeyup="this.value = Text(this.value)" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos; ?>" maxlength="60" placeholder="Apellidos" required onkeyup="this.value = Text(this.value)" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="edad" class="form-control" value="<?php echo $edad; ?>" placeholder="Edad" onkeyup="this.value = Num(this.value)" maxlength="2" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>" placeholder="correo electronico" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="celular" class="form-control" value="<?php echo $cel; ?>" placeholder="celular" minlength="10" maxlength="10" required onkeyup="this.value = Num(this.value)"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control" value="<?php echo $tel;  ?>" placeholder="telefono" maxlength="20" onkeyup="this.value = Num(this.value)">
                    </div>
                    <button class="btn btn-success btn-block" name="guardar" onclick="confirmacion(this.form)">Modificar</button>
                    <a href="index.php" class="btn btn-success btn-block">Volver</a>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    function confirmacion(form) {
        if (confirm("esta seguro de modificar el dato?")) {
            form.submit();
        } else {
            alert("dato no modificado  !");

        }
    }
    function Text(string) { //solo letras 
        var out = '';
        //Se añaden las letras validas
        var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';

        for (var i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) !== -1)
                out += string.charAt(i);
        return out;
    }

    function Num(string) { //solo numeros
        var out = '';
        //Se añaden las numeros validos
        var filtro = '1234567890';

        for (var i = 0; i < 11; i++)
            if (filtro.indexOf(string.charAt(i)) !== -1)
                out += string.charAt(i);
        return out;
    }
</script>
<?php include("include/pie_pagina.php") ?>