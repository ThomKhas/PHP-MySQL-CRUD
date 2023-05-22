<?php include_once("../database/db.php");?>
<?php include_once("../headers-footers/header_index.php");?>
<?php 
    date_default_timezone_set('America/Santiago');
    $fecha_actual = date('Y-m-d H:i:s');
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-4">

            <div class="card card-body">
                <form action="save_task.php" method="POST"><h1 class="text-center">Formulario de Ingreso de Empleados</h1>
                    <!-- FORMULARIO DATOS PERSONALES -->
                    <h5>Datos Personales</h5>
                    <div class="form-group m-1">
                        <input type="text" name="rut" class="form-control " placeholder="Rut" autofocus>
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="sexo" class="form-control" placeholder="Sexo">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                    </div>
                    <!-- FORMULARIO DATOS LABORALES -->
                    <h5>Datos Laborales</h5>
                    <div class="form-group m-1">
                        <input type="text" name="cargo" class="form-control" placeholder="Cargo">
                    </div> 
                    <div class="form-group m-1">
                        <input type="text" name="area" class="form-control" placeholder="Area o Departamento">
                    </div>
                    <h7>Fecha de Ingreso</h7>
                    <div class="form-group m-1">
                        <input type="datatime" name="fecha_ingreso" value="<?= $fecha_actual?>" class="form-control" placeholder="Fecha Ingreso">
                    </div>
                    <!-- FORMULARIO CONTACTOS -->
                    <h5>Contactos de Emergencia</h5>
                    <div class="form-group m-1">
                        <input type="text" name="nom_contacto" class="form-control" placeholder="Nombre del Contacto">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="num_contacto" class="form-control" placeholder="Numero de Telefono del Contacto">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="relacion" class="form-control" placeholder="Relacion con el Trabajador">
                    </div>
                    <!-- FORMULARIO CARGAS -->
                    <h5>Cargas Familiares</h5>
                    <div class="form-group m-1">
                        <input type="text" name="nom_carga" class="form-control" placeholder="Nombre Carga Familiar">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="parentesco" class="form-control" placeholder="Parentesco">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="sex_carga" class="form-control" placeholder="Sexo Carga Familiar">
                    </div>
                    <div class="form-group m-1">
                        <input type="text" name="rut_carga" class="form-control" placeholder="Rut Carga Familiar">
                    </div>

                    <input type="submit" class="btn btn-success btn-block m-1" name="save_task" value="Ingresar Empleado">
                </form>
            </div>
        </div>

    </div>
</div>

<?php include_once("../headers-footers/footer.php");?>

   