<?php include_once("../database/db.php");

    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{
    if($_SESSION['rol'] != 2){
        header("Location: ../login-signup/login.php");
    }
}
?>
<?php include_once("../headers-footers/header_rrhh.php");?>


<h1 class="mt-2 ms-5 mb-4 display-5">Opciones</h1>
<div class="d-grid gap-1 col-3 ms-5 ">
    <a href="index.php" class="btn btn-success">
        Agregar Empleados
    </a>
    <a href="../funciones/lista_edit_rrhh.php" class="btn btn-success">
        Editar Empleados
    </a>
</div>

<?php include_once("../headers-footers/footer.php");?>