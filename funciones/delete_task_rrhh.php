<?php 
    include("../database/db.php");
    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{
        if($_SESSION['rol'] != 2){
            header("Location: ../login-signup/login.php");
        }
    }
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM form_empleados WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }
        $_SESSION['message'] = 'Empleado eliminado.';
        $_SESSION['message_type'] = 'danger';
        header("Location: lista_edit_rrhh.php");
    }
?>