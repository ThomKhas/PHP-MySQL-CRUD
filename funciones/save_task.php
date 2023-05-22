<?php 
include_once("../database/db.php");

if (isset($_POST['save_task']))
{
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $cargo = $_POST['cargo'];
    $area = $_POST['area'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $nom_contacto = $_POST['nom_contacto'];
    $num_contacto = $_POST['num_contacto'];
    $relacion = $_POST['relacion'];
    $nom_carga = $_POST['nom_carga'];
    $parentesco = $_POST['parentesco'];
    $sex_carga = $_POST['sex_carga'];
    $rut_carga = $_POST['rut_carga'];

    $query = "INSERT INTO form_empleados(rut, nombre, sexo, direccion, cargo, area, fecha_ingreso, nom_contacto, num_contacto, relacion, nom_carga, parentesco, sex_carga, rut_carga) 
                    VALUES ('$rut', '$nombre', '$sexo','$direccion', '$cargo', '$area', '$fecha_ingreso', '$nom_contacto', '$num_contacto', '$relacion', '$nom_carga', '$parentesco', '$sex_carga', '$rut_carga')";
    $result = mysqli_query($conn, $query);
    if (!$result)
    {
        die("Query failed");
    }

    $_SESSION['message'] = 'Empleado guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../formulario/index.php");

}?>