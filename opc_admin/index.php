<?php     

    session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'yuri';
  
    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    };

    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{
    if($_SESSION['rol'] != 1){
        header("Location: ../login-signup/login.php");
    }}

    $message = '';
    
    // if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id_rol'])) {
    //     $sql = "INSERT INTO usuarios (rut, clave_acceso, id_rol) VALUES (:rut, :clave_acceso, :id_rol)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(':rut', $_POST['rut']);
    //     $stmt->bindParam(':clave_acceso', $_POST['clave_acceso']);
    //     $stmt->bindParam(':id_rol', $_POST['id_rol']);

    //     if ($stmt->execute()) {
    //         $message = 'Usuario creado exitosamente';
    //     } else {
    //         $message = 'Error al crear usuario';
    //     }
    // }

?>
<?php include_once("../headers-footers/header_admin.php");?>

<?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<?php 
    date_default_timezone_set('America/Santiago');
    $fecha_actual = date('Y-m-d H:i:s');
?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show m-1" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>    
            <div class="card card-body">
                <form action="../funciones/save_emp_admin.php" method="POST"><h1 class="text-center">Formulario de Ingreso de Empleados</h1>
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
                    <div class="form-group m-1">
                        <input type="text" name="clave_acceso" class="form-control" placeholder="Clave de Acceso">
                    </div>
                    <div class="form-group m-1">
                        <input type="number" name="rol_id" class="form-control" placeholder="Rol" min="1" max="3">
                    </div>

                    <input type="submit" class="btn btn-success btn-block m-1" name="save_emp_admin" value="Ingresar Empleado">
                </form>
            </div>
        </div>

    </div>
</div>

<?php include_once("../headers-footers/footer.php");?>

   