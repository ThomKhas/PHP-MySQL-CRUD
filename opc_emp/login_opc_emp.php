<?php include_once("../database/db.php");

    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{
    if($_SESSION['rol'] != 3){
        header("Location: ../login-signup/login.php");
    }
}
?>
<?php include_once("../headers-footers/header_emp.php");?>


<h1 class="mt-2 ms-5 mb-4 display-5">Opciones</h1>
<div class="d-grid gap-1 col-3 ms-5 ">
    <a href="../funciones/lista_edit_emp.php" class="btn btn-success">
        Editar Perfil
    </a>
</div>

<?php include_once("../headers-footers/footer_empleado.php");?>