<?php include_once("../database/db.php");

    if (!isset($_SESSION['rol'])){
        header("Location: ../login-signup/login.php");
    }else{      if($_SESSION['rol'] != 3){
            header("Location: ../login-signup/login.php");
        }
    }
    
?>
<?php include_once("../headers-footers/header_emp.php");?>    
<div class="col">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>SEXO</th>
                        <th>DIRECCION</th>
                        <TH>NOMBRE CONTACTO</TH>
                        <TH>NUMERO CONTACTO</TH>
                        <TH>RELACION</TH>
                        <TH>NOMBRE CARGA</TH>
                        <TH>PARENTESCO</TH>
                        <TH>SEXO CARGA</TH>
                        <TH>RUT CARGA</TH>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $query = "SELECT * FROM form_empleados where id = '".$_SESSION['id']."'";

                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>

                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['sexo']?></td>
                            <td><?php echo $row['direccion']?></td>
                            <td><?php echo $row['nom_contacto']?></td>
                            <td><?php echo $row['num_contacto']?></td>
                            <td><?php echo $row['relacion']?></td>
                            <td><?php echo $row['nom_carga']?></td>
                            <td><?php echo $row['parentesco']?></td>
                            <td><?php echo $row['sex_carga']?></td>
                            <td><?php echo $row['rut_carga']?></td>                            
                            <td>
                                <a href="edit_task_emp.php?id=<?php echo $row['id']?>"  class="btn btn-secondary">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>   
            </table>
        </div>
<?php include_once("../headers-footers/footer.php");?>