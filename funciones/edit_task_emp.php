<?php 
    include("../database/db.php");
    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{
        if($_SESSION['rol'] != 3){
            header("Location: ../login-signup/login.php");
        }
    }
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM form_empleados WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $sexo = $row['sexo'];
            $direccion = $row['direccion'];
            $nom_contacto = $row['nom_contacto'];
            $num_contacto = $row['num_contacto'];
            $relacion = $row['relacion'];
            $nom_carga = $row['nom_carga'];
            $parentesco = $row['parentesco'];
            $sex_carga = $row['sex_carga'];
            $rut_carga = $row['rut_carga'];
        }
    }

    if (isset($_POST['editar'])){
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];  
        $nom_contacto = $_POST['nom_contacto'];
        $num_contacto = $_POST['num_contacto'];
        $relacion = $_POST['relacion'];
        $nom_carga = $_POST['nom_carga'];
        $parentesco = $_POST['parentesco'];
        $sex_carga = $_POST['sex_carga'];
        $rut_carga = $_POST['rut_carga'];
        $query = "UPDATE form_empleados set nombre = '$nombre', sexo = '$sexo', direccion = '$direccion', nom_contacto = '$nom_contacto', num_contacto = '$num_contacto', relacion = '$relacion', nom_carga = '$nom_carga', parentesco = '$parentesco', sex_carga = '$sex_carga', rut_carga = '$rut_carga' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Perfil actualizado';
        $_SESSION['message_type'] = 'warning';
        header("Location: lista_edit_emp.php");
    }
?>

<?php include_once("../headers-footers/header_emp.php");?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task_emp.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <h1 class="text-center">Actualizar Datos de Empleados</h1>
                    <h5>Datos Personales</h5>
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control m-1" placeholder="Actualiza el Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sexo" value="<?php echo $sexo;?>" class="form-control m-1" placeholder="Actualiza el Sexo">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" value="<?php echo $direccion;?>" class="form-control m-1" placeholder="Actualiza la Direccion">
                    </div>
                    <h5>Contactos de Emergencia</h5>
                    <div class="form-group">
                        <input type="text" name="nom_contacto" value="<?php echo $nom_contacto;?>" class="form-control m-1" placeholder="Actualiza el Nombre de Contacto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="num_contacto" value="<?php echo $num_contacto;?>" class="form-control m-1" placeholder="Actualiza el Numero de Contacto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="relacion" value="<?php echo $relacion;?>" class="form-control m-1" placeholder="Actualiza la Relacion">
                    </div>
                    <h5>Cargas Familiares</h5>
                    <div class="form-group">
                        <input type="text" name="nom_carga" value="<?php echo $nom_carga;?>" class="form-control m-1" placeholder="Actualiza el Nombre de la Carga">
                    </div>
                    <div class="form-group">
                        <input type="text" name="parentesco" value="<?php echo $parentesco;?>" class="form-control m-1" placeholder="Actualiza el Parentesco">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sex_carga" value="<?php echo $sex_carga;?>" class="form-control m-1" placeholder="Actualiza el Sexo de la Carga">
                    </div>
                    <div class="form-group">
                        <input type="text" name="rut_carga" value="<?php echo $rut_carga;?>" class="form-control m-1" placeholder="Actualiza el Rut de la Carga">
                    </div>
                    <button class="btn btn-success m-1" name="editar">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("../headers-footers/footer.php");?>