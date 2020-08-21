<?php include("conexion.php"); ?>

<?php include("include/header.php") ?>


<div class="container " style="margin-left:2px;margin-top: 6px;padding-right: 100px">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?= $_SESSION["tipo_de_mensaje"] ?> alert-dismissible fade show" role="alert" style="width: 86%;">
                    <?= $_SESSION["mensaje"]  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset();
            } ?>

            <div class="card card-body" style="width: 85%;">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombre" maxlength="60" onkeyup="this.value = Text(this.value)" value="" maxlength="60" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" maxlength="60" onkeyup="this.value = Text(this.value)" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="edad" class="form-control" placeholder="Edad" onkeyup="this.value = Num(this.value)" maxlength="2" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control" placeholder="correo electronico" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="celular" class="form-control" placeholder="celular" minlength="10" maxlength="10" required onkeyup="this.value = Num(this.value)">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control" placeholder="telefono" maxlength="20">
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success btn-block" name="guardar">
                </form>
            </div>

        </div>

        <div class="col-md-8 ">
            <form action="buscar.php" method="POST">
                <table>
                    <thead>
                        <th></th>
                        <th><input type="text" name="dato" class="form-control" placeholder="Buscar"></th>
                        <th><input type="submit" value="buscar" class="btn btn-success btn-block" name="buscar"></th>
                    </thead>
                </table>

            </form>


            <table class="table table-bordered" style="margin-left: -10%;margin-top: 10px;">
                <thead>
                    <tr class="success" style="color:whitesmoke;background-color:#616060;">
                        <th scope="col">Id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apelldios</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `proveedores`;";
                    $res = mysqli_query($con, $query);

                    while ($fila = mysqli_fetch_array($res)) { ?>
                        <tr scope="row">
                            <td><?php echo $fila["id"] ?></td>
                            <td><?php echo $fila["nombres"] ?></td>
                            <td><?php echo $fila["apellidos"] ?></td>
                            <td><?php echo $fila["edad"] ?></td>
                            <td><?php echo $fila["correp_electronico"] ?></td>
                            <td><?php echo $fila["celular"] ?></td>
                            <td><?php echo $fila["telefono"] ?></td>
                            <td><?php echo $fila["registro"] ?></td>


                            <td><a href="editar.php?id=<?php echo $fila["id"] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                            <td><a href="eliminar.php?id=<?php echo $fila["id"] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>


                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
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

    function confirmacion(form) {
        if (confirm("esta seguro de borrar el dato?")) {
            form.submit();
        } else {
            alert("dato no borrado  !");

        }
    }
</script>

<?php include("include/pie_pagina.php") ?>